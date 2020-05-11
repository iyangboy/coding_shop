<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];

    // protected $fillable = [
    //     'title', 'description', 'image', 'on_sale',
    //     'rating', 'sold_count', 'review_count', 'price'
    // ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $casts = [
        'on_sale'       => 'boolean',
        'specification' => 'array'
    ];

    public function scopeFilter(Builder $builder)
    {
        $allow_filters = ['search', 'category_id'];

        $filters = request()->query();
        foreach ($filters as $field => $value) {
            if ($value && in_array($field, $allow_filters)) {
                switch ($field) {
                    case 'search':
                        if ($search = $value) {
                            $like = '%' . $search . '%';
                            $builder->where('title', 'like', $like);
                        }
                        break;
                    default:
                        $builder->where($field, $value);
                }
            }
        }
    }

    // 所属分类
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    // 商品规格参数
    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id');
    }
}
