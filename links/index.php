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
		echo "<div class=\"parallax\"><img src=\"/assets/wellydoingthings_mobile/joinwelly.jpg\"></div>";
	} else {
		echo "<div class=\"parallax\"><img src=\"/assets/wellydoingthings/joinwelly.jpg\"></div>";
	}
	?>
</div>
  
<div class="section white">
	<div class="row container">
		<h2 class="header">Links</h2>
		<p class="grey-text text-darken-3 lighten-3 s12">
			<div class="col l5 s12">
				<u>Public Links</u><br>
				<a href="http://www.scouts.com.au">Scouts Australia</a><br>
				<a href="http://www.rovers.com.au">Rovers Australia</a><br>
				<a href="http://www.tas.scouts.com.au">Scout Tasmania</a><br>
				<a href="http://www.tasrovers.com">Tasmanian Rovers</a><br>
				<a href="http://www.tas.myscout.com.au">Tas MyScout</a><br>
				<a href="http://www.facebook.com/WellingtonRovers">Facebook</a><br>
				<a href="http://tasrovers.com/mailman/listinfo/wellylist_tasrovers.com">Wellylist</a>
			<?php
			if ($userPermission > 10) {
				echo "
					<br>
					<br>
					<u>Private Links</u><br>";
				$myLinksDescriptor = array();
				$myLinksDescriptor = getPrivateLinksDescriptor();
				$myLinksUrl = array();
				$myLinksUrl = getPrivateLinksUrl();
				for ($i=0; $i < count($myLinksDescriptor); $i++) {
					echo "<a href=\"".$myLinksUrl[$i]."\">".$myLinksDescriptor[$i]."</a>";
					echo "<br>";
				}
			}
			?>
			</div>
		</div>
</div>

<div class="parallax-container">
	<?php
	if (isMobile()) {
		echo "<div class=\"parallax\"><img src=\"/assets/wellydoingthings_mobile/rope.jpg\"></div>";
	} else {
		echo "<div class=\"parallax\"><img src=\"/assets/wellydoingthings/rope.jpg\"></div>";
	}
	?>
</div>

<?php 
	require_once $_SERVER["DOCUMENT_ROOT"]."/core/footer.php"
?>

</body>