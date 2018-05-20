<!DOCTYPE html>
<html>
<head>
	<title>香草網誌</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0 user-scalable=no">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
	<div id="app">
		<div class="app">
			<header id="header" class="borderbox">
				<hamburger></hamburger>
			</header>

			<div class="body-container borderbox" id="body-container">
				<section>
					<article id="slider">
						<slider></slider>
					</article>

					<article id="detail">
						<detail></detail>
					</article>

					<article id="site">
						<div class="container map borderbox">
							<tab></tab>

							<div class="right-box">
								<gmapmap name="map"></gmapmap>
							</div>
						</div>
					</article>

				</section>
			</div>

			<vuefooter></vuefooter>
			<tree></tree>
			<sun></sun>
			<cloud></cloud>
			
		</div>

		<sidebar></sidebar>
		<detailswiper></detailswiper>


	</div>


	
	<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE_-UWOXAUeq_kY7a1WXm1u6P0oqW23l4" ></script>
	<script src="{{asset('js/vendor.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>
	<script type="text/javascript">
		function includeLinkStyle(url) {
			var link = document.createElement("link");
			link.rel = "stylesheet";
			link.type = "text/css";
			link.href = url;
			document.getElementsByTagName("head")[0].appendChild(link);
		}

		var isFirefox = navigator.userAgent.match("Firefox"); 
		var isIE = (/Trident\/7\./).test(navigator.userAgent);
		var isOpera = navigator.userAgent.match("Opera"); 
		if (isIE)
		{
			includeLinkStyle("{{asset('css/ie.css')}}") 
		}
		if (isFirefox)
		{
			includeLinkStyle("{{asset('css/firefox.css')}}")
		}          
	</script>
</body>
</html>