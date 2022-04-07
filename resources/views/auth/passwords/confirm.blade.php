@extends('layouts.LandingPage')
@section('content')
<section id="contact-page" class="contact-page section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="heading">
                    <h2 class="text-center">{{ __('Confirm Password') }}</h2>
                    <img src="{{ asset('LandingPage/images/heading-border-effect.png') }}" class="img-fluid" alt="effect">
                </div>
                <div class="faq-form">
                    <form action="{{ route('password.confirm') }}" method="POST">
                        @csrf
                        <div class="form-group col-sm-12">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Your Password" name="password" autocomplete="current-password" required />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>
                        <div class="casino-btn col-sm-12">
                            <input type="submit" value="Confirm Password" class="btn-4 yellow-btn faq-btn" />
                        </div>
                        @if (Route::has('password.request'))
                        <div class="form-group col-sm-12">
                            <a href="{{ route('password.request') }}" class="text-white">{{ __('Forgot Your Password?') }}</a>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
