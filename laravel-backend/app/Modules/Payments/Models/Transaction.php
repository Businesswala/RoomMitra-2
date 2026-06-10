<?php

namespace AppModulesPaymentsModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;
use AppModulesSubscriptionsModelsPlan;

class Transaction extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
