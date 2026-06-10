<?php

namespace AppModulesChatModels;

use AppModelsBaseModel;

class MessageAttachment extends BaseModel
{
    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
