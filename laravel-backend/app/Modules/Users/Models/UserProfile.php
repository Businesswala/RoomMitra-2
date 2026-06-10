<?php

namespace AppModulesUsersModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;
use AppModulesListingsModelsCity;

class UserProfile extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
