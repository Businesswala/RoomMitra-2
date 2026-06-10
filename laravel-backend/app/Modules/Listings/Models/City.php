<?php

namespace AppModulesListingsModels;

use AppModelsBaseModel;
use AppModulesUsersModelsUserProfile;

class City extends BaseModel
{
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function profiles()
    {
        return $this->hasMany(UserProfile::class);
    }
}
