<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\purchases;
use App\Models\PurchaseItem;

class CartController extends Controller
{
    public function remove(Carts $id)
    {
        $id->delete();
        return redirect()->back()->with('success', '购物车中的项目已移除。');
    }
    
    public function checkOut(Request $request)
    {
        $userId = auth()->id();
        $cartItems = Carts::where('user_id', $userId)->get();

        $totalPrice = 0; // 初始化总价格
        foreach ($cartItems as $item) {
            $totalPrice += ($item->price / 100) * $item->quantity; // 累加总价格
        }

        $purchase = purchases::create([
            'user_id' => $userId,
            'total_price' => $totalPrice,
            'delivery_method' => $request->input('delivery_method'),
            'status' => 'pending', // 设置状态为待处理
        ]);

        foreach ($cartItems as $item) {
            PurchaseItem::create([
                'purchase_id' => $purchase->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // 从购物车中移除商品
        Carts::where('user_id', $userId)->delete();

        return redirect()->route('order.success')->with('success', '结账成功。');
    }
}



