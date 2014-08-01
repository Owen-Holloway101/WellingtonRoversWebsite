<?php

//Lets add in the user functions from the user file
require_once $_SERVER['DOCUMENT_ROOT']."/core/user.php";
include $_SERVER['DOCUMENT_ROOT'].'/core/session.php';

function errorHandle($description) {
	setcookie("error",$description,time()+36000,"/");
	echo "<script type=\"text/javascript\">window.location.href = \" http://\"+window.location.host+\"/"."error.php"."\"</script>";
}

if (!isset($_COOKIE["session"])) {
	if (userExists($_POST['user'])) {
		if(checkSalt($_POST['user'],$_POST['pass'])) {
			setSession($_POST['user'], generateSessionID());
			echo "pass correct \n";
			echo "<script type=\"text/javascript\">window.location.href = \" http://\"+window.location.host+\"/".$_COOKIE["page"]."\"</script>";
			setcookie("page","",time()-36000,"/");
		} else {
			errorHandle("user does not exist or pass incorrect");
		}
	} else {
		errorHandle("user does not exist or pass incorrect");
	}
} else {
	errorHandle("already logged in as ". $userName);
}
?>

<html>
<body>
</body>
</html>