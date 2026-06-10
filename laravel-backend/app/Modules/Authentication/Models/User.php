<?php

namespace AppModulesAuthenticationModels;

use IlluminateFoundationAuthUser as Authenticatable;
use IlluminateDatabaseEloquentSoftDeletes;
use AppTraitsHasUuid;
use AppModulesUsersModelsUserProfile;
use AppModulesVerificationModelsUserVerification;
use AppModulesListingsModelsListing;
use AppModulesRoommateModelsRoommateProfile;
use AppModulesRoommateModelsRoommateMatch;
use AppModulesReviewsModelsReview;
use AppModulesReviewsModelsReviewReply;
use AppModulesFavoritesModelsFavorite;
use AppModulesChatModelsConversation;
use AppModulesChatModelsMessage;
use AppModulesSubscriptionsModelsSubscription;
use AppModulesPaymentsModelsTransaction;
use AppModulesAdvertisementsModelsAdvertisement;
use AppModulesSupportModelsTicket;
use AppModulesNotificationsModelsNotification;

class User extends Authenticatable
{
    use HasUuid, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function verification()
    {
        return $this->hasOne(UserVerification::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function roommateProfile()
    {
        return $this->hasOne(RoommateProfile::class);
    }

    public function roommateMatches()
    {
        return $this->hasMany(RoommateMatch::class, 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reviewReplies()
    {
        return $this->hasMany(ReviewReply::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function conversationsAsUser()
    {
        return $this->hasMany(Conversation::class, 'user_id');
    }

    public function conversationsAsLister()
    {
        return $this->hasMany(Conversation::class, 'lister_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
