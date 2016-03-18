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
	<title>Welly - Calendar</title>
</head>

<body class="welly-red">
<div class="parallax-container">
	<?php
	if (isMobile()) {
		echo "<div class=\"parallax\"><img src=\"/assets/wellydoingthings_mobile/boat.jpg\"></div>";
	} else {
		echo "<div class=\"parallax\"><img src=\"/assets/wellydoingthings/boat.jpg\"></div>";
	}
	?>
</div>
  
<div class="section white">
	<div class="row container">
	<iframe frameBorder="0" src="http://www.google.com/calendar/embed?src=welly%40tasrovers.com" style="width: 100%; height: 600px;"></iframe>
	</div>
</div>

<div class="parallax-container">
	<?php
	if (isMobile()) {
		echo "<div class=\"parallax\"><img src=\"/assets/wellydoingthings_mobile/walk.jpg\"></div>";
	} else {
		echo "<div class=\"parallax\"><img src=\"/assets/wellydoingthings/walk.jpg\"></div>";
	}
	?>
</div>

	<?php 
	require_once $_SERVER["DOCUMENT_ROOT"]."/core/footer.php"
	?>

</body>