<?php

namespace AppModulesReviewsModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;
use AppModulesListingsModelsListing;

class Review extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function replies()
    {
        return $this->hasMany(ReviewReply::class);
    }
}
