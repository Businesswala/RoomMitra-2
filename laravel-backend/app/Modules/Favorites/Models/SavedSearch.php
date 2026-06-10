<?php

namespace App\Modules\Favorites\Models;

use App\Models\BaseModel;
use App\Modules\Authentication\Models\User;

class SavedSearch extends BaseModel
{
    protected $casts = [
        'query_params' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
