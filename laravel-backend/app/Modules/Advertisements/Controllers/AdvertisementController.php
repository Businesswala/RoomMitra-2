<?php

namespace App\Modules\Advertisements\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Advertisements\Requests\CreateAdvertisementRequest;
use App\Modules\Advertisements\Services\AdvertisementService;
use Illuminate\Http\Request;
use Exception;

class AdvertisementController extends Controller
{
    protected $adService;

    public function __construct(AdvertisementService $adService)
    {
        $this->adService = $adService;
    }

    public function index(Request $request)
    {
        $ads = $this->adService->getMyAdvertisements($request->user()->id);

        return response()->json([
            'success' => true,
            'message' => 'My advertisements retrieved.',
            'data' => $ads
        ]);
    }

    public function store(CreateAdvertisementRequest $request)
    {
        try {
            $ad = $this->adService->createAdvertisement($request->user()->id, $request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Advertisement submitted and pending moderation.',
                'data' => $ad
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(CreateAdvertisementRequest $request, string $id)
    {
        try {
            $ad = $this->adService->updateAdvertisement($request->user()->id, $id, $request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Advertisement updated successfully.',
                'data' => $ad
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
            $this->adService->deleteAdvertisement($request->user()->id, $id);

            return response()->json([
                'success' => true,
                'message' => 'Advertisement deleted successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function trackClick(Request $request, string $id)
    {
        $this->adService->trackAdClick($id, $request->user()?->id);

        return response()->json([
            'success' => true,
            'message' => 'Click tracked.'
        ]);
    }

    public function analytics(Request $request, string $id)
    {
        try {
            $analytics = $this->adService->getAdAnalytics($request->user()->id, $id);

            return response()->json([
                'success' => true,
                'message' => 'Ad analytics retrieved.',
                'data' => $analytics
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 403);
        }
    }
}
