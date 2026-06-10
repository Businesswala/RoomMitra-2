<?php

namespace AppModulesListingsModels;

use AppModelsBaseModel;

class State extends BaseModel
{
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
