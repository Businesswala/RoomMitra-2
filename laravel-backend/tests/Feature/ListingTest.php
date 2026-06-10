<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Modules\Authentication\Models\User;
use App\Modules\Categories\Models\Category;
use App\Modules\Listings\Models\Country;
use App\Modules\Listings\Models\State;
use App\Modules\Listings\Models\City;
use App\Modules\Listings\Models\Area;
use App\Modules\Listings\Models\Listing;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListingTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $category;
    protected $city;
    protected $area;
    protected $country;
    protected $state;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'role' => 'lister',
            'name' => 'Lister Person',
            'email' => 'lister@test.com',
            'mobile' => '9898777777',
            'password' => bcrypt('password')
        ]);

        $this->category = Category::create([
            'name' => 'Hostel',
            'slug' => 'hostel',
            'icon' => 'hostel-icon',
            'status' => true
        ]);

        $this->country = Country::create(['name' => 'India', 'iso_code' => 'IN']);
        $this->state = State::create(['country_id' => $this->country->id, 'name' => 'Gujarat']);
        $this->city = City::create(['state_id' => $this->state->id, 'name' => 'Ahmedabad']);
        $this->area = Area::create(['city_id' => $this->city->id, 'name' => 'Vastrapur', 'pincode' => '380015']);
    }

    public function test_user_can_create_listing()
    {
        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/v1/listings', [
            'category_id' => $this->category->id,
            'title' => 'Luxury Student Hostel Vastrapur',
            'description' => 'A prime student co-living room next to IIMA.',
            'price' => 7500.00,
            'address' => '12, Vastrapur Lake Road',
            'country_id' => $this->country->id,
            'state_id' => $this->state->id,
            'city_id' => $this->city->id,
            'area_id' => $this->area->id,
            'contact_name' => 'Alpesh',
            'contact_mobile' => '9988776655'
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('success', true)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => ['id', 'title', 'price', 'status']
            ]);

        $this->assertDatabaseHas('listings', ['title' => 'Luxury Student Hostel Vastrapur']);
    }

    public function test_public_can_view_listing_details()
    {
        $listing = Listing::create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'title' => 'Vastrapur Rooms',
            'slug' => 'vastrapur-rooms',
            'description' => 'Comfortable rooms.',
            'price' => 5000.00,
            'address' => 'Vastrapur',
            'country_id' => $this->country->id,
            'state_id' => $this->state->id,
            'city_id' => $this->city->id,
            'area_id' => $this->area->id,
            'contact_name' => 'Alpesh',
            'contact_mobile' => '9988776655',
            'status' => 'active'
        ]);

        $response = $this->getJson('/api/v1/listings/' . $listing->id);

        $response->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.title', 'Vastrapur Rooms');
    }
}
