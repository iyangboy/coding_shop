<?php

namespace App\Http\Requests\Api;

class CartAddItemsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'products' => "required|array",

            'products.*.product_variation_id' => "required|exists:product_variations,id",
            'products.*.quantity'             => "required|numeric|min:1",
            'products.*.price'                => "required",
        ];
    }
}
