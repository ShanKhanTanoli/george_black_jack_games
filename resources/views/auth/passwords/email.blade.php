@extends('layouts.LandingPage')
@section('content')
<section id="contact-page" class="contact-page section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="heading">
                    <h2 class="text-center">{{ __('Reset Password') }}</h2>
                    <img src="{{ asset('LandingPage/images/heading-border-effect.png') }}" class="img-fluid" alt="effect">
                </div>
                <div class="faq-form">
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-group col-sm-12">
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter Your Email" autocomplete value="{{ old('email') }}" required />
                            @error('email')
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
                        <div class="form-group col-sm-12">
                            <a href="{{ route('login') }}" class="text-white ">Want to Login?</a>
                        </div>
                        <div class="casino-btn col-sm-12">
                            <input type="submit" value="Send Password Reset Link" class="btn-4 yellow-btn faq-btn" />
                        </div>
                        <div class="form-group col-sm-12">
                            <a href="{{ route('register') }}" class="text-white">{{ __('Create Account') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
