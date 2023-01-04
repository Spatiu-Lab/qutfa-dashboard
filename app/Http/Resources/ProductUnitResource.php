<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductUnitResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->product->name,
            'image'         => asset($this->product->image()),
            'description'   => strip_tags($this->product->description),
            'unit'          => $this->unit->name,
            'category'      => CategoryResource::make($this->whenLoaded('category'))
        ];
    }
}
