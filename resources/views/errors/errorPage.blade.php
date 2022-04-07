@extends('layouts.LandingPage')
@section('content')
<!-- 404 page Start -->
<section class="error">
    <div class="container">
        <div class="row">
            <div class="col-md-12 error-center">
                <div class="error-txt">
                    <h4>error</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 error-btn">
                <div class="casino-btn">
                    <a href="{{ url('/') }}">go back to home</a></div>
            </div>
        </div>
    </div>
</section>
<!-- 404 page End -->
@endsection
