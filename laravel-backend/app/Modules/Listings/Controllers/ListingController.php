<?php

namespace App\Modules\Listings\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Listings\Requests\CreateListingRequest;
use App\Modules\Listings\Requests\UpdateListingRequest;
use App\Modules\Listings\Services\ListingService;
use App\Modules\Listings\Resources\ListingResource;
use App\Modules\Listings\Models\Listing;
use Illuminate\Http\Request;
use Exception;

class ListingController extends Controller
{
    protected $listingService;

    public function __construct(ListingService $listingService)
    {
        $this->listingService = $listingService;
    }

    public function index(Request $request)
    {
        $listings = $this->listingService->queryListings($request->all());
        
        return ListingResource::collection($listings)->additional([
            'success' => true,
            'message' => 'Listings retrieved successfully.'
        ]);
    }

    public function store(CreateListingRequest $request)
    {
        try {
            $listing = $this->listingService->createListing($request->user()->id, $request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Listing created successfully and pending review.',
                'data' => new ListingResource($listing)
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $listing = $this->listingService->getListingDetails($id);

            return response()->json([
                'success' => true,
                'message' => 'Listing details retrieved successfully.',
                'data' => new ListingResource($listing)
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Listing not found.'
            ], 404);
        }
    }

    public function update(UpdateListingRequest $request, string $id)
    {
        try {
            $listing = $this->listingService->updateListing($request->user()->id, $id, $request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Listing updated successfully.',
                'data' => new ListingResource($listing)
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Request $request, string $id)
    {
        try {
            $this->listingService->deleteListing($request->user()->id, $id);

            return response()->json([
                'success' => true,
                'message' => 'Listing deleted successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function myListings(Request $request)
    {
        $listings = Listing::where('user_id', $request->user()->id)->with(['category', 'city', 'images'])->paginate(15);

        return ListingResource::collection($listings)->additional([
            'success' => true,
            'message' => 'My listings retrieved successfully.'
        ]);
    }

    public function featured()
    {
        $listings = $this->listingService->getFeaturedListings();

        return response()->json([
            'success' => true,
            'message' => 'Featured listings retrieved.',
            'data' => ListingResource::collection($listings)
        ]);
    }

    public function nearby(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'nullable|numeric'
        ]);

        $listings = $this->listingService->getNearbyListings(
            $request->latitude,
            $request->longitude,
            $request->radius ?? 10.0
        );

        return response()->json([
            'success' => true,
            'message' => 'Nearby listings retrieved.',
            'data' => ListingResource::collection($listings)
        ]);
    }

    public function uploadImages(Request $request, string $id)
    {
        $request->validate([
            'image' => 'required|string' // Accepts cloud URL mock or base64
        ]);

        try {
            // Check auth
            Listing::where('id', $id)->where('user_id', $request->user()->id)->firstOrFail();
            $img = $this->listingService->uploadImage($id, $request->image);

            return response()->json([
                'success' => true,
                'message' => 'Image uploaded successfully.',
                'data' => $img
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload image.'
            ], 500);
        }
    }

    public function deleteImage(Request $request, string $id)
    {
        try {
            $this->listingService->deleteImage($request->user()->id, $id);

            return response()->json([
                'success' => true,
                'message' => 'Image deleted successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function uploadVideo(Request $request, string $id)
    {
        $request->validate([
            'video_url' => 'required|string'
        ]);

        try {
            Listing::where('id', $id)->where('user_id', $request->user()->id)->firstOrFail();
            $vid = $this->listingService->addVideo($id, $request->video_url);

            return response()->json([
                'success' => true,
                'message' => 'Video associated successfully.',
                'data' => $vid
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function report(Request $request, string $id)
    {
        $request->validate([
            'reason' => 'required|string'
        ]);

        try {
            $report = $this->listingService->reportListing($id, $request->user()->id, $request->reason);

            return response()->json([
                'success' => true,
                'message' => 'Listing reported successfully.',
                'data' => $report
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function incrementView(Request $request, string $id)
    {
        try {
            $this->listingService->incrementViews(
                $id,
                $request->user()?->id,
                $request->ip()
            );

            return response()->json([
                'success' => true,
                'message' => 'View logged.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
