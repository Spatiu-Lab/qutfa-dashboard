<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => asset($this->image()),
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'meta_description' => $this->meta_description,
            'products' => ProductRescource::collection($this->whenLoaded('products')),
        ];
    }
}
