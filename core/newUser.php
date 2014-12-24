<?php

//Lets add in the user functions from the user
require_once $_SERVER['DOCUMENT_ROOT']."/core/user.php";

if (userExists($_POST['user'])) {
	echo "User already exists";
} else {
	//TODO add in user created success page
	echo "<script type=\"text/javascript\">window.location.href = \" http://\"+window.location.host+\"/".$_COOKIE["page"]."\"</script>";
	insertNewUser($_POST['user'],$_POST['pass']);
}

?>