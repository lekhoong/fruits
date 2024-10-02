<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Carts;
use App\Models\Product;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        return view('index');
    }

    public function create(){
        return view('register');
    }

    public function showLoginForm(){
        return view('login');
    }

    public function showJuiceForm(){
        $products=Product::all();
        return view('juice',compact("products"));
    }

    public function verify(){
        return view('verify');
    }

    public function profile($name){
        $user=User::where('name', $name)->firstOrFail();
        return view('profile',compact('user'));
    }

    public function viewCart()
    {
        // Get the authenticated user
        $user = auth()->user();
    
        // Get the cart items for the authenticated user
        $cartItems = Carts::where('user_id', $user->id)->get();
    
        // Calculate the total price
        $totalPrice = $cartItems->sum(function ($item) {
            return ($item->price / 100) * $item->quantity;
        });
    
        // Pass the cart items, total price, and user to the view
        return view('cart', compact('cartItems', 'totalPrice', 'user'));
    }
    
    
    
    
    

}   
