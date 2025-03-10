<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\WelcomeMail;
use App\Models\User;

class VegeController extends Controller
{
    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        // Validate the request data
        $formFields = $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        // Hash the password
        $formFields['password'] = Hash::make($formFields['password']);
        
        // Generate OTP
        $otp = Str::random(6);

        // Store OTP and set expiration time
        $formFields['otp'] = $otp;
        // $formFields['otp_expires_at'] = now()->addMinutes(5);

        // Create the user in the users model
        $user = User::create($formFields);

        // Send a welcome email with the OTP
        Mail::to($user->email)->send(new WelcomeMail($user, $otp));

        // Redirect to the OTP verification page
        return redirect('/verify')->with('status', 'Registration successful! Please verify your email with the OTP.');
    }

    /**
     * Verify the OTP provided by the user
     */
    public function verifyOtp(Request $request)
    {
        // Validate the provided OTP
        $request->validate(['otp' => 'required|string']);

        // Find the user with the matching OTP and make sure it's not expired
        $user = User::where('otp', $request->otp)
                    //  ->where('otp_expires_at', '>=', now())
                     ->first();

        if ($user) {
            // OTP verified successfully, mark the email as verified
            $user->email_verified_at = now();
            $user->otp = null; // Clear the OTP
            $user->save();

            // Redirect to login page with success message
            return redirect('/login')->with('status', 'Email verified successfully! Please log in.');
        } else {
            // OTP verification failed
            return back()->withErrors(['otp' => 'Invalid or expired OTP']);
        }
    }
    public function login(Request $request)
    {
        // 获取登录数据
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // 检查邮箱是否已验证
            if ($user->email_verified_at == null) {
                return redirect('/verify')->withErrors(['email' => 'Please verify your email.']);
            }
    
            // 根据角色重定向
            if ($user->role === 'admin') {
                return redirect('/admin')->with('status', 'Welcome to the Admin Dashboard!');
            } else {
                return redirect()->intended('/vegetables')->with('status', 'Welcome to the Vegetable Market!');
            }
        }
    
        // 登录失败，返回错误消息
        return redirect('/login')->withErrors(['email' => 'Invalid credentials.']);
    }
        public function logoutFunction(){
            Auth::logout();
            return redirect('/vegetables');
        }

        public function updateProfile(Request $request, $name)
        {
            // 验证请求数据
            $formFields = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone_number' => 'string|nullable',
                'address' => 'string|nullable|max:255',
                'address2' => 'nullable|string|nullable|max:255',
                'city' => 'string|nullable|max:255',
                'state' => 'string|nullable|max:255',
            ]);
        
            // 根据用户名查找用户
            $user = User::where('name', $name)->firstOrFail();
        
            // 更新用户详细信息
            $user->update($formFields);
        
            // 成功更新后重定向并显示成功信息
            return redirect('/vegetables')->with('status', 'Profile updated successfully!');
        }
        
        

}
