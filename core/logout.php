<?php

//Error checking!
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

include $_SERVER["DOCUMENT_ROOT"].'/core/dbConnect.php';

$stmt = $db->prepare("DELETE FROM SESSION WHERE ID = ?");

$stmt->bind_param('s',$_COOKIE['session']);

$stmt->execute();

$stmt->close();

setcookie('session','',-3600,'/');

echo "<script type=\"text/javascript\">window.location.href = \" http://\"+window.location.host+\"/".$_COOKIE["page"]."\"</script>";

setcookie("page","",time()-36000,"/");
?>