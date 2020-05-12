<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $guarded = [];

    // 关联商品
    public function items()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    // 购物车
    public function syncProductVariations($products)
    {
        foreach ($products as $variation) {
            $filter = [
                'product_variation_id' => $variation['product_variation_id']
            ];
            $this->items()->updateOrCreate($filter, $variation);
        }
    }
}
