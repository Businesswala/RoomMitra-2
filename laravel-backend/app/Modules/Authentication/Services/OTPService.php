<?php

namespace App\Modules\Authentication\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class OTPService
{
    /**
     * Generate a 6-digit OTP and store it in cache for 5 minutes.
     */
    public function generateOTP(string $key): string
    {
        $otp = (string) rand(100000, 999999);
        Cache::put('otp_' . $key, $otp, now()->addMinutes(5));
        
        $this->sendOTP($key, $otp);

        return $otp;
    }

    /**
     * Verify the OTP from cache.
     */
    public function verifyOTP(string $key, string $otp): bool
    {
        $cachedOtp = Cache::get('otp_' . $key);

        if ($cachedOtp && $cachedOtp === $otp) {
            Cache::forget('otp_' . $key);
            return true;
        }

        return false;
    }

    /**
     * Dispatch OTP (mock logging/SMS dispatch).
     */
    protected function sendOTP(string $recipient, string $otp): void
    {
        Log::info("RoomMitra OTP for " . $recipient . ": " . $otp);
    }
}
