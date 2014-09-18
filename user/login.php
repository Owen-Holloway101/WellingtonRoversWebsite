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
	<div class="content">
		<form action="/core/login.php" method="post">
			<input class="text" placeholder="Username" type="text"     name="user"><br>
			<input class="text" placeholder="Password" type="password" name="pass"><br>
			<input class="button" type="Submit" value="login">
		</form>
	</div>
</body>
