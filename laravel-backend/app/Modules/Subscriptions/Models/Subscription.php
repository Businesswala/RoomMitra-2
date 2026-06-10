<?php

namespace AppModulesSubscriptionsModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;

class Subscription extends BaseModel
{
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
