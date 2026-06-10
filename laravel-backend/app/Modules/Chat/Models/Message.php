<?php

namespace AppModulesChatModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;

class Message extends BaseModel
{
    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function attachments()
    {
        return $this->hasMany(MessageAttachment::class);
    }
}
