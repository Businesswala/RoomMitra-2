<?php

namespace App\Modules\Reviews\Services;

use App\Modules\Reviews\Models\Review;
use App\Modules\Reviews\Models\ReviewReply;
use App\Modules\Listings\Models\Listing;
use Exception;

class ReviewService
{
    public function createReview(string $userId, array $data): Review
    {
        // Check if listing exists and user has not already reviewed
        $exists = Review::where('user_id', $userId)->where('listing_id', $data['listing_id'])->exists();
        if ($exists) {
            throw new Exception('You have already reviewed this listing.', 400);
        }

        $review = Review::create([
            'user_id' => $userId,
            'listing_id' => $data['listing_id'],
            'rating' => $data['rating'],
            'review' => $data['review'],
            'status' => 'pending' // Admin moderation queue
        ]);

        return $review->load('user');
    }

    public function updateReview(string $userId, string $id, array $data): Review
    {
        $review = Review::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $review->update($data);

        return $review->load('user');
    }

    public function deleteReview(string $userId, string $id): void
    {
        $review = Review::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $review->delete();
    }

    public function replyToReview(string $userId, string $reviewId, string $replyText): ReviewReply
    {
        $review = Review::findOrFail($reviewId);
        // Verify user owns the listing the review is posted on
        $listing = Listing::where('id', $review->listing_id)->where('user_id', $userId)->firstOrFail();

        return ReviewReply::create([
            'review_id' => $reviewId,
            'user_id' => $userId,
            'reply' => $replyText
        ]);
    }

    public function getListingReviews(string $listingId)
    {
        return Review::where('listing_id', $listingId)
            ->where('status', 'approved')
            ->with(['user', 'replies.user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
}
