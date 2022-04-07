<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
@if(!is_null(Game::luckyChristmas()))
<title>{{ Game::luckyChristmas()->name }}</title>
@else
<title>{{ config('app.name', 'Laravel') }}</title>
@endif
<link rel="stylesheet" href="{{ asset('luckyChristmas/css/reset.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('luckyChristmas/css/main.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('luckyChristmas/css/orientation_utils.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('luckyChristmas/css/ios_fullscreen.css') }}" type="text/css">
<meta name="msapplication-tap-highlight" content="no" />
<script type="text/javascript" src="{{ asset('luckyChristmas/js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/createjs-2015.11.26.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/platform.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/ios_fullscreen.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/howler.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/screenfull.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/platform.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/ios_fullscreen.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/ctl_utils.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/sprite_lib.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/settings.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CSlotSettings.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CLang.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CPreloader.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CMain.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CTextButton.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CGfxButton.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CToggle.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CBetBut.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CMenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CGame.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CReelColumn.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CInterface.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CPayTablePanel.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CStaticSymbolCell.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CTweenController.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CBonusPanel.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckyChristmas/js/CCreditsPanel.js') }}"></script>
