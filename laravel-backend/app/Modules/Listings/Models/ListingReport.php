<?php

namespace AppModulesListingsModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;

class ListingReport extends BaseModel
{
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
