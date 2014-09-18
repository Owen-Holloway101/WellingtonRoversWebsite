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
				console.log("pass equal");
				console.log(passInit);
				console.log(passCheck);
				document.getElementById("userform").submit();
			} else {
				$("#promtText1").text(" <- need to be equal");
				$("#promtText2").text(" <- need to be equal");
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
			<input type="text"     placeholder="Username" name="user" class="text"><br>
			<input type="password" placeholder="Password" name="pass" class="text" id="passInit"><t id="promtText1"></t><br>
			<input type="password" placeholder="Confirm Password" name="passConfirmsu" class="text"  id="passCheck"><t id="promtText2"></t><br>
			<input type="button"   onclick="submitForm()" value="Submit" class="button">
		</form>
	</div>
</body>
