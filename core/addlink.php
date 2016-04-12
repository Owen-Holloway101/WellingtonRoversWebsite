<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/corefunctions.php";
if ($userPermission > 50) {
	insertnewlink($_POST['description'],$_POST['url']);
	messageHandle("inserted: ".$_POST['description']."@".$_POST['url']);
} else {
	errorHandle("permission not high enough for that");
}

?>