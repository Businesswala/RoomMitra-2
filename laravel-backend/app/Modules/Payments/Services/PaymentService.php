<?php

namespace App\Modules\Payments\Services;

use App\Modules\Payments\Models\Transaction;
use App\Modules\Subscriptions\Models\Plan;
use App\Modules\Subscriptions\Services\SubscriptionService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;

class PaymentService
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function createPaymentOrder(string $userId, string $planId, string $method): Transaction
    {
        $plan = Plan::findOrFail($planId);

        // Mocks creating a transaction order reference
        return Transaction::create([
            'user_id' => $userId,
            'plan_id' => $planId,
            'amount' => $plan->price,
            'payment_method' => $method,
            'transaction_id' => 'TXN_' . Str::random(12),
            'payment_status' => 'pending'
        ]);
    }

    public function verifyPayment(string $userId, string $transactionId, array $gatewayPayload): Transaction
    {
        $txn = Transaction::where('transaction_id', $transactionId)
            ->where('user_id', $userId)
            ->firstOrFail();

        return DB::transaction(function () use ($txn, $gatewayPayload) {
            // Simulated gateway validation logic
            $txn->payment_status = 'completed';
            $txn->save();

            // Activate subscription
            $this->subscriptionService->activateSubscription($txn->user_id, $txn->plan_id);

            return $txn;
        });
    }

    public function handleGatewayWebhook(string $gateway, array $payload): void
    {
        // Handle webhook event based on gateway signatures
        $transactionId = $payload['transaction_id'] ?? null;
        if (!$transactionId) return;

        $txn = Transaction::where('transaction_id', $transactionId)->first();
        if ($txn && $txn->payment_status === 'pending') {
            DB::transaction(function () use ($txn) {
                $txn->payment_status = 'completed';
                $txn->save();

                $this->subscriptionService->activateSubscription($txn->user_id, $txn->plan_id);
            });
        }
    }

    public function getTransactionHistory(string $userId)
    {
        return Transaction::where('user_id', $userId)
            ->with('plan')
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
