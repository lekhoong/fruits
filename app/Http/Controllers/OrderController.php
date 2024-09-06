<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Carts;
use App\Models\User;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        // 获取请求中的价格、图片、数量和产品信息
        $price = $request->input('price');
        $image = $request->input('image');
        $quantity = $request->input('quantity', 100); 
        $product = $request->input('product');
        $productId = $request->input('product_id');
        
        // 返回订单视图，并将相关数据传递到视图中
        return view('order', compact('price', 'image', 'quantity', 'product','productId'));
    }

    public function finalOrder(Request $request)
    {
        // 计算总价
        $pricePer100g = $request->input('price');
        $quantity = $request->input('quantity');
        $totalPrice = ($pricePer100g / 100) * $quantity;

        $image = $request->input('image');
        $productName = $request->input('productName');

        // 返回最终订单视图，并将相关数据传递到视图中
        return view('finalOrder', compact('totalPrice', 'quantity', 'image', 'productName'));
    }
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 100);
    
        // 获取产品信息
        $product = Product::find($productId);
    
        if (!$product) {
            return redirect()->back()->withErrors('not found');
        }
        
    
        // 确保价格是浮点数
        $price = floatval($product->price);
    
        $userId = auth()->id();
    
        $cartItem = Carts::where('user_id', $userId)
                          ->where('product_id', $productId)
                          ->first();
    
        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            Carts::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $price, // 确保价格正确
                'image' => $product->image,
            ]);
        }
    
        return redirect('/cart');
    }

     
}
