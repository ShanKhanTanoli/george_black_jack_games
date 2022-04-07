<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->

<head>

    <!--begin::If is an Admin-->
    @if(Auth::user()->role_id == 1)
    <!--begin::CSS-JS etc-->
    @include('luckyChristmas.partials.Admin.AdminAssets')
    <!--end::CSS-JS etc-->
    @endif
    <!--end::If is a Admin-->

    <!--begin::If is a User-->
    @if(Auth::user()->role_id == 2)
    <!--begin::If Subscriber has a GiftCard-->
    @if(Subscriber::GiftCardBalance() > 0)

    <!--begin::CSS-JS etc-->
    @include('luckyChristmas.partials.User.UserAssets')
    <!--end::CSS-JS etc-->

    @else
    <!--begin::If Subscriber has has not a Game Subscription-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!--end::If Subscriber has has not a Game Subscription-->

    @endif
    <!--end::If Subscriber has a GiftCard-->
    @endif
    <!--end::If is a User-->
</head>

<body ondragstart="return false;" ondrop="return false;">
    <!--begin::If is an Admin-->
    @if(Auth::user()->role_id == 1)
    <!--begin::Game-->
    @include('luckyChristmas.partials.Admin.AdminGame')
    <!--end::Game-->
    @endif
    <!--end::If is a Admin-->


    <!--begin::If is an User-->
    @if(Auth::user()->role_id == 2)

    <!--begin::If Subscriber has GiftCard-->
    @if(Subscriber::GiftCardBalance() > 0)

    <!--begin::Game-->
    @include('luckyChristmas.partials.User.UserGame')
    <!--end::Game-->

    @else
    <!--begin::No Coins-->
    @include('errors.NoCoins')
    <!--end::No Coins-->
    @endif
    <!--end::If Subscriber has GiftCard-->

    @endif
    <!--end::If is a User-->
</body>

</html>
