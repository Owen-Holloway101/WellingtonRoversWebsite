<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/core/globalMethods.php';
?>

<head>
	<title>Welly Rover Crew - User</title>
	<script type="text/javascript">
	$(".headerBar").append(" - User");
	setPage("user");
	</script>
	<style>
	div.login{
		visibility: hidden;
	}
	</style>
</head>

<body>
	<div id="content">
		<form action=\"/core/login.php\" method=\"post\">
			Username: <input class=\"text\" type=\"text\"     name=\"user\"><br>
			Password: <input class=\"text\" type=\"password\" name=\"pass\"><br>
			<input class=\"button\" type=\"submit\" value=\"login\">
		</form>
	</div>
</body>
