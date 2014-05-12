<?php

/*
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
*/

//Lets add in the user functions from the user
require_once $_SERVER['DOCUMENT_ROOT']."/core/user.php";

if (userExists($_POST['user'])) {
	echo "User already exists";
} else {
	echo "New user";
	insertNewUser($_POST['user'],$_POST['pass']);
}

?>

<html>
<body>
	<!--
	<script type="text/javascript">
		window.location.href=<?php echo $COOKIE["page"]; setcookie("page","",time()-36000);?>
	</script>
	-->
	test
</body>
</html>