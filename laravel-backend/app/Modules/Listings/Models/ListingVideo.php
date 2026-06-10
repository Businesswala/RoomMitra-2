<?php

namespace AppModulesListingsModels;

use AppModelsBaseModel;

class ListingVideo extends BaseModel
{
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
