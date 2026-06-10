<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Authentication\Controllers\AuthController;
use App\Modules\Categories\Controllers\CategoryController;
use App\Modules\Amenities\Controllers\AmenityController;
use App\Modules\Listings\Controllers\ListingController;
use App\Modules\Favorites\Controllers\FavoriteController;
use App\Modules\Reviews\Controllers\ReviewController;
use App\Modules\Listings\Controllers\SearchController;
use App\Modules\Chat\Controllers\ConversationController;
use App\Modules\Chat\Controllers\MessageController;
use App\Modules\Notifications\Controllers\NotificationController;
use App\Modules\Support\Controllers\TicketController;
use App\Modules\Subscriptions\Controllers\PlanController;
use App\Modules\Subscriptions\Controllers\SubscriptionController;
use App\Modules\Payments\Controllers\PaymentController;
use App\Modules\Advertisements\Controllers\AdvertisementController;
use App\Modules\Admin\Controllers\AdminDashboardController;
use App\Modules\Admin\Controllers\UserManagementController;
use App\Modules\Admin\Controllers\ListingManagementController;
use App\Modules\Admin\Controllers\VerificationController;
use App\Modules\Admin\Controllers\CMSController;
use App\Modules\Admin\Controllers\AnalyticsController;

Route::prefix('v1')->group(function () {
    // Auth endpoints
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
        Route::post('reset-password', [AuthController::class, 'resetPassword']);
        Route::post('verify-otp', [AuthController::class, 'verifyOtp']);
        Route::post('resend-otp', [AuthController::class, 'resendOtp']);
        Route::post('google', [AuthController::class, 'googleLogin']);

        Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
    });

    // Public categories and amenities
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('subcategories/{category_id}', [CategoryController::class, 'subcategories']);
    Route::get('amenities', [AmenityController::class, 'index']);

    // Listings & Search endpoints
    Route::get('listings', [ListingController::class, 'index']);
    Route::get('listings/featured', [ListingController::class, 'featured']);
    Route::get('listings/nearby', [ListingController::class, 'nearby']);
    Route::get('listings/{id}', [ListingController::class, 'show']);
    Route::post('listings/{id}/view', [ListingController::class, 'incrementView']);
    
    Route::get('listings/search', [SearchController::class, 'search']);
    Route::get('listings/{id}/reviews', [ReviewController::class, 'index']);

    // Public Subscription plans
    Route::get('plans', [PlanController::class, 'index']);
    Route::get('plans/{id}', [PlanController::class, 'show']);

    // Webhooks
    Route::post('webhooks/{gateway}', [PaymentController::class, 'webhook']);

    // Public CMS getters
    Route::get('cms/sliders', [CMSController::class, 'sliders']);
    Route::get('cms/faqs', [CMSController::class, 'faqs']);
    Route::get('cms/pages', [CMSController::class, 'pages']);

    // Protected endpoints
    Route::middleware('auth:sanctum')->group(function () {
        // Listings management
        Route::post('listings', [ListingController::class, 'store']);
        Route::put('listings/{id}', [ListingController::class, 'update']);
        Route::delete('listings/{id}', [ListingController::class, 'destroy']);
        Route::get('my-listings', [ListingController::class, 'myListings']);
        Route::post('listings/{id}/images', [ListingController::class, 'uploadImages']);
        Route::delete('listing-images/{id}', [ListingController::class, 'deleteImage']);
        Route::post('listings/{id}/video', [ListingController::class, 'uploadVideo']);
        Route::post('listings/{id}/report', [ListingController::class, 'report']);

        // Favorites
        Route::get('favorites', [FavoriteController::class, 'index']);
        Route::post('favorites', [FavoriteController::class, 'store']);
        Route::delete('favorites/{listing_id}', [FavoriteController::class, 'destroy']);

        // Reviews & Replies
        Route::post('reviews', [ReviewController::class, 'store']);
        Route::put('reviews/{id}', [ReviewController::class, 'update']);
        Route::delete('reviews/{id}', [ReviewController::class, 'destroy']);
        Route::post('reviews/{id}/reply', [ReviewController::class, 'reply']);

        // Saved Searches
        Route::get('saved-searches', [SearchController::class, 'mySavedSearches']);
        Route::post('saved-searches', [SearchController::class, 'saveSearch']);
        Route::delete('saved-searches/{id}', [SearchController::class, 'deleteSavedSearch']);

        // Chat Module
        Route::get('chat/conversations', [ConversationController::class, 'index']);
        Route::post('chat/conversations', [ConversationController::class, 'store']);
        Route::get('chat/messages/{conversation_id}', [MessageController::class, 'index']);
        Route::post('chat/messages', [MessageController::class, 'store']);
        Route::delete('chat/messages/{id}', [MessageController::class, 'destroy']);
        Route::post('chat/typing', [MessageController::class, 'typing']);

        // Notifications
        Route::get('notifications', [NotificationController::class, 'index']);
        Route::post('notifications/read/{id}', [NotificationController::class, 'markRead']);
        Route::post('notifications/read-all', [NotificationController::class, 'markAllRead']);

        // Support Tickets
        Route::get('tickets', [TicketController::class, 'index']);
        Route::post('tickets', [TicketController::class, 'store']);
        Route::get('tickets/{id}', [TicketController::class, 'show']);
        Route::post('tickets/{id}/reply', [TicketController::class, 'reply']);
        Route::post('tickets/{id}/close', [TicketController::class, 'close']);

        // Subscriptions
        Route::get('subscriptions', [SubscriptionController::class, 'index']);
        Route::post('plans/buy', [SubscriptionController::class, 'store']);
        Route::delete('subscriptions/{id}', [SubscriptionController::class, 'destroy']);

        // Payments History & Verification
        Route::post('payments/verify', [PaymentController::class, 'verify']);
        Route::get('payments/history', [PaymentController::class, 'history']);

        // Advertisements
        Route::get('ads', [AdvertisementController::class, 'index']);
        Route::post('ads', [AdvertisementController::class, 'store']);
        Route::put('ads/{id}', [AdvertisementController::class, 'update']);
        Route::delete('ads/{id}', [AdvertisementController::class, 'destroy']);
        Route::post('ads/{id}/click', [AdvertisementController::class, 'trackClick']);
        Route::get('ads/{id}/analytics', [AdvertisementController::class, 'analytics']);

        // Admin Plan creation
        Route::post('plans', [PlanController::class, 'store']);

        // --- ADMIN DASHBOARD GATEWAY Prefix routes ---
        Route::prefix('admin')->group(function () {
            Route::get('dashboard', [AdminDashboardController::class, 'stats']);
            
            Route::get('users', [UserManagementController::class, 'index']);
            Route::put('users/{id}', [UserManagementController::class, 'update']);
            Route::delete('users/{id}', [UserManagementController::class, 'destroy']);
            Route::post('users/{id}/suspend', [UserManagementController::class, 'suspend']);
            Route::post('users/{id}/activate', [UserManagementController::class, 'activate']);

            Route::get('listings', [ListingManagementController::class, 'index']);
            Route::post('listings/{id}/approve', [ListingManagementController::class, 'approve']);
            Route::post('listings/{id}/reject', [ListingManagementController::class, 'reject']);
            Route::post('listings/{id}/feature', [ListingManagementController::class, 'feature']);
            Route::delete('listings/{id}', [ListingManagementController::class, 'destroy']);

            Route::get('verifications', [VerificationController::class, 'index']);
            Route::post('verifications/{id}/approve', [VerificationController::class, 'approve']);
            Route::post('verifications/{id}/reject', [VerificationController::class, 'reject']);

            Route::post('cms/pages', [CMSController::class, 'storePage']);
            
            Route::get('revenue', [AnalyticsController::class, 'analytics']);
        });
    });
});
