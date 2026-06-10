<?php

namespace AppModulesAdvertisementsModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;

class Advertisement extends BaseModel
{
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clicks()
    {
        return $this->hasMany(AdvertisementClick::class);
    }
}
