<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchases extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'delivery_method',
        'status',
    ];
    public function items()
    {
        return $this->hasMany(PurchaseItem::class,'purchase_id');
    }
}
