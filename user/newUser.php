<!--Owen Holloway, Welly Rover Crew, 2014-->
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/core/globalMethods.php';
?>

<head>
	<title>Welly Rover Crew - Home</title>
	<script type="text/javascript">
		$(".headerBar").append(" - New User");
		setPage("user");
	</script>
</head>

<body>
	<div class="content">
		<form action="/core/newUser.php" method="post">
			<input type="text"     placeholder="username" name="user" class="text"><br>
			<input type="password" placeholder="password" name="pass" class="text"><br>
			<input type="submit" class="button">
		</form>
	</div>
</body>
