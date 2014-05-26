<?php

/*
//Error checking!
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
*/

//Lets add in the user functions from the user file
require_once $_SERVER['DOCUMENT_ROOT']."/core/user.php";
include $_SERVER['DOCUMENT_ROOT'].'/core/session.php';
if (!isset($_COOKIE["session"])) {
	if (userExists($_POST['user'])) {
		if(checkSalt($_POST['user'],$_POST['pass'])) {
			setSession($_POST['user'], generateSessionID());
			echo "pass correct \n";
			echo "<script type=\"text/javascript\">window.location.href = \" http://\"+window.location.hostname+\"/".$_COOKIE["page"]."\"</script>";
			setcookie("page","",time()-36000);
		} else {
			echo "user does not exist or pass incorrect \n";
		}
	} else {
		echo "user does not exist or pass incorrect \n";
	}
} else {
	echo "already logged in as ". $userName;
}
?>

<html>
<body>
</body>
</html>