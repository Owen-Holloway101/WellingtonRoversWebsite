<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once $_SERVER['DOCUMENT_ROOT']."/core/treasurerfunctions.php";
if ($userPermission == 50) {
	newpayee($_POST['firstname'],$_POST['lastname'],$_POST['email']);
	messageHandle("inserted: ".$_POST['firstname']." ".$_POST['lastname']." into payee database with email: ".$_POST['email']);
} else {
	errorHandle("permission not high enough for that");
}

?>