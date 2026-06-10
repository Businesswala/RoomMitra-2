<?php

namespace AppModulesSubscriptionsModels;

use AppModelsBaseModel;

class Plan extends BaseModel
{
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
