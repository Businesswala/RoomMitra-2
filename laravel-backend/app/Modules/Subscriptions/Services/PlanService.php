<?php

namespace App\Modules\Subscriptions\Services;

use App\Modules\Subscriptions\Models\Plan;

class PlanService
{
    public function getPlans()
    {
        return Plan::orderBy('price', 'asc')->get();
    }

    public function getPlanDetails(string $id): Plan
    {
        return Plan::findOrFail($id);
    }

    public function createPlan(array $data): Plan
    {
        return Plan::create($data);
    }
}
