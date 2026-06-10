<?php

namespace AppModulesRoommateModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;

class RoommateProfile extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
