<?php

namespace AppModulesLaundryModels;

use AppModelsBaseModel;
use AppModulesListingsModelsListing;

class LaundryService extends BaseModel
{
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
