@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow rounded-0">
                <div class="card-header text-white bg-primary">{{ __('Confirm Password') }}</div>
        
                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}
        
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
        
                        <div class="mb-3">
                            <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="mb-0">
                            <div class="text-md-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
