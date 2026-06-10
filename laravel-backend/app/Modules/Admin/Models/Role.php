<?php

namespace AppModulesAdminModels;

use AppModelsBaseModel;

class Role extends BaseModel
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
