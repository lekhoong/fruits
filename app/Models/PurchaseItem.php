<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'product_id',
        'quantity',
        'price',
    ];

    // 定义与 Purchase 的关系
    public function purchase()
    {
      
        return $this->belongsTo(Purchases::class, 'purchase_id');
    }

    // 定义与 Product 的关系
    public function product()
    {
        // 确保外键是正确的
        return $this->belongsTo(Product::class, 'product_id');
    }
}
