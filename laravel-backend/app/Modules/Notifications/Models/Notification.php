<?php

namespace AppModulesNotificationsModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;

class Notification extends BaseModel
{
    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
