<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Modules\Authentication\Models\User;
use App\Modules\Subscriptions\Models\Plan;
use App\Modules\Subscriptions\Models\Subscription;
use App\Modules\Payments\Models\Transaction;
use App\Modules\Advertisements\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MonetizationTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $plan;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'role' => 'lister',
            'name' => 'Lister Patel',
            'email' => 'lister@patel.com',
            'mobile' => '9090909090',
            'password' => bcrypt('password')
        ]);

        $this->plan = Plan::create([
            'name' => 'Silver',
            'listings_limit' => 10,
            'featured_limit' => 1,
            'validity_days' => 30,
            'price' => 499.00
        ]);
    }

    public function test_user_can_initiate_plan_purchase()
    {
        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/v1/plans/buy', [
            'plan_id' => $this->plan->id,
            'payment_method' => 'razorpay'
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('success', true)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => ['id', 'amount', 'transaction_id', 'payment_status']
            ]);

        $this->assertDatabaseHas('transactions', [
            'user_id' => $this->user->id,
            'plan_id' => $this->plan->id,
            'payment_status' => 'pending'
        ]);
    }

    public function test_user_can_verify_successful_payment()
    {
        $txn = Transaction::create([
            'user_id' => $this->user->id,
            'plan_id' => $this->plan->id,
            'amount' => 499.00,
            'payment_method' => 'razorpay',
            'transaction_id' => 'TXN_TEST_123456',
            'payment_status' => 'pending'
        ]);

        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/v1/payments/verify', [
            'transaction_id' => 'TXN_TEST_123456',
            'gateway_payload' => [
                'razorpay_payment_id' => 'pay_12345',
                'razorpay_signature' => 'signature'
            ]
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('success', true);

        $this->assertDatabaseHas('transactions', [
            'id' => $txn->id,
            'payment_status' => 'completed'
        ]);

        $this->assertDatabaseHas('subscriptions', [
            'user_id' => $this->user->id,
            'plan_id' => $this->plan->id,
            'status' => 'active'
        ]);
    }

    public function test_user_can_create_ad()
    {
        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/v1/ads', [
            'title' => 'Top PG Surat featured promotion',
            'image' => 'http://suratad.com/banner.jpg',
            'target_url' => 'http://roommitra.com/listings/surat-pg',
            'position' => 'homepage',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addDays(7)->toDateString()
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('success', true);

        $this->assertDatabaseHas('advertisements', [
            'user_id' => $this->user->id,
            'title' => 'Top PG Surat featured promotion'
        ]);
    }
}
