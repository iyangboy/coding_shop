<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    //
    protected $guarded = [];

    protected $dates = ['last_used_at'];

    // 地址
    public function getFullAddressAttribute()
    {
        return "{$this->province}{$this->city}{$this->district}{$this->address}";
    }

    // 所属用户
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
