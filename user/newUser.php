<!--Owen Holloway, Welly Rover Crew, 2014-->
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/core/globalMethods.php';
?>

<head>
	<title>Welly Rover Crew - Home</title>
	<script type="text/javascript">
		$(".headerBar").append(" - New User");
		setPage("user");

		function submitForm () {
			document.getElementById("userform").submit();
		}
	</script>
	<style>
	div.login{
		visibility: hidden;
	}
	</style>
</head>

<body>
	<div class="content">
		<form action="/core/newUser.php" method="post" id="userform">
			<input type="text"     placeholder="username" name="user" class="text"><br>
			<input type="password" placeholder="password" name="pass" class="text"><br>
			<input type="password" placeholder="confirmpassword" name="passConfirmsu" class="text"><t id="promtText"></t><br>
			<input type="button"   onclick="submitForm()" value="submit" class="button">
		</form>
	</div>
</body>
