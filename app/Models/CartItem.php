<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    //
    protected $guarded = [];

    // 所属购物车
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    // 商品规格
    public function variation()
    {
        return $this->belongsTo(ProductVariation::class, 'product_variation_id');
    }

}
