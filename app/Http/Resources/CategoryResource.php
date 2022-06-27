<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JetBrains\PhpStorm\ArrayShape;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    #[ArrayShape(['id' => "mixed", 'name' => "mixed", 'slug' => "mixed", 'description' => "mixed", 'created_at' => "mixed", 'updated_at' => "mixed", 'image' => "mixed"])] public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'image' => $this->image, //TODO: add image url
//            'products' => ($this->foods) ? FoodResource::collection($this->foods) : null,
        ];
    }
}
