@extends('layouts.LandingPage')
@section('content')
<section id="contact-page" class="contact-page section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="heading">
                    <h2 class="text-center">Register</h2>
                    <img src="{{ asset('LandingPage/images/heading-border-effect.png') }}" class="img-fluid" alt="effect">
                </div>
                <div class="faq-form">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group col-sm-12">
                            <input class="form-control @error('firstname') is-invalid @enderror" type="text" name="firstname" placeholder="Enter Your First Name" autocomplete value="{{ old('firstname') }}" required />
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <input class="form-control @error('lastname') is-invalid @enderror" type="text" name="lastname" placeholder="Enter Your Last Name" autocomplete value="{{ old('lastname') }}" required />
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
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
                            <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Confirm Your Password" name="password_confirmation" autocomplete required />
                        </div>
                        <div class="casino-btn col-sm-12">
                            <button type="submit" class="yellow-btn-pink-bg">Register</button>
                        </div>
                        <div class="form-group col-sm-12">
                            <a href="{{ route('login') }}" class="text-white">{{ __('Already have an Account ? Login') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
