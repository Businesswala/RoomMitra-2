<?php

namespace AppModulesListingsModels;

use AppModelsBaseModel;

class ListingImage extends BaseModel
{
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
