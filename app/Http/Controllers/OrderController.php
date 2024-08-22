<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        // dd($request->all());
        $price = $request->input('price');
        $image = $request->input('image');
        $quantity = $request->input('quantity', 100); 
        $product = $request->input('product');
        return view('order', compact('price', 'image', 'quantity','product'));
    }

    public function finalOrder(Request $request)
{
    $pricePer100g = $request->input('price');
    $quantity = $request->input('quantity');
    $totalPrice = ($pricePer100g / 100) * $quantity;
    $image = $request->input('image');
    $productName = $request->input('productName');

    return view('finalOrder', compact('totalPrice', 'quantity', 'image'));
}

}
