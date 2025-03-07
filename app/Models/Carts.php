<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table = 'carts';
    protected $fillable = ['user_id', 'product_id', 'quantity', 'price', 'image'];

    // 定义与 `Product` 的关系a
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

