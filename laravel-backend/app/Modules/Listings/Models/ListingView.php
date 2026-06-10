<?php

namespace AppModulesListingsModels;

use IlluminateDatabaseEloquentModel;
use AppModulesAuthenticationModelsUser;

class ListingView extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
