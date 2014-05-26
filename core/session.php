<?php

/*
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
*/

$userPermission = 0;

function getUserName($sessionID) {

	include $_SERVER["DOCUMENT_ROOT"].'/core/dbConnect.php';

	$query = "SELECT ID, USER FROM SESSION";

	$uname = "null";

	if ($stmt = $db->prepare($query)) {

		/* execute statement */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($sessionFromDB, $uname);

		/* fetch values */
		while ($stmt->fetch()) {
			if ($sessionFromDB == $sessionID) {
				$user = $uname;
		}
	}

	/* close statement */
	$stmt->close();

	return $user;	
	}
}

function getUserPermission($user) {

	include $_SERVER["DOCUMENT_ROOT"].'/core/dbConnect.php';

	$userPermission = 0;

	$query = "SELECT UNAME, PERMISSION FROM USERS";

	if ($stmt = $db->prepare($query)) {

		/* execute statement */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($uname, $permissionFromDB);

		/* fetch values */
		while ($stmt->fetch()) {
			if ($uname == $user) {
				$userPermission = $permissionFromDB;
			}				
		}
	/* close statement */
	$stmt->close();
	
	}

	return $userPermission;

}

if (isset($_COOKIE['session'])) {
	$userName = getUserName($_COOKIE["session"]);
	$userPermission = getUserPermission($userName);
} else {
	$userName = "null";
	$userPermission = 0;
}
?>
