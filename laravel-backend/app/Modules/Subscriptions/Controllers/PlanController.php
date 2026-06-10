<?php

namespace App\Modules\Subscriptions\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Subscriptions\Services\PlanService;
use App\Modules\Subscriptions\Requests\CreatePlanRequest;

class PlanController extends Controller
{
    protected $planService;

    public function __construct(PlanService $planService)
    {
        $this->planService = $planService;
    }

    public function index()
    {
        $plans = $this->planService->getPlans();

        return response()->json([
            'success' => true,
            'message' => 'Plans retrieved successfully.',
            'data' => $plans
        ]);
    }

    public function show(string $id)
    {
        $plan = $this->planService->getPlanDetails($id);

        return response()->json([
            'success' => true,
            'message' => 'Plan details retrieved.',
            'data' => $plan
        ]);
    }

    public function store(CreatePlanRequest $request)
    {
        // Protected for Admin
        if ($request->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Unauthorized.'], 403);
        }

        $plan = $this->planService->createPlan($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Plan created successfully.',
            'data' => $plan
        ], 201);
    }
}
