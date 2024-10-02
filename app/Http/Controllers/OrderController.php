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
        return view('cart', compact('totalPrice', 'quantity', 'image', 'productName'));
    }
    public function addToCart(Request $request, $name)
{
    // Retrieve the authenticated user
    $user = auth()->user();

    // Ensure $user is not null
    if (!$user) {
        return redirect()->route('login'); // Redirect to login if the user is not authenticated
    }

    $productId = $request->input('product_id');
    $quantity = $request->input('quantity', 100);

    // Get product info
    $product = Product::find($productId);

    if (!$product) {
        return redirect()->back()->withErrors('Product not found');
    }

    $price = floatval($product->price); // Ensure price is a float

    // Add or update the product in the user's cart
    $cartItem = Carts::where('user_id', $user->id)
                      ->where('product_id', $productId)
                      ->first();

    if ($cartItem) {
        $cartItem->quantity += $quantity;
        $cartItem->save();
    } else {
        Carts::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'quantity' => $quantity,
            'price' => $price,
            'image' => $product->image,
        ]);
    }

    return redirect('/cart');
}


     
}
