<?php

namespace App\Modules\Authentication\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Authentication\Requests\RegisterRequest;
use App\Modules\Authentication\Requests\LoginRequest;
use App\Modules\Authentication\Requests\ForgotPasswordRequest;
use App\Modules\Authentication\Requests\ResetPasswordRequest;
use App\Modules\Authentication\Requests\VerifyOtpRequest;
use App\Modules\Authentication\Services\AuthService;
use App\Modules\Authentication\Services\OTPService;
use App\Modules\Authentication\Models\User;
use Illuminate\Http\Request;
use Exception;

class AuthController extends Controller
{
    protected $authService;
    protected $otpService;

    public function __construct(AuthService $authService, OTPService $otpService)
    {
        $this->authService = $authService;
        $this->otpService = $otpService;
    }

    public function register(RegisterRequest $request)
    {
        try {
            $result = $this->authService->register($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Registration successful. OTP sent for mobile verification.',
                'data' => $result
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $result = $this->authService->login($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'data' => $result
            ]);
        } catch (Exception $e) {
            $statusCode = $e->getCode() === 401 || $e->getCode() === 403 ? $e->getCode() : 500;
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], $statusCode);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'success' => true,
                'message' => 'Logged out successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        try {
            $this->authService->forgotPassword($request->email);

            return response()->json([
                'success' => true,
                'message' => 'Password reset token generated and logged.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        try {
            $this->authService->resetPassword($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Password has been reset successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function verifyOtp(VerifyOtpRequest $request)
    {
        try {
            $isValid = $this->otpService->verifyOTP($request->email_or_mobile, $request->otp);

            if (!$isValid) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid or expired OTP.'
                ], 400);
            }

            // Verify email or mobile status
            $loginField = filter_var($request->email_or_mobile, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
            $user = User::where($loginField, $request->email_or_mobile)->first();

            if ($user) {
                if ($loginField === 'email') {
                    $user->email_verified_at = now();
                } else {
                    $user->mobile_verified_at = now();
                }
                $user->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'OTP verified successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function resendOtp(Request $request)
    {
        $request->validate([
            'email_or_mobile' => 'required|string',
        ]);

        try {
            $this->otpService->generateOTP($request->email_or_mobile);

            return response()->json([
                'success' => true,
                'message' => 'OTP has been resent successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function googleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'google_id' => 'required|string',
        ]);

        try {
            $result = $this->authService->googleLogin(
                $request->email,
                $request->name,
                $request->google_id
            );

            return response()->json([
                'success' => true,
                'message' => 'Google login successful.',
                'data' => $result
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
