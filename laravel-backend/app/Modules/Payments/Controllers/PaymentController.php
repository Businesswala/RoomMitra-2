<?php

namespace App\Modules\Payments\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Payments\Services\PaymentService;
use Illuminate\Http\Request;
use Exception;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function verify(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|string',
            'gateway_payload' => 'required|array'
        ]);

        try {
            $txn = $this->paymentService->verifyPayment(
                $request->user()->id,
                $request->transaction_id,
                $request->gateway_payload
            );

            return response()->json([
                'success' => true,
                'message' => 'Payment verified successfully and plan activated.',
                'data' => $txn
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function webhook(Request $request, string $gateway)
    {
        // Validates webhook requests based on gateway signature and dispatches service handles
        try {
            $this->paymentService->handleGatewayWebhook($gateway, $request->all());
            
            return response('Webhook Processed', 200);
        } catch (Exception $e) {
            return response('Webhook Error', 400);
        }
    }

    public function history(Request $request)
    {
        $txns = $this->paymentService->getTransactionHistory($request->user()->id);

        return response()->json([
            'success' => true,
            'message' => 'Transactions list retrieved.',
            'data' => $txns
        ]);
    }
}
