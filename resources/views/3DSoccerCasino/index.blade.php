<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(!is_null(Game::SoccerCasino()))
    <title>{{ Game::SoccerCasino()->name }}</title>
    @else
    <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

    <!--begin::If is an Admin-->
    @if(Auth::user()->role_id ==1)
    <!--begin::Admin Assets CSS-JS-->
    @include('3DSoccerCasino.partials.Admin.AdminAssets')
    <!--end::Admin Assets CSS-JS-->
    @endif
    <!--end::If is an Admin-->


    <!--begin::If is a User-->
    @if(Auth::user()->role_id ==2)
    <!--begin::If Subscriber has a Gift Card-->
    @if(Subscriber::GiftCardBalance() > 0)
    <!--begin::User Assets CSS-JS-->
    @include('3DSoccerCasino.partials.User.UserAssets')
    <!--end::User Assets CSS-JS-->
    @else
    <!--begin::If Subscriber has has not a Game Subscription-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!--end::If Subscriber has has not a Game Subscription-->
    @endif
    <!--end::If Subscriber has a Gift Card-->
    @endif
    <!--end::If is a User-->

</head>

<body ondragstart="return false;" ondrop="return false;">

    <!--begin::If is an Admin-->
    @if(Auth::user()->role_id ==1)
    <!--begin::Admin Game-->
    @include('3DSoccerCasino.partials.Admin.AdminGame')
    <!--end::Admin Game-->
    @endif
    <!--end::If is an Admin-->

    <!--begin::If is a User-->
    @if(Auth::user()->role_id ==2)

    <!--begin::If Subscriber has a Gift Card-->
    @if(Subscriber::GiftCardBalance() > 0)

    <!--begin::User Game-->
    @include('3DSoccerCasino.partials.User.UserGame')
    <!--end::User Game-->
    
    @else
    <!--begin::No Coins-->
    @include('errors.NoCoins')
    <!--end::No Coins-->
    @endif
    <!--end::If Subscriber has a Gift Card-->
    
    @endif
    <!--end::If is a User-->
</body>

</html>
