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
}
