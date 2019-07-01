
<!DOCTYPE HTML>
<html>
	<head>
		<title>WORKSHOP BASIS DATA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
		<link rel="stylesheet" href="assets/css/main.css" >
		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<section id="header">
				<header>
					<h1>MOISTURE</h1>
					<p>OPTIMAL MOISTURE FOR HEALTHY PLANTS</p>
				</header>
				<footer>
					<a href="#banner" class="button style2 scrolly-middle">Know Us Deeper!</a>
				</footer>
			</section>

		<!-- Banner -->
			<section id="banner">
				<header>
					<h2>This is MOISTURE</h2>
				</header>
				<p>A DEVICE THAT HELPED TO KNOW THE SOIL HUMIDITY</p>
				<footer>
		
		<!-- Untuk mengatur tampilan grafik -->
					<a href="#first"  class="button style2 scrolly-middle">Latest Humidity</a>
				</footer>
			</section>
			<section id="first" class="container box style1">
			<div class="is-preload">
				<script type="text/javascript">

					var otomatis = setInterval(function ()
					{
						$('#div').load('chart.php').fadeIn(10);
					}, 5000);
				</script>
			<div id="div"><?php include "chart.php"; ?></div>
				
			</div>
			</section>
	
		<section id="footer">
			<ul class="icons">
				<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon brands fa-google-plus-g"><span class="label">Google+</span></a></li>
				<li><a href="#" class="icon brands fa-pinterest"><span class="label">Pinterest</span></a></li>
				<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
				<li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
			</ul>
			<div class="copyright">
				<ul class="menu">
					<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			</div>
		</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>