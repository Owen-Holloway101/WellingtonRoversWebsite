<?php
//inits the variable $db with the connection to the server for query
include $_SERVER["DOCUMENT_ROOT"].'/core/settings.private.php';
$db = new mysqli('127.0.0.1','root',$sqlPassword,'tbrc_jo152');
?>