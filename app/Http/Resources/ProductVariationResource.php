<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariationResource extends JsonResource
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
            'id'            => $this->id,
            // 'product_id'    => $this->product_id,
            'specification' => $this->specification,
            'price'         => $this->price,
            'stock'         => $this->stock,
            'online'        => $this->online,
            'desc'          => $this->desc(),
        ];
    }
}
