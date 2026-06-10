<?php

namespace AppModulesFavoritesModels;

use IlluminateDatabaseEloquentModel;
use AppModulesAuthenticationModelsUser;
use AppModulesListingsModelsListing;

class Favorite extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
