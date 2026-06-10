<?php

namespace AppModulesAmenitiesModels;

use AppModelsBaseModel;
use AppModulesListingsModelsListing;

class Amenity extends BaseModel
{
    public function listings()
    {
        return $this->belongsToMany(Listing::class, 'listing_amenities');
    }
}
