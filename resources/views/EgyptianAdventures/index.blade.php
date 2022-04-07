<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!--begin::Assets-->
    @if(Auth::user()->role_id ==1)
    <!--begin::Admin Assets CSS-JS-->
    @include('EgyptianAdventures.partials.Assets.Assets')
    <!--end::Admin Assets CSS-JS-->
    @endif
    <!--end::Assets-->

    @if(Auth::user()->role_id ==2)
    <!--begin::If Subscriber has Gift Card-->
    @if(Subscriber::GiftCardBalance() > 0)
    <!--begin::User Assets CSS-JS-->
    @include('EgyptianAdventures.partials.Assets.Assets')
    <!--end::User Assets CSS-JS-->
    @else
    <!--begin::If Subscriber has has not a Gift Card-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!--end::If Subscriber has has not a Gift Card-->
    @endif
    <!--end::If Subscriber has Gift Card-->
    @endif
    
    <body ondragstart="return false;" ondrop="return false;" >
    @if(Auth::user()->role_id ==1)
    <!--begin::Admin Game-->
    @include('EgyptianAdventures.partials.Admin.AdminGame')
    <!--end::Admin Game-->
    @endif
    
    <!--begin::If is a User-->
    @if(Auth::user()->role_id ==2)
    <!--begin::If Subscriber has Gift Card-->
    @if(Subscriber::GiftCardBalance() > 0)
    <!--begin::User Game-->
    @include('EgyptianAdventures.partials.User.UserGame')
    <!--end::User Game-->
    @else
    <!--begin::No Coins-->
    @include('errors.NoCoins')
    <!--end::No Coins-->
    @endif
    <!--end::If Subscriber has Gift Card-->
    @endif
    </body>
</html>