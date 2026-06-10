<?php

namespace App\Modules\Subscriptions\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Subscriptions\Services\SubscriptionService;
use App\Modules\Subscriptions\Requests\PurchasePlanRequest;
use App\Modules\Payments\Services\PaymentService;
use Illuminate\Http\Request;
use Exception;

class SubscriptionController extends Controller
{
    protected $subscriptionService;
    protected $paymentService;

    public function __construct(SubscriptionService $subscriptionService, PaymentService $paymentService)
    {
        $this->subscriptionService = $subscriptionService;
        $this->paymentService = $paymentService;
    }

    public function index(Request $request)
    {
        $subs = $this->subscriptionService->getSubscriptionHistory($request->user()->id);
        $active = $this->subscriptionService->getActiveSubscription($request->user()->id);

        return response()->json([
            'success' => true,
            'message' => 'Subscriptions history retrieved.',
            'data' => [
                'active' => $active,
                'history' => $subs
            ]
        ]);
    }

    public function store(PurchasePlanRequest $request)
    {
        try {
            // 1. Create a payment order transaction
            $order = $this->paymentService->createPaymentOrder(
                $request->user()->id,
                $request->plan_id,
                $request->payment_method
            );

            return response()->json([
                'success' => true,
                'message' => 'Order created. Complete payment via gateway.',
                'data' => $order
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Request $request, string $id)
    {
        try {
            $this->subscriptionService->cancelSubscription($request->user()->id, $id);

            return response()->json([
                'success' => true,
                'message' => 'Subscription canceled successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
