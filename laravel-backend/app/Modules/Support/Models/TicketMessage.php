<?php

namespace AppModulesSupportModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;

class TicketMessage extends BaseModel
{
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
