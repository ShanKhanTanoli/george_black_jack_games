<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(!is_null(Game::TheFruitsCasino()))
    <title>{{ Game::TheFruitsCasino()->name }}</title>
    @else
    <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

    <!--begin::If is an Admin-->
    @if(Auth::user()->role_id ==1)
    <!--begin::Admin Assets CSS-JS-->
    @include('TheFruitsCasino.partials.Admin.AdminAssets')
    <!--end::Admin Assets CSS-JS-->
    @endif
    <!--end::If is an Admin-->

    <!--begin::If is a User-->
    @if(Auth::user()->role_id ==2)
    @if(Subscriber::GiftCardBalance() > 0)
    <!--begin::User Assets CSS-JS-->
    @include('TheFruitsCasino.partials.User.UserAssets')
    <!--end::User Assets CSS-JS-->
    @else
    <!--begin::If No Gift Card-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!--end::If No Gift Card-->
    @endif
    @endif
     <!--end::If is a User-->
</head>

<body ondragstart="return false;" ondrop="return false;">

    <!--begin::If is an Admin-->
    @if(Auth::user()->role_id ==1)
    <!--begin::Admin Game-->
    @include('TheFruitsCasino.partials.Admin.AdminGame')
    <!--end::Admin Game-->
    @endif
    <!--end::If is an Admin-->

    <!--begin::If is a User-->
    @if(Auth::user()->role_id ==2)
    <!--begin::If Subscriber has Gift Card-->
    @if(Subscriber::GiftCardBalance() > 0)
    <!--begin::User Game-->
    @include('TheFruitsCasino.partials.User.UserGame')
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
