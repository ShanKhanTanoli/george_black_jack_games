    <head>
        @if(!is_null(Game::EgyptianNights()))
        <title>{{ Game::EgyptianNights()->name }}</title>
        @else
        <title>{{ config('app.name', 'Laravel') }}</title>
        @endif
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('EgyptianNights/css/reset.css')}}" type="text/css">
        <link rel="stylesheet" href="{{ asset('EgyptianNights/css/main.css')}}" type="text/css">
        <link rel="stylesheet" href="{{ asset('EgyptianNights/css/orientation_utils.css')}}" type="text/css">
        <link rel='shortcut icon' type='image/x-icon' href="{{ asset('EgyptianNights/favicon.ico')}}" />
        <link rel="stylesheet" href="{{ asset('EgyptianNights/css/ios_fullscreen.css')}}" type="text/css">

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
        <meta name="msapplication-tap-highlight" content="no"/>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/jquery-2.0.3.min.js')}}"></script>

        <script type="text/javascript" src="{{ asset('EgyptianNights/js/createjs-2015.11.26.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/howler.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/screenfull.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/platform.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/ios_fullscreen.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/ctl_utils.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/sprite_lib.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/settings.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CSlotSettings.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CLang.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CPreloader.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CMain.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CTextButton.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CGfxButton.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CToggle.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CBetBut.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CMenu.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CGame.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CReelColumn.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CInterface.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CPayTablePanel.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CStaticSymbolCell.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CTweenController.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CMsgBox.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CVector2.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CFormatText.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CWheelBonus.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CBonusPanel.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CLedsBonus.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CSlotLogic.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CCreditsPanel.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianNights/js/CCTLText.js')}}"></script>
    </head>