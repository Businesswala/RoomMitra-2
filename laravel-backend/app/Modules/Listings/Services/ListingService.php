<?php

namespace App\Modules\Listings\Services;

use App\Modules\Listings\Models\Listing;
use App\Modules\Listings\Models\ListingImage;
use App\Modules\Listings\Models\ListingVideo;
use App\Modules\Listings\Models\ListingView;
use App\Modules\Listings\Models\ListingReport;
use Illuminate\Support\Str;
use Exception;

class ListingService
{
    public function queryListings(array $filters)
    {
        $query = Listing::with(['category', 'subcategory', 'city', 'area', 'images', 'amenities'])
            ->where('status', 'active');

        if (!empty($filters['city'])) {
            $query->whereHas('city', function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['city'] . '%');
            });
        }

        if (!empty($filters['category'])) {
            $query->whereHas('category', function ($q) use ($filters) {
                $q->where('slug', $filters['category']);
            });
        }

        if (!empty($filters['budget'])) {
            $query->where('price', '<=', $filters['budget']);
        }

        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('title', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('description', 'like', '%' . $filters['search'] . '%');
            });
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }

    public function createListing(string $userId, array $data): Listing
    {
        $data['user_id'] = $userId;
        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(5);
        $data['status'] = 'pending'; // Default admin moderation

        $listing = Listing::create(array_diff_key($data, ['amenities' => 1]));

        if (!empty($data['amenities'])) {
            $listing->amenities()->sync($data['amenities']);
        }

        return $listing->load(['category', 'subcategory', 'city', 'area', 'amenities']);
    }

    public function updateListing(string $userId, string $id, array $data): Listing
    {
        $listing = Listing::where('id', $id)->where('user_id', $userId)->firstOrFail();

        if (isset($data['title'])) {
            $data['slug'] = Str::slug($data['title']) . '-' . Str::random(5);
        }

        $listing->update(array_diff_key($data, ['amenities' => 1]));

        if (isset($data['amenities'])) {
            $listing->amenities()->sync($data['amenities']);
        }

        return $listing->load(['category', 'subcategory', 'city', 'area', 'amenities']);
    }

    public function deleteListing(string $userId, string $id): void
    {
        $listing = Listing::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $listing->delete();
    }

    public function getListingDetails(string $id): Listing
    {
        return Listing::with(['user', 'category', 'subcategory', 'country', 'state', 'city', 'area', 'images', 'videos', 'amenities'])
            ->findOrFail($id);
    }

    public function getFeaturedListings()
    {
        return Listing::where('status', 'active')
            ->where('featured', true)
            ->with(['category', 'city', 'images'])
            ->limit(10)
            ->get();
    }

    public function getNearbyListings(float $latitude, float $longitude, float $radius = 10.0)
    {
        // Basic Haversine formula mapping
        return Listing::where('status', 'active')
            ->with(['category', 'city', 'images'])
            ->selectRaw("*, (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance", [$latitude, $longitude, $latitude])
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->get();
    }

    public function uploadImage(string $listingId, string $imageUrl): ListingImage
    {
        return ListingImage::create([
            'listing_id' => $listingId,
            'image' => $imageUrl,
            'sort_order' => ListingImage::where('listing_id', $listingId)->count()
        ]);
    }

    public function deleteImage(string $userId, string $imageId): void
    {
        $image = ListingImage::findOrFail($imageId);
        // Authorize user
        $listing = Listing::where('id', $image->listing_id)->where('user_id', $userId)->firstOrFail();
        $image->delete();
    }

    public function addVideo(string $listingId, string $videoUrl): ListingVideo
    {
        return ListingVideo::create([
            'listing_id' => $listingId,
            'video_url' => $videoUrl
        ]);
    }

    public function incrementViews(string $listingId, ?string $userId, ?string $ipAddress): void
    {
        ListingView::create([
            'listing_id' => $listingId,
            'user_id' => $userId,
            'ip_address' => $ipAddress
        ]);

        $listing = Listing::findOrFail($listingId);
        $listing->increment('views_count');
    }

    public function reportListing(string $listingId, string $userId, string $reason): ListingReport
    {
        return ListingReport::create([
            'listing_id' => $listingId,
            'user_id' => $userId,
            'reason' => $reason,
            'status' => 'pending'
        ]);
    }
}
