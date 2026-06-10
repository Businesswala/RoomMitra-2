<?php

namespace AppModulesAdminModels;

use AppModelsBaseModel;

class Admin extends BaseModel
{
    protected $hidden = [
        'password',
    ];
}
