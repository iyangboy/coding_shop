<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];

    // protected $fillable = [
    //     'title', 'description', 'image', 'on_sale',
    //     'rating', 'sold_count', 'review_count', 'price'
    // ];

    protected $casts = [
        'on_sale' => 'boolean', // on_sale 是一个布尔类型的字段
    ];

    // 所属分类
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
