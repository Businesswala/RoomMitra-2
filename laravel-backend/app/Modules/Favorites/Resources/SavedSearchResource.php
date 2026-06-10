<?php

namespace App\Modules\Favorites\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SavedSearchResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'query_params' => $this->query_params,
            'created_at' => $this->created_at,
        ];
    }
}
