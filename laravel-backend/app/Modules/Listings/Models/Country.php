<?php

namespace AppModulesListingsModels;

use AppModelsBaseModel;

class Country extends BaseModel
{
    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
