@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>{{ __('Login') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login_form') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">{{ __('Email Address') }}</label>
                            <br>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>    
                            @error('email')
                            <span class="invalid-feedback" role="alert" style="color:red">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <div class="form-group mb-3">
                            <label for="password">{{ __('Password') }}</label>
                            <br>
                            <input id="password" type="password" class="form-control" name="password" required value="{{ old('password') }}">
                        </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert" style="color:red">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <button type="submit" class="btn btn-primary w-100" style="
                            background: linear-gradient(135deg, #FFA07A 0%, #FF7043 100%);
                            border: none;
                            padding: 12px;
                            font-weight: 600;
                            border-radius: 8px;
                            transition: all 0.3s ease;
                            margin-top: 10px;
                            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                        ">{{ __('Login') }}</button>
                        <div class="form-group mt-3 text-center">
                            <p>{{ __("Don't have an account?") }}</p>
                            <a href="{{ route('register') }}" class="btn btn-secondary">{{ __('Register Here') }}</a>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection