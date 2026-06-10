<?php

namespace AppModulesListingsModels;

use AppModelsBaseModel;

class Area extends BaseModel
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
