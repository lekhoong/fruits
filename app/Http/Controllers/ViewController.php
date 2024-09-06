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
    // 获取当前用户
    $user = auth()->User();
    
    // // 获取用户的地址列表
    // $addresses = $user->addresses; // 假设你在 User 模型中有一个 addresses 关系
    
    // 获取购物车项目
    $cartItems = Carts::where('user_id', $user->id)->get();
    
    // 计算总价格
    $totalPrice = $cartItems->sum(function ($item) {
        return ($item->price / 100) * $item->quantity;
    });
    
    // 将购物车项目、总价格和地址传递到视图
    return view('cart', compact('cartItems','totalPrice'));
}
    
    
    
    

}   
