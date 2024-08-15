@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>{{ __('Register') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('vegetables.register') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">{{ __('Name') }}</label>
                            <br>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">{{ __('Email Address') }}</label>
                            <br>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>    
                        @error('email')
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group mb-3">
                            <label for="password">{{ __('Password') }}</label>
                            <br>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            <br>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <br>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                        <div class="form-group mb-0 text-center">
                            <br>
                            <button type="submit" class="btn btn-custom w-100">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
