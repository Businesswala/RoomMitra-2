<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Modules\Authentication\Models\User;
use App\Modules\Listings\Models\Listing;
use App\Modules\Verification\Models\UserVerification;
use App\Modules\Categories\Models\Category;
use App\Modules\Listings\Models\Country;
use App\Modules\Listings\Models\State;
use App\Modules\Listings\Models\City;
use App\Modules\Listings\Models\Area;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $lister;
    protected $listing;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'role' => 'admin',
            'name' => 'Root Admin',
            'email' => 'admin@test.com',
            'mobile' => '9999999999',
            'password' => bcrypt('password')
        ]);

        $this->lister = User::create([
            'role' => 'lister',
            'name' => 'Ketan Lister',
            'email' => 'lister@test.com',
            'mobile' => '8888888888',
            'password' => bcrypt('password')
        ]);

        $country = Country::create(['name' => 'India', 'iso_code' => 'IN']);
        $state = State::create(['country_id' => $country->id, 'name' => 'Gujarat']);
        $city = City::create(['state_id' => $state->id, 'name' => 'Ahmedabad']);
        $area = Area::create(['city_id' => $city->id, 'name' => 'Vastrapur', 'pincode' => '380015']);
        $category = Category::create(['name' => 'PG', 'slug' => 'pg', 'icon' => 'pg-icon', 'status' => true]);

        $this->listing = Listing::create([
            'user_id' => $this->lister->id,
            'category_id' => $category->id,
            'title' => 'Boy PG Vastrapur',
            'slug' => 'boy-pg-vastrapur',
            'description' => 'PG accommodation.',
            'price' => 3000.00,
            'address' => 'Vastrapur',
            'country_id' => $country->id,
            'state_id' => $state->id,
            'city_id' => $city->id,
            'area_id' => $area->id,
            'contact_name' => 'Ketan',
            'contact_mobile' => '8888888888',
            'status' => 'pending'
        ]);
    }

    public function test_admin_can_retrieve_kpi_dashboard_stats()
    {
        $response = $this->actingAs($this->admin, 'sanctum')->getJson('/api/v1/admin/dashboard');

        $response->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'total_users',
                    'total_listers',
                    'total_listings',
                    'revenue',
                    'active_subscriptions',
                    'pending_verifications'
                ]
            ]);
    }

    public function test_non_admin_cannot_retrieve_admin_stats()
    {
        $response = $this->actingAs($this->lister, 'sanctum')->getJson('/api/v1/admin/dashboard');
        $response->assertStatus(403);
    }

    public function test_admin_can_approve_listing()
    {
        $response = $this->actingAs($this->admin, 'sanctum')->postJson("/api/v1/admin/listings/{$this->listing->id}/approve");

        $response->assertStatus(200)
            ->assertJsonPath('success', true);

        $this->listing->refresh();
        $this->assertEquals('active', $this->listing->status);
    }

    public function test_admin_can_suspend_user()
    {
        $response = $this->actingAs($this->admin, 'sanctum')->postJson("/api/v1/admin/users/{$this->lister->id}/suspend");

        $response->assertStatus(200)
            ->assertJsonPath('success', true);

        $this->lister->refresh();
        $this->assertEquals('suspended', $this->lister->status);
    }
}
