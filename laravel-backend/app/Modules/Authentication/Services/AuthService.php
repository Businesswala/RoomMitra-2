<?php

namespace App\Modules\Authentication\Services;

use App\Modules\Authentication\Models\User;
use App\Modules\Users\Models\UserProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Exception;

class AuthService
{
    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }

    /**
     * Handle user registration.
     */
    public function register(array $data): array
    {
        $user = User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
            'status' => 'active',
        ]);

        UserProfile::create([
            'user_id' => $user->id,
        ]);

        // Generate OTP for verification
        $this->otpService->generateOTP($user->mobile);

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user->load('profile'),
            'token' => $token
        ];
    }

    /**
     * Handle email or mobile authentication.
     */
    public function login(array $data): array
    {
        $loginField = filter_var($data['email_or_mobile'], FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        $user = User::where($loginField, $data['email_or_mobile'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new Exception('Invalid login credentials.', 401);
        }

        if ($user->status === 'suspended') {
            throw new Exception('Your account is suspended. Please contact support.', 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user->load('profile'),
            'token' => $token
        ];
    }

    /**
     * Request Password Reset.
     */
    public function forgotPassword(string $email): string
    {
        $token = Str::random(64);
        Cache::put('password_reset_' . $email, $token, now()->addMinutes(15));
        
        // Log simulation of dispatch
        IlluminateSupportFacadesLog::info("RoomMitra password reset link for " . $email . ": " . url("/password-reset?token=" . $token . "&email=" . urlencode($email)));

        return $token;
    }

    /**
     * Reset Password.
     */
    public function resetPassword(array $data): void
    {
        $cachedToken = Cache::get('password_reset_' . $data['email']);

        if (!$cachedToken || $cachedToken !== $data['token']) {
            throw new Exception('Invalid or expired password reset token.', 400);
        }

        $user = User::where('email', $data['email'])->first();
        if ($user) {
            $user->password = Hash::make($data['password']);
            $user->save();
            Cache::forget('password_reset_' . $data['email']);
        }
    }

    /**
     * Handle Google Social Login logic.
     */
    public function googleLogin(string $email, string $name, string $googleId): array
    {
        // For Google Auth we either match user by email or register them
        $user = User::where('email', $email)->first();

        if (!$user) {
            $user = User::create([
                'role' => 'user',
                'name' => $name,
                'email' => $email,
                'mobile' => 'G_' . Str::random(8), // Placeholder mobile for google login signup
                'password' => Hash::make(Str::random(24)),
                'status' => 'active',
                'email_verified_at' => now(),
            ]);

            UserProfile::create([
                'user_id' => $user->id,
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user->load('profile'),
            'token' => $token
        ];
    }
}
