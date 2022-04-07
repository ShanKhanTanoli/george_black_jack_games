@extends('layouts.LandingPage')
@section('header-scripts')
 <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
@endsection
@section('content')
<!-- All games Start -->
@include('LandingPage.partials.QRScanner')
<!-- All game End -->
@endsection
