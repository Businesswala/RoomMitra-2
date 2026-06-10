<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Modules\Authentication\Models\User;
use App\Modules\Authentication\Services\OTPService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Seed base setup tables if required
    }

    public function test_user_can_register()
    {
        $response = $this->postJson('/api/v1/auth/register', [
            'name' => 'Dev Test',
            'email' => 'dev@test.com',
            'mobile' => '9898989898',
            'password' => 'secret123',
            'role' => 'user',
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('success', true)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'user' => ['id', 'name', 'email', 'mobile'],
                    'token'
                ]
            ]);

        $this->assertDatabaseHas('users', ['email' => 'dev@test.com']);
    }

    public function test_user_can_login()
    {
        $user = User::create([
            'role' => 'user',
            'name' => 'Existing User',
            'email' => 'existing@test.com',
            'mobile' => '9999988888',
            'password' => Hash::make('secret123'),
        ]);

        $response = $this->postJson('/api/v1/auth/login', [
            'email_or_mobile' => 'existing@test.com',
            'password' => 'secret123',
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => ['token', 'user']
            ]);
    }

    public function test_user_can_verify_otp()
    {
        $user = User::create([
            'role' => 'user',
            'name' => 'OTP User',
            'email' => 'otp@test.com',
            'mobile' => '9797979797',
            'password' => Hash::make('secret123'),
        ]);

        Cache::put('otp_9797979797', '123456', now()->addMinutes(5));

        $response = $this->postJson('/api/v1/auth/verify-otp', [
            'email_or_mobile' => '9797979797',
            'otp' => '123456',
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('success', true);

        $user->refresh();
        $this->assertNotNull($user->mobile_verified_at);
    }
}
