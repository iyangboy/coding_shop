<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    //
    protected $guarded = [];

    protected $casts = [
        'online'        => 'boolean',
        'specification' => 'array'
    ];

    // 所属商品
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // 产品名称以及规格
    public function desc()
    {
        $desc = $this->product->title . ' : ';

        foreach ($this->specification as $tiem) {
            $desc .= $tiem . ' ';
        }

        return $desc;
    }
}
