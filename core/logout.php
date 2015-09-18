<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/corefunctions.php";

setcookie("session","loggedout",time()-120000,"/");
messageHandle("logged out ".$userName);
?>