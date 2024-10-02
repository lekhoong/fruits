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
        return redirect()->back()->with('success');
    }
    
    public function checkOut(Request $request)
{
    // Get the authenticated user's full object 
    $user = auth()->user(); // This retrieves the full user object
    
    // Check if user has an address
    if (!$user->address) {
        return redirect()->route('profile_update', ['name' => $user->name]);
    }
    
    // Retrieve the cart items of the authenticated user
    $userId = $user->id;
    $cartItems = Carts::where('user_id', $userId)->get();
    
    $totalPrice = 0;
    foreach ($cartItems as $item) {
        $totalPrice += ($item->price / 100) * $item->quantity;
    }

    // Create a purchase record
    $purchase = purchases::create([
        'user_id' => $userId,
        'total_price' => $totalPrice,
        'delivery_method' => $request->input('delivery_method'),
        'status' => 'pending',
    ]);

    // Insert purchase items
    foreach ($cartItems as $item) {
        PurchaseItem::create([
            'purchase_id' => $purchase->id,
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->price,
        ]);
    }

    // Clear the cart
    Carts::where('user_id', $userId)->delete();

    // Redirect to track purchases page
    return redirect()->route('track-purchases')->with('success', 'Your purchase has been completed successfully.');
}

public function trackPurchases()
{
    // 获取当前用户的所有购买记录，并加载每个购买的项目
    $userId = auth()->id();
    $purchases = purchases::where('user_id', $userId)->with('items.product')->get();

    // 返回视图并传递数据
    return view('track-purchases', compact('purchases'));
}


}



