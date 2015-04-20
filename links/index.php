<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/core/globalMethods.php';
?>

<head>
	<title>Welly Rover Crew - Home</title>
	<script type="text/javascript">
		$(".headerBar").append(" - Links");
		setPage("links");
	</script>
</head>

<body>
	<div class="content">
			<a href="http://www.scouts.com.au">Scouts Australia</a><br>
			<a href="http://www.rovers.com.au">Rovers Australia</a><br>
			<a href="http://www.tas.scouts.com.au">Scout Tasmania</a><br>
			<a href="http://www.tasrovers.com">Tasmanian Rovers</a><br>
			<a href="http://www.tas.myscout.com.au">Tas MyScout</a><br>
			<a href="http://www.facebook.com/WellingtonRovers">Facebook</a>
	</div>

	<div class="content">
	<?php
	if ($userPermission >= 20) {
		echo "<a href=".$googledrivelink.">Contact List</a><br>";
	}
	?>
	</div>

</body>
