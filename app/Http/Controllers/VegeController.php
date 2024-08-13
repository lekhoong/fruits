<?php

namespace App\Http\Controllers;

use App\Models\Veges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class VegeController extends Controller
{
    public function register(Request $request){
        $formFields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:veges,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // $user = new veges();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();

        // Hash the password
        $formFields['password'] = Hash::make($formFields['password']);
        
        // Create the user
        $user = Veges::create($formFields);

        // Log the user in
        // auth()->login($user);

        // Send welcome email
        Mail::to($user->email)->send(new WelcomeMail($user));
    
        // Redirect to login page
        return redirect('/login')->with('status', 'Registration successful! Please log in.');
    }
}
