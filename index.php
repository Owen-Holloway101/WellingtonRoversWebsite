<?php
//Internet explorer 10 and below are broken
if(preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT']))
{
	header("Location: /core/iepage.html");
	die();
}

require_once $_SERVER["DOCUMENT_ROOT"]."/core/corestyles.php";

?>

<head>
	<title>Welly - Home</title>
</head>

<body class="welly-red">
<div class="parallax-container">
	<?php
	if (isMobile()) {
		echo "<div class=\"parallax\"><img src=\"/assets/wellydoingthings_mobile/group.jpg\"></div>";
	} else {
		echo "<div class=\"parallax\"><img src=\"/assets/wellydoingthings/group.jpg\"></div>";
	}
	?>
</div>
  
<div class="section white">
	<div class="row container">
		<h2 class="header">Wellington Rover Crew</h2>
		<p class="grey-text text-darken-3 lighten-3">
		Welcome to the Wellington Rover Crew home page.<br>
		<br>
		Wellington Rovers are one of the two Rover Crews located in the Wellington District in Southern Tasmania. We are situated down at the 10th Hobart Scout Hall on the Marieville Esplanade, Battery Point backing on to the Derwent Estuary (near the playground).
		<br>
		<br>
		We currently meet every Thursday between 8pm and 10pm although we do occasionally go over this timeframe. Our program is active with various activities to situate all Rovers and newcomers. 
		<br>
		<br>
		What we do: ANZAC Day, rockclimbing, cocktail parties, iceblocking, bushwalking, camping, rafting, movie nights, abseiling, poker and casino nights, pub nights, Clean Up Australia day, four wheel driving, salsa dancing, bike rides, cooking, campcraft, swimming, moots (state, national and international Rover gatherings), costume parties, beach walks ...... whatever you want really, if you want to do, then we can do it...to a certain degree, that is.
		<br>
		</div>
</div>

<div class="parallax-container">
	<?php
	if (isMobile()) {
		echo "<div class=\"parallax\"><img src=\"/assets/wellydoingthings_mobile/snow.jpg\"></div>";
	} else {
		echo "<div class=\"parallax\"><img src=\"/assets/wellydoingthings/snow.jpg\"></div>";
	}
	?>
</div>


<footer class="page-footer welly-blue">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">Footer Content</h5>
				<p class="grey-text text-lighten-4">Look at this pretty footer</p>
			</div>
			<div class="col l4 offset-l2 s12">
				<h5 class="white-text">Links</h5>
				<ul>
				<li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
				<li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
				<li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
				<li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
		© 2015 Wellington Rover Crew
		</div>
	</div>
</footer>

</body>