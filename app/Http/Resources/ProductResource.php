<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'           => $this->id,
            'slug'         => $this->slug,
            'category_id'  => $this->category_id,
            'category_name' => $this->category->name ?? '',
            'brand'        => $this->brand,
            'title'        => $this->title,
            'image'        => $this->image,
            'price'        => $this->price,
            'rating'       => $this->rating,
            'sold_count'   => $this->sold_count,
            'review_count' => $this->review_count,
            'desc'         => $this->description,
            'description'  => $this->description,

            'specs'  => $this->specification,


        ];
    }
}
