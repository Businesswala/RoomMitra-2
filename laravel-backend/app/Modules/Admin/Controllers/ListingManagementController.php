<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Services\AdminService;
use App\Modules\Listings\Models\Listing;
use App\Modules\Listings\Resources\ListingResource;
use Illuminate\Http\Request;

class ListingManagementController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Forbidden.'], 403);
        }

        $listings = Listing::with(['category', 'city'])->paginate(20);

        return ListingResource::collection($listings)->additional([
            'success' => true,
            'message' => 'All listings retrieved.'
        ]);
    }

    public function approve(Request $request, string $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Forbidden.'], 403);
        }

        $this->adminService->approveListing($id);

        return response()->json([
            'success' => true,
            'message' => 'Listing approved.'
        ]);
    }

    public function reject(Request $request, string $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Forbidden.'], 403);
        }

        $this->adminService->rejectListing($id);

        return response()->json([
            'success' => true,
            'message' => 'Listing rejected.'
        ]);
    }

    public function feature(Request $request, string $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Forbidden.'], 403);
        }

        $this->adminService->featureListing($id);

        return response()->json([
            'success' => true,
            'message' => 'Listing featured status toggled.'
        ]);
    }

    public function destroy(Request $request, string $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Forbidden.'], 403);
        }

        $this->adminService->deleteListing($id);

        return response()->json([
            'success' => true,
            'message' => 'Listing deleted successfully.'
        ]);
    }
}
