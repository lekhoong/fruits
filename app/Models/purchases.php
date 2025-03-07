<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'delivery_method',
        'status',
    ];

    /**
   
     */
    public function Items()
    {
      
        return $this->hasMany(PurchaseItem::class, 'purchase_id');
    }

    /**
     * 定义与 User 模型的关系
     */
    public function user()
    {
        // 每个 Purchase 属于一个 User
        return $this->belongsTo(User::class, 'user_id');
    }
}
