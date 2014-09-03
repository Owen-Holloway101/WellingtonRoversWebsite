<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/core/globalMethods.php';
?>

<head>
  <title>Welly Rover Crew - Home</title>
  <script type="text/javascript">
    $(".headerBar").append(" - Change Pass");
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
  <div id="content">
  	<div class="content">
		<form action="/core/newUser.php" method="post" id="userform">
			<input type="text"     placeholder="username" name="user" class="text"><br>
			<input type="password" placeholder="password" name="pass" class="text"><br>
			<input type="password" placeholder="confirmpassword" name="passConfirmsu" class="text"><t id="promtText"></t><br>
			<input type="button"   onclick="submitForm()" value="submit" class="button">
		</form>
	</div>
  </div>
</body>
