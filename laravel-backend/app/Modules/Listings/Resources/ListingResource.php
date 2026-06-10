<?php

namespace App\Modules\Listings\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Categories\Resources\CategoryResource;
use App\Modules\Amenities\Resources\AmenityResource;

class ListingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => (float) $this->price,
            'deposit' => $this->deposit ? (float) $this->deposit : null,
            'address' => $this->address,
            'latitude' => $this->latitude ? (float) $this->latitude : null,
            'longitude' => $this->longitude ? (float) $this->longitude : null,
            'contact_name' => $this->contact_name,
            'contact_mobile' => $this->contact_mobile,
            'availability_date' => $this->availability_date,
            'status' => $this->status,
            'featured' => (bool) $this->featured,
            'verified' => (bool) $this->verified,
            'views_count' => (int) $this->views_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            'user' => $this->whenLoaded('user', function () {
                return [
                    'id' => $this->user->id,
                    'name' => $this->user->name,
                    'email' => $this->user->email,
                    'mobile' => $this->user->mobile,
                ];
            }),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'subcategory' => $this->whenLoaded('subcategory', function () {
                return [
                    'id' => $this->subcategory->id,
                    'name' => $this->subcategory->name,
                ];
            }),
            'country' => $this->whenLoaded('country', fn() => ['id' => $this->country->id, 'name' => $this->country->name]),
            'state' => $this->whenLoaded('state', fn() => ['id' => $this->state->id, 'name' => $this->state->name]),
            'city' => $this->whenLoaded('city', fn() => ['id' => $this->city->id, 'name' => $this->city->name]),
            'area' => $this->whenLoaded('area', fn() => ['id' => $this->area->id, 'name' => $this->area->name, 'pincode' => $this->area->pincode]),
            'images' => $this->whenLoaded('images', function () {
                return $this->images->map(fn($img) => [
                    'id' => $img->id,
                    'image_url' => $img->image,
                    'sort_order' => $img->sort_order,
                ]);
            }),
            'videos' => $this->whenLoaded('videos', function () {
                return $this->videos->map(fn($vid) => [
                    'id' => $vid->id,
                    'video_url' => $vid->video_url,
                ]);
            }),
            'amenities' => AmenityResource::collection($this->whenLoaded('amenities')),
        ];
    }
}
