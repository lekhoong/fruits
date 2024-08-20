@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>{{ __('Edit Profile') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile_update', ['name' => $user->name]) }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">{{ __('Name') }}</label>
                            <br>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">{{ __('Email Address') }}</label>
                            <br>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>    
                        @error('email')
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group mb-3">
                            <label for="phone_number">{{ __('phone number') }}</label>
                            <br>
                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                            <br>
                        </div> 
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                        <div class="form-group mb-3">
                            <label for="address">{{ __('Address') }}</label>
                            <br>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $user->address) }}">
                            <br>
                        </div> 
                        @error('address')
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="form-group mb-3">
                            <label for="address2">{{ __('Address 2 (optional)') }}</label>
                            <br>
                            <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{ old('address2', $user->address2) }}">
                        </div>
                        @error('address2')
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="form-group mb-3">
                            <label for="city">{{ __('City') }}</label>
                            <br>
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city', $user->city) }}">
                        </div>
                        @error('city')
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="form-group mb-3">
                            <label for="state">{{ __('State') }}</label>
                            <br>
                            <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state', $user->state) }}">
                        </div>
                        @error('state')
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                        <div class="form-group mb-0 text-center">
                            <br>
                            <button type="submit" class="btn btn-custom w-100">
                                {{ __('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
