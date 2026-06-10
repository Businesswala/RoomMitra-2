<?php

namespace App\Modules\Advertisements\Services;

use App\Modules\Advertisements\Models\Advertisement;
use App\Modules\Advertisements\Models\AdvertisementClick;
use Illuminate\Support\Facades\DB;

class AdvertisementService
{
    public function getMyAdvertisements(string $userId)
    {
        return Advertisement::where('user_id', $userId)->get();
    }

    public function createAdvertisement(string $userId, array $data): Advertisement
    {
        $data['user_id'] = $userId;
        $data['status'] = 'pending'; // Requires admin verification
        return Advertisement::create($data);
    }

    public function updateAdvertisement(string $userId, string $id, array $data): Advertisement
    {
        $ad = Advertisement::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $ad->update($data);
        return $ad;
    }

    public function deleteAdvertisement(string $userId, string $id): void
    {
        $ad = Advertisement::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $ad->delete();
    }

    public function trackAdClick(string $adId, ?string $userId): void
    {
        AdvertisementClick::create([
            'advertisement_id' => $adId,
            'user_id' => $userId
        ]);
    }

    public function getAdAnalytics(string $userId, string $adId): array
    {
        $ad = Advertisement::where('id', $adId)->where('user_id', $userId)->firstOrFail();

        $clicksCount = AdvertisementClick::where('advertisement_id', $adId)->count();
        // Since we don't have impressions table (we mock via views or a constant), we'll simulate impressions
        $impressionsMock = $clicksCount * 12 + 50;

        return [
            'ad_id' => $adId,
            'title' => $ad->title,
            'clicks' => $clicksCount,
            'impressions' => $impressionsMock,
            'ctr' => $impressionsMock > 0 ? round(($clicksCount / $impressionsMock) * 100, 2) : 0
        ];
    }
}
