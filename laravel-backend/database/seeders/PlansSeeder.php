<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Subscriptions\Models\Plan;

class PlansSeeder extends Seeder
{
    public function run()
    {
        Plan::create([
            'name' => 'Free',
            'listings_limit' => 1,
            'featured_limit' => 0,
            'validity_days' => 30,
            'price' => 0.00,
        ]);

        Plan::create([
            'name' => 'Silver',
            'listings_limit' => 10,
            'featured_limit' => 1,
            'validity_days' => 30,
            'price' => 499.00,
        ]);

        Plan::create([
            'name' => 'Gold',
            'listings_limit' => 50,
            'featured_limit' => 5,
            'validity_days' => 90,
            'price' => 1499.00,
        ]);

        Plan::create([
            'name' => 'Premium',
            'listings_limit' => 100000, // Unlimited
            'featured_limit' => 25,
            'validity_days' => 180,
            'price' => 2999.00,
        ]);
    }
}
