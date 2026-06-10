<?php

namespace App\Modules\Reviews\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'rating' => (int) $this->rating,
            'review' => $this->review,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'user' => $this->whenLoaded('user', function () {
                return [
                    'id' => $this->user->id,
                    'name' => $this->user->name,
                ];
            }),
            'replies' => $this->whenLoaded('replies', function () {
                return $this->replies->map(fn($reply) => [
                    'id' => $reply->id,
                    'reply' => $reply->reply,
                    'created_at' => $reply->created_at,
                    'user' => [
                        'id' => $reply->user->id,
                        'name' => $reply->user->name,
                    ]
                ]);
            }),
        ];
    }
}
