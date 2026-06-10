<?php

namespace App\Modules\Subscriptions\Services;

use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Subscriptions\Models\Plan;
use Exception;

class SubscriptionService
{
    public function getSubscriptionHistory(string $userId)
    {
        return Subscription::where('user_id', $userId)
            ->with('plan')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getActiveSubscription(string $userId): ?Subscription
    {
        return Subscription::where('user_id', $userId)
            ->where('status', 'active')
            ->where('end_date', '>=', now())
            ->first();
    }

    public function activateSubscription(string $userId, string $planId): Subscription
    {
        $plan = Plan::findOrFail($planId);

        // Deactivate previous active subscriptions
        Subscription::where('user_id', $userId)
            ->where('status', 'active')
            ->update(['status' => 'expired']);

        return Subscription::create([
            'user_id' => $userId,
            'plan_id' => $planId,
            'start_date' => now(),
            'end_date' => now()->addDays($plan->validity_days),
            'status' => 'active'
        ]);
    }

    public function cancelSubscription(string $userId, string $id): void
    {
        $sub = Subscription::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $sub->status = 'canceled';
        $sub->save();
    }
}
