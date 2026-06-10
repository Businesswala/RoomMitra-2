<?php

namespace App\Modules\Amenities\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Amenities\Models\Amenity;
use App\Modules\Amenities\Resources\AmenityResource;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::all();

        return response()->json([
            'success' => true,
            'message' => 'Amenities retrieved successfully.',
            'data' => AmenityResource::collection($amenities)
        ]);
    }
}
