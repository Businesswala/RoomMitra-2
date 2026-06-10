<?php

namespace App\Modules\Reviews\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Reviews\Requests\CreateReviewRequest;
use App\Modules\Reviews\Requests\UpdateReviewRequest;
use App\Modules\Reviews\Services\ReviewService;
use App\Modules\Reviews\Resources\ReviewResource;
use Illuminate\Http\Request;
use Exception;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index(string $listingId)
    {
        $reviews = $this->reviewService->getListingReviews($listingId);

        return ReviewResource::collection($reviews)->additional([
            'success' => true,
            'message' => 'Listing reviews retrieved successfully.'
        ]);
    }

    public function store(CreateReviewRequest $request)
    {
        try {
            $review = $this->reviewService->createReview($request->user()->id, $request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Review submitted successfully and pending approval.',
                'data' => new ReviewResource($review)
            ], 201);
        } catch (Exception $e) {
            $code = $e->getCode() === 400 ? 400 : 500;
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], $code);
        }
    }

    public function update(UpdateReviewRequest $request, string $id)
    {
        try {
            $review = $this->reviewService->updateReview($request->user()->id, $id, $request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Review updated successfully.',
                'data' => new ReviewResource($review)
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
            $this->reviewService->deleteReview($request->user()->id, $id);

            return response()->json([
                'success' => true,
                'message' => 'Review deleted successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function reply(Request $request, string $id)
    {
        $request->validate([
            'reply' => 'required|string|max:1000'
        ]);

        try {
            $reply = $this->reviewService->replyToReview($request->user()->id, $id, $request->reply);

            return response()->json([
                'success' => true,
                'message' => 'Reply posted successfully.',
                'data' => $reply
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
