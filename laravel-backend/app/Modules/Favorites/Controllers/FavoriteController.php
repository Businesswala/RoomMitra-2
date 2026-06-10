<?php

namespace App\Modules\Favorites\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Favorites\Services\FavoriteService;
use App\Modules\Listings\Resources\ListingResource;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    protected $favoriteService;

    public function __construct(FavoriteService $favoriteService)
    {
        $this->favoriteService = $favoriteService;
    }

    public function index(Request $request)
    {
        $favorites = $this->favoriteService->getFavorites($request->user()->id);

        return ListingResource::collection($favorites)->additional([
            'success' => true,
            'message' => 'Favorite listings retrieved successfully.'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'listing_id' => 'required|exists:listings,id'
        ]);

        $fav = $this->favoriteService->addFavorite($request->user()->id, $request->listing_id);

        return response()->json([
            'success' => true,
            'message' => 'Listing added to favorites.',
            'data' => $fav
        ], 201);
    }

    public function destroy(Request $request, string $listingId)
    {
        $this->favoriteService->removeFavorite($request->user()->id, $listingId);

        return response()->json([
            'success' => true,
            'message' => 'Listing removed from favorites.'
        ]);
    }
}
