<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    // 指定与表相关联
    protected $table = 'products';

    // 定义 `Product` 与 `Cart` 之间的关系
    public function carts()
    {
        return $this->hasMany(Carts::class, 'product_id');
    }
}

