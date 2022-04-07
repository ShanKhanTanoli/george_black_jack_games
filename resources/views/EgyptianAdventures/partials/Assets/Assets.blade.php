    <head>
        @if(!is_null(Game::EgyptianNights()))
        <title>{{ Game::EgyptianNights()->name }}</title>
        @else
        <title>{{ config('app.name', 'Laravel') }}</title>
        @endif
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('EgyptianAdventures/css/reset.css')}}" type="text/css">
        <link rel="stylesheet" href="{{ asset('EgyptianAdventures/css/main.css')}}" type="text/css">
        <link rel="stylesheet" href="{{ asset('EgyptianAdventures/css/orientation_utils.css')}}" type="text/css">
        <link rel='shortcut icon' type='image/x-icon' href="{{ asset('EgyptianAdventures/favicon.ico')}}" />
        <link rel="stylesheet" href="{{ asset('EgyptianAdventures/css/ios_fullscreen.css')}}" type="text/css">

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
        <meta name="msapplication-tap-highlight" content="no"/>

        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/jquery-2.0.3.min.js')}}"></script>

        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/createjs-2015.11.26.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/howler.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/screenfull.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/platform.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/ios_fullscreen.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/ctl_utils.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/sprite_lib.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/settings.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CSlotSettings.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CLang.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CPreloader.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CMain.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CTextButton.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CGfxButton.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CToggle.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CBetBut.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CMenu.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CGame.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CReelColumn.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CInterface.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CPayTablePanel.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CStaticSymbolCell.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CTweenController.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CMsgBox.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CVector2.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CFormatText.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CWheelBonus.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CBonusPanel.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CLedsBonus.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CSlotLogic.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CCreditsPanel.js')}}"></script>
        <script type="text/javascript" src="{{ asset('EgyptianAdventures/js/CCTLText.js')}}"></script>
    </head>