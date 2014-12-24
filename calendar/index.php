<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/core/globalMethods.php';
?>
<head>
	<title>Welly Rover Crew - Home</title>
	<script type="text/javascript">
	$(".headerBar").append(" - Calendar");
	setPage("calendar");
	</script>
</head>

<body>
	<?php
	if ($_COOKIE["useMobileSite"] == "false") {
		echo "<div class=\"content\">
			<iframe frameBorder=\"0\" src=\"http://www.google.com/calendar/embed?src=welly%40tasrovers.com\" style=\"width: 100%; height: 600px;\"></iframe>
			</div>";
	} else {
		echo "<div class=\"content\">
			Google calendar formats terribly on mobile, so here is a link to the calendar.<br>
			<a href=\"http://www.google.com/calendar/embed?src=welly%40tasrovers.com\">Calendar link</a>
			</div>";
	}	
	?>
</body>