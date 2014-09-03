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
		<div class="form">
		<button onclick="location.href='/user/login.php'">Login</button><br>
		<button onclick="location.href='/user/newUser.php'">New User</button><br>
		<?php if ($userPermission > 0) {
			echo "<button onclick=\"location.href='/user/changePass.php'\">Change Password</button>"
		}?>
		</div>
	</div>
</body>
