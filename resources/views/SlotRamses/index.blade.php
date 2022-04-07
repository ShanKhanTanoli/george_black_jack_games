<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
    <meta name="msapplication-tap-highlight" content="no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @if(!is_null(Game::SlotRamses()))
    <title>{{ Game::SlotRamses()->name }}</title>
    @else
    <title>{{ config('app.name', 'Laravel') }}</title>
    @endif


    @if(Auth::user()->role_id ==1)
    <!--begin::If is an Admin-->

    <!--begin::Admin Assets CSS-JS-->
    @include('SlotRamses.partials.Admin.AdminAssets')
    <!--end::Admin Assets CSS-JS-->

    <!--end::If is an Admin-->
    @endif
    

    <!--begin::If is a User-->
    @if(Auth::user()->role_id ==2)
    <!--begin::If Subscriber has Gift Card-->
    @if(Subscriber::GiftCardBalance() > 0)
    <!--begin::User Assets CSS-JS-->
    @include('SlotRamses.partials.User.UserAssets')
    <!--end::User Assets CSS-JS-->
    @else
    <!--begin::If Subscriber has has not a Gift Card-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!--end::If Subscriber has has not a Gift Card-->
    @endif
    <!--end::If Subscriber has Gift Card-->
    @endif
    <!--end::If is a User-->
</head>

<body ondragstart="return false;" ondrop="return false;">
    
    @if(Auth::user()->role_id ==1)
    <!--begin::If is an Admin-->

    <!--begin::Admin Game-->
    @include('SlotRamses.partials.Admin.AdminGame')
    <!--end::Admin Game-->

    <!--end::If is an Admin-->
    @endif
    
    <!--begin::If is a User-->
    @if(Auth::user()->role_id ==2)

    <!--begin::If Subscriber has Gift Card-->
    @if(Subscriber::GiftCardBalance() > 0)
    <!--begin::User Game-->
    @include('SlotRamses.partials.User.UserGame')
    <!--end::User Game-->
    @else
    <!--begin::No Coins-->
    @include('errors.NoCoins')
    <!--end::No Coins-->
    @endif
    <!--end::If Subscriber has Gift Card-->

    @endif
    <!--end::If is a User-->
</body>

</html>
