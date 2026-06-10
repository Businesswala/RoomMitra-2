<?php

namespace AppModulesTiffinModels;

use AppModelsBaseModel;
use AppModulesListingsModelsListing;

class TiffinListing extends BaseModel
{
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
