<?php

namespace App\Http\Controllers;
use App\Models\User;

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
        return view('juice');
    }

    public function verify(){
        return view('verify');
    }

    public function profile($username){
        $user=User::where('name', $username)->firstOrFail();
        return view('profile',compact('user'));
    }
}   
