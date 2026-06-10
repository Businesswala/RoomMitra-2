<?php

namespace AppModulesSupportModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;

class Ticket extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }
}
