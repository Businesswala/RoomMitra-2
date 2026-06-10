<?php

namespace AppModulesRoommateModels;

use IlluminateDatabaseEloquentModel;
use AppModulesAuthenticationModelsUser;

class RoommateMatch extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function matchedUser()
    {
        return $this->belongsTo(User::class, 'matched_user_id');
    }
}
