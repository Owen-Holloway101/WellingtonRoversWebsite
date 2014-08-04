<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/core/globalMethods.php';
?>

<head>
	<title>Welly Rover Crew - Home</title>
	<script type="text/javascript">
		$(".headerBar").append(" - New User");
		setPage("user");

		function submitForm () {
			var passInit = document.getElementById("passInit").value;
			var passCheck = document.getElementById("passCheck").value;
			if (passInit == passCheck) {
				//document.getElementById("userform").submit();
				console.log("pass equal");
				console.log(passInit);
				console.log(passCheck);
			} else {
				$("#promtText").text("<- needs to be the same as password");
			}
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
			<input type="text"     placeholder="username" name="user" class="text" id="passInit"><br>
			<input type="password" placeholder="password" name="pass" class="text" id="passCheck"><br>
			<input type="password" placeholder="confirmpassword" name="passConfirmsu" class="text"><t id="promtText"></t><br>
			<input type="button"   onclick="submitForm()" value="submit" class="button">
		</form>
	</div>
</body>
