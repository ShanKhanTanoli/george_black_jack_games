<head>
    @if(!is_null(Game::SlotMania()))
    <title>{{ Game::SlotMania()->name }}</title>
    @else
    <title>{{ config('app.name', 'Laravel') }}</title>
    @endif
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('SlotMania/css/reset.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('SlotMania/css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('SlotMania/css/orientation_utils.css')}}" type="text/css">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('SlotMania/favicon.ico')}}" />
    <link rel="stylesheet" href="{{ asset('SlotMania/css/ios_fullscreen.css')}}" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
    <meta name="msapplication-tap-highlight" content="no" />
    <script type="text/javascript" src="{{ asset('SlotMania/js/jquery-2.0.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/createjs-2015.11.26.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/howler.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/screenfull.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/platform.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/ios_fullscreen.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/ctl_utils.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/sprite_lib.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/settings.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CSlotSettings.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CLang.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CPreloader.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CMain.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CTextButton.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CGfxButton.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CToggle.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CBetBut.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CMenu.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CGame.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CReelColumn.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CInterface.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CPayTablePanel.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CStaticSymbolCell.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CTweenController.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CMsgBox.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CVector2.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CFormatText.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CWheelBonus.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CBonusPanel.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CLedsBonus.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CSlotLogic.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CCreditsPanel.js')}}"></script>
    <script type="text/javascript" src="{{ asset('SlotMania/js/CCTLText.js')}}"></script>
</head>
