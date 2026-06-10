<?php

namespace App\Modules\Listings\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Listings\Services\SearchService;
use App\Modules\Listings\Resources\ListingResource;
use App\Modules\Favorites\Resources\SavedSearchResource;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function search(Request $request)
    {
        $listings = $this->searchService->search($request->all());

        return ListingResource::collection($listings)->additional([
            'success' => true,
            'message' => 'Filtered search results retrieved.'
        ]);
    }

    public function saveSearch(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'query_params' => 'required|array'
        ]);

        $saved = $this->searchService->saveSearch(
            $request->user()->id,
            $request->name,
            $request->query_params
        );

        return response()->json([
            'success' => true,
            'message' => 'Search parameters saved successfully.',
            'data' => new SavedSearchResource($saved)
        ], 201);
    }

    public function mySavedSearches(Request $request)
    {
        $searches = $this->searchService->getSavedSearches($request->user()->id);

        return response()->json([
            'success' => true,
            'message' => 'Saved searches retrieved.',
            'data' => SavedSearchResource::collection($searches)
        ]);
    }

    public function deleteSavedSearch(Request $request, string $id)
    {
        $this->searchService->deleteSavedSearch($request->user()->id, $id);

        return response()->json([
            'success' => true,
            'message' => 'Saved search deleted successfully.'
        ]);
    }
}
