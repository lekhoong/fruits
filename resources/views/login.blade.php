@extends('layouts.app')

@section('content')
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 logo_section">
                <a href={{ route('index') }}><img src="images/logo.png" alt="#" /></a>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>{{ __('Login') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">{{ __('Email Address') }}</label>
                            <br>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">{{ __('Password') }}</label>
                            <br>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                        <div class="form-group mt-3 text-center">
                            <p>{{ __("Don't have an account?") }}</p>
                            <a href="{{ route('create') }}" class="btn btn-secondary">{{ __('Register Here') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
