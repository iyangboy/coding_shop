<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'desc'                 => $this->variation->desc(),
            'product_variation_id' => $this->product_variation_id,
            'quantity'             => $this->quantity,
            'price'                => $this->price,
        ];
    }
}
