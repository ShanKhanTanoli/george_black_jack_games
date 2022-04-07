<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Lamp of Aladdin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<link rel="apple-touch-icon" sizes="256x256" href="{{ asset('Aladin/icon-256.png') }}" />
		<meta name="HandheldFriendly" content="true" />
		<meta name="mobile-web-app-capable" content="yes" />
		<link rel="shortcut icon" sizes="256x256" href="{{ asset('Aladin/icon-256.png') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('Aladin/css/style.css') }}">		
	</head>
	<body>
		<div id="fb-root"></div>
		<div id="c2canvasdiv">
			<canvas id="c2canvas">
			<h1>Your browser does not appear to support HTML5.  Try upgrading your browser to the latest version.  <a href="http://www.whatbrowser.org">What is a browser?</a>
			<br/><br/><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx">Microsoft Internet Explorer</a><br/>
			<a href="http://www.mozilla.com/firefox/">Mozilla Firefox</a><br/>
			<a href="http://www.google.com/chrome/">Google Chrome</a><br/>
			<a href="http://www.apple.com/safari/download/">Apple Safari</a></h1>
			</canvas>
		</div>
		<script src="{{ asset('Aladin/jquery-2.1.1.min.js') }}"></script>
		<script src="{{ asset('Aladin/c2runtime.js') }}"></script>
		<script>
				jQuery(document).ready(function (){
					// Create new runtime using the c2canvas
					cr_createRuntime("c2canvas");
					var canvas = document.getElementById("c2canvas");
					canvas.width  = window.innerWidth;
					canvas.height = window.innerHeight;
				});
		</script>
	</body>
</html>