<?php

namespace AppModulesReviewsModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;

class ReviewReply extends BaseModel
{
    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
