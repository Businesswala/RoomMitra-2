<?php

namespace AppModulesVerificationModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;

class UserVerification extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
