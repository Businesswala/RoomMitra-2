<?php

namespace AppModulesAdvertisementsModels;

use IlluminateDatabaseEloquentModel;
use AppModulesAuthenticationModelsUser;

class AdvertisementClick extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
