<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0,minimal-ui,shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(!is_null(Game::luckySlot()))
    <title>{{ Game::luckySlot()->name }}</title>
    @else
    <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

    @if(Auth::user()->role_id == 1)
    @include('LuckySlotMachine.partials.Admin.AdminHead')
    @endif


    <!--begin::If is a User-->
    @if(Auth::user()->role_id ==2)

    <!--begin::If Subscriber has GiftCard-->
    @if(Subscriber::GiftCardBalance() > 0)

    <!--begin::User Assets CSS-JS-->
    @include('LuckySlotMachine.partials.Admin.AdminHead')
    <!--end::User Assets CSS-JS-->

    @else
    <!--begin::If Subscriber has has not a GiftCard-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!--end::If Subscriber has has not a GiftCard-->

    @endif
    <!--end::If Subscriber has GiftCard-->

    @endif
    <!--end::If is a User-->
</head>

<body>
    <div style="font-family:bebas; position:absolute; left:-1000px; visibility:hidden;">.</div>

    @if(Auth::user()->role_id == 1)
    @include('LuckySlotMachine.partials.Admin.AdminScripts')
    @endif

    <!--begin::If is a User-->
    @if(Auth::user()->role_id ==2)

    <!--begin::If Subscriber has GiftCard-->
    @if(Subscriber::GiftCardBalance() > 0)

    <!--begin::User Game-->
    @include('LuckySlotMachine.partials.User.UserScripts')
    <!--end::User Game-->
    @else

    <!--begin::If Subscriber has has not a GiftCard-->
    <!--begin::No Coins-->
    @include('errors.NoCoins')
    <!--end::No Coins-->
    <!--end::If Subscriber has has not a GiftCard-->
    
    @endif
    <!--end::If Subscriber has GiftCard-->
    @endif
    <!--end::If is a User-->
</body>

</html>
