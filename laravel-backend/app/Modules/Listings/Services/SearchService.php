<?php

namespace App\Modules\Listings\Services;

use App\Modules\Listings\Models\Listing;
use App\Modules\Favorites\Models\SavedSearch;

class SearchService
{
    public function search(array $filters)
    {
        $query = Listing::with(['category', 'subcategory', 'city', 'area', 'images', 'amenities'])
            ->where('status', 'active');

        // Text Search
        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('title', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('description', 'like', '%' . $filters['search'] . '%');
            });
        }

        // Location Filters
        if (!empty($filters['city'])) {
            $query->whereHas('city', function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['city'] . '%');
            });
        }

        if (!empty($filters['area'])) {
            $query->whereHas('area', function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['area'] . '%');
            });
        }

        // Price Filter
        if (!empty($filters['budget'])) {
            $query->where('price', '<=', $filters['budget']);
        }

        // Category / Subcategory
        if (!empty($filters['category'])) {
            $query->whereHas('category', function ($q) use ($filters) {
                $q->where('slug', $filters['category']);
            });
        }

        // Amenity Filter
        if (!empty($filters['amenities']) && is_array($filters['amenities'])) {
            foreach ($filters['amenities'] as $amenityId) {
                $query->whereHas('amenities', function ($q) use ($amenityId) {
                    $q->where('amenities.id', $amenityId);
                });
            }
        }

        // Verification & Featured Status
        if (isset($filters['verified'])) {
            $query->where('verified', (bool) $filters['verified']);
        }

        if (isset($filters['featured'])) {
            $query->where('featured', (bool) $filters['featured']);
        }

        // Sorting
        $sortBy = $filters['sort_by'] ?? 'latest';
        if ($sortBy === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sortBy === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }

    public function saveSearch(string $userId, string $name, array $params): SavedSearch
    {
        return SavedSearch::create([
            'user_id' => $userId,
            'name' => $name,
            'query_params' => $params
        ]);
    }

    public function deleteSavedSearch(string $userId, string $id): void
    {
        SavedSearch::where('id', $id)->where('user_id', $userId)->delete();
    }

    public function getSavedSearches(string $userId)
    {
        return SavedSearch::where('user_id', $userId)->get();
    }
}
