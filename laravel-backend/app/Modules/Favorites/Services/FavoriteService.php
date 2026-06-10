<?php

namespace App\Modules\Favorites\Services;

use App\Modules\Favorites\Models\Favorite;
use App\Modules\Listings\Models\Listing;

class FavoriteService
{
    public function addFavorite(string $userId, string $listingId): Favorite
    {
        return Favorite::firstOrCreate([
            'user_id' => $userId,
            'listing_id' => $listingId
        ]);
    }

    public function removeFavorite(string $userId, string $listingId): void
    {
        Favorite::where('user_id', $userId)->where('listing_id', $listingId)->delete();
    }

    public function getFavorites(string $userId)
    {
        return Listing::whereHas('favorites', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->with(['category', 'city', 'images'])->paginate(15);
    }
}
