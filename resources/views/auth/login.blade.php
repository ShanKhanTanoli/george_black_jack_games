@extends('layouts.LandingPage')
@section('content')
<section id="contact-page" class="contact-page section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="heading">
                    <h2 class="text-center">Login</h2>
                    <img src="{{ asset('LandingPage/images/heading-border-effect.png') }}" class="img-fluid" alt="effect">
                </div>
                <div class="faq-form">
                    <form action="{{ route('login') }}" method="POST">
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
                            <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Enter Your Password" name="password" autocomplete required />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <a href="{{ route('password.request') }}" class="text-white ">Forgot Password ?</a>
                        </div>
                        <div class="casino-btn col-sm-12 mb-2">
                            <button type="submit" class="yellow-btn-pink-bg">
                                Login
                            </button>
                        </div>
                    </form>
                    <div class="casino-btn col-sm-12 mb-2 mt-2">
                        <a href="{{ route('showQrScanner') }}" class="yellow-btn-pink-bg">
                                Scan Qr Code
                        </a>
                    </div>
                    <div class="form-group col-sm-12">
                        <a href="{{ route('register') }}" class="text-white">{{ __('Create Account') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
