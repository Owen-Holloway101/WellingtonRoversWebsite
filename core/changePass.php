<?php

//Lets add in the user functions from the user file
require_once $_SERVER['DOCUMENT_ROOT']."/core/user.php";
include $_SERVER['DOCUMENT_ROOT'].'/core/session.php';

function errorHandle($description) {
	setcookie("error",$description,time()+36000,"/");
	echo "<script type=\"text/javascript\">window.location.href = \" http://\"+window.location.hostname+\"/"."error.php"."\"</script>";
}

if(isset($_COOKIE['session'])){
	updateUserPass($userName,$_POST['pass']);
	echo "pass correct \n";
	echo "<script type=\"text/javascript\">window.location.href = \" http://\"+window.location.hostname+\"/".$_COOKIE["page"]."\"</script>";
	setcookie("page","",time()-36000,"/");
} else {
	errorHandle("Not logged in");
}
?>

<html>
<body>
</body>
</html>