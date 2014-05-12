<?php
//error reporting on/off 
/*
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
*/

//inits the variable $db with the connection to the server for query
include $_SERVER["DOCUMENT_ROOT"].'/core/settings.private.php';
$db = new mysqli('127.0.0.1','root',$sqlPassword,'LOGIN');
?>