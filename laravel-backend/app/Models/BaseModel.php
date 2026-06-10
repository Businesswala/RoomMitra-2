<?php

namespace AppModels;

use IlluminateDatabaseEloquentModel;
use IlluminateDatabaseEloquentSoftDeletes;
use AppTraitsHasUuid;

abstract class BaseModel extends Model
{
    use HasUuid, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];
}
