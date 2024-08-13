<?php

namespace App\Http\Controllers;

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
}
