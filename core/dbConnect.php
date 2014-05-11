<?php
//error reporting on/off 
/*
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
*/

//inits the variable $db with the connection to the server for query
require $_SERVER["DOCUMENT_ROOT"].'/core/settings.private.php';
$db = new mysqli('127.0.0.1','root',$sqlPassword,'LOGIN');


//inits the variable $dbh with the connection to the server for insert, delete, update
//TODO replace this with 100% mysqli methods
try {
	$dbh = new PDO("mysql:host=127.0.0.1;dbname=LOGIN", "root", $sqlPassword);	
} catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
}

?>