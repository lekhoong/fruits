<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// Model representing an item within a purchase
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
        return $this->belongsTo(purchases::class);
    }

    // 定义与 Product 的关系
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}