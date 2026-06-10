<?php

namespace AppModulesAdminModels;

use AppModelsBaseModel;

class Permission extends BaseModel
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}
