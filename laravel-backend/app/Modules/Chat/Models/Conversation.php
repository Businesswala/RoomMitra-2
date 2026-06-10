<?php

namespace AppModulesChatModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;
use AppModulesListingsModelsListing;

class Conversation extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lister()
    {
        return $this->belongsTo(User::class, 'lister_id');
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
