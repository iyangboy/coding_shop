<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

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
    public function syncProducts($products)
    {
        foreach ($products as $variation) {
            $filter = [
                'product_variation_id' => $variation['product_variation_id']
            ];
            $this->items()->updateOrCreate($filter, Arr::except($variation, ['desc']));
        }

        //
        $variations = Arr::pluck($products, ['product_variation_id']);
        // dd($variations);
        foreach ($this->items as $item) {
            if (!in_array($item->product_variation_id, $variations, true)) {
                // 删除
                $item->delete();
            }
        }
    }

    // 清空购物车
    public function empty()
    {
        $this->items()->delete();
    }
}
