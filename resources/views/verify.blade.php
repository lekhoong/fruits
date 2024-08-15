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
                    <h3>{{ __('VERIFY OTP') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('otp.verify') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="otp"></label>
                            <br>
                            <input id="otp" type="text" class="form-control" name="otp" value="{{ old('otp') }}" required autofocus>
                        </div>
                        @error('otp')
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group mb-0 text-center">
                            <br>
                            <button type="submit" class="btn btn-custom w-100">
                                {{ __('SUBMIT') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
