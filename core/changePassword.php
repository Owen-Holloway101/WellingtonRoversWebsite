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

function errorHandle($description) {
	setcookie("error",$description,time()+36000,"/");
	echo "<script type=\"text/javascript\">window.location.href = \" http://\"+window.location.hostname+\"/"."error.php"."\"</script>";
}



?>

<html>
<body>
</body>
</html>