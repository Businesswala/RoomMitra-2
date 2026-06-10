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
use App\Modules\Reviews\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EngagementTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $lister;
    protected $listing;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'role' => 'user',
            'name' => 'Ketan Shah',
            'email' => 'ketan@test.com',
            'mobile' => '9988776655',
            'password' => bcrypt('password')
        ]);

        $this->lister = User::create([
            'role' => 'lister',
            'name' => 'Alpesh Patel',
            'email' => 'alpesh@test.com',
            'mobile' => '8899889988',
            'password' => bcrypt('password')
        ]);

        $country = Country::create(['name' => 'India', 'iso_code' => 'IN']);
        $state = State::create(['country_id' => $country->id, 'name' => 'Gujarat']);
        $city = City::create(['state_id' => $state->id, 'name' => 'Ahmedabad']);
        $area = Area::create(['city_id' => $city->id, 'name' => 'Vastrapur', 'pincode' => '380015']);
        $category = Category::create(['name' => 'Rooms', 'slug' => 'rooms', 'icon' => 'rooms-icon', 'status' => true]);

        $this->listing = Listing::create([
            'user_id' => $this->lister->id,
            'category_id' => $category->id,
            'title' => 'Vastrapur PG for Boys',
            'slug' => 'vastrapur-pg-for-boys',
            'description' => 'Cozy accommodation.',
            'price' => 4500.00,
            'address' => 'Vastrapur',
            'country_id' => $country->id,
            'state_id' => $state->id,
            'city_id' => $city->id,
            'area_id' => $area->id,
            'contact_name' => 'Alpesh',
            'contact_mobile' => '8899889988',
            'status' => 'active'
        ]);
    }

    public function test_user_can_add_to_favorites()
    {
        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/v1/favorites', [
            'listing_id' => $this->listing->id
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('success', true);

        $this->assertDatabaseHas('favorites', [
            'user_id' => $this->user->id,
            'listing_id' => $this->listing->id
        ]);
    }

    public function test_user_can_post_review()
    {
        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/v1/reviews', [
            'listing_id' => $this->listing->id,
            'rating' => 5,
            'review' => 'Excellent living experience, neat and clean room.'
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('success', true);

        $this->assertDatabaseHas('reviews', [
            'user_id' => $this->user->id,
            'listing_id' => $this->listing->id,
            'rating' => 5
        ]);
    }

    public function test_user_can_perform_advanced_search()
    {
        $response = $this->getJson('/api/v1/listings/search?city=Ahmedabad&budget=5000&sort_by=price_asc');

        $response->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    '*' => ['id', 'title', 'price']
                ]
            ]);
    }
}
