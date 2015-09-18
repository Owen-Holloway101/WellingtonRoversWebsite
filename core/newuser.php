<?php

require_once $_SERVER['DOCUMENT_ROOT']."/core/corefunctions.php";

if (userExists($_POST['username'])) {
	setcookie("username","",time()-36000,"/");
	setcookie("password1","",time()-36000,"/");
	echo "User already exists";
	errorHandle("User already exists");
} else {
	//TODO add in user created success page
	insertNewUser($_POST['username'],$_POST['password1']);
	setcookie("username","",time()-36000,"/");
	setcookie("password1","",time()-36000,"/");
	echo "success";
	messageHandle("User created");
}

?>