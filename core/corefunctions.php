<?php

//inits the variable $db with the connection to the server for query
require_once $_SERVER["DOCUMENT_ROOT"].'/core/settings.private.php';

function errorHandle($description) {
	setcookie("error",$description,time()+36000,"/");
	header("Location: /core/error.php");
}

function messageHandle($description) {
	setcookie("message",$description,time()+36000,"/");
	header("Location: /core/message.php");
}

/*
Gets the session ID (from cookie) and checks it against the database for a username
*/

function getUserName($sessionID) {

	require $_SERVER['DOCUMENT_ROOT']."/core/db.php";

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

/*
Checks the logged in users permission level and logs them in
*/

function getUserPermission($user) {

	require $_SERVER['DOCUMENT_ROOT']."/core/db.php";

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

/*
Checks if user exists
*/

function userExists($user) {

	//This is a check for if the user exists, 
	//we don't want 2 users getting inserted with the same name, and is an easy first stage check for login

	require $_SERVER['DOCUMENT_ROOT']."/core/db.php";

	$userExists = False;

	$query = "SELECT UNAME, SPASS FROM USERS";

	if ($stmt = $db->prepare($query)) {

		/* execute statement */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($uname, $spass);

		/* fetch values */
		while ($stmt->fetch()) {
			if ($uname == $user) {
				$userExists = True;
			}
		}

		/* close statement */
		$stmt->close();

		return $userExists;	
	}
}

/*
If the salt is correct the user has provided the correct password
*/

function checkSalt($user, $pass) {

	//This checks if the user has provided the correct passwor
	require $_SERVER['DOCUMENT_ROOT']."/core/db.php";

	//This is only needed for php <5.5
	require $_SERVER['DOCUMENT_ROOT'].'/core/password_compat/lib/password.php';
	

	$sPassFound = False;
	$passAccepted = False;
	$sPassword = "null";

	$query = "SELECT UNAME, SPASS FROM USERS";
	
	if ($stmt = $db->prepare($query)) {
		
		/* execute statement */
		$stmt->execute();
		
		/* bind result variables */
		$stmt->bind_result($uname, $spass);
		
		/* fetch values */
		while ($stmt->fetch()) {
			if ($uname == $user) {
				
				$sPassword = $spass;
				$sPassFound = True;
			}
		}
		
		$stmt->close();
		
		if ($sPassFound) {
			$options = array('cost' => 11);

			if (password_verify($pass, $sPassword)) {
				return True;
			} else {
			    return False;
			}
		} else {
			return False;
		}
	}
}

/*
Inserts a new user into the DB complete with hashed password
*/

function insertNewUser($user, $pass) {

	//This inserts a new user into the system with the pass $pass, it also salts the password
	require $_SERVER['DOCUMENT_ROOT']."/core/db.php";

	//This is only needed for php <5.5
	require $_SERVER['DOCUMENT_ROOT'].'/core/password_compat/lib/password.php';

	$options = array('cost' => 11);
	$passHash = password_hash($pass, PASSWORD_BCRYPT, $options);

	$stmt = $db->prepare("INSERT INTO `USERS` (`UNAME`, `SPASS`) VALUES (?, ?)");

	$stmt->bind_param("ss",$user,$passHash);

	$stmt->execute();

	$stmt->close();

}

/*
changes a users password
*/

function updateUserPass($user, $pass) {

	//This inserts a new user into the system with the pass $pass, it also salts the password
	require $_SERVER['DOCUMENT_ROOT']."/core/db.php";

	//This is only needed for php <5.5
	require $_SERVER['DOCUMENT_ROOT'].'/core/password_compat/lib/password.php';

	$options = array('cost' => 11);
	$passHash = password_hash($pass, PASSWORD_BCRYPT, $options);

	var_dump($passHash);
	var_dump($user);

	$stmt = $db->prepare("UPDATE USERS SET SPASS=? WHERE UNAME=?");
	echo $db->error;
	$stmt->bind_param("ss",$passHash,$user);
	
	$stmt->execute();

	$stmt->close();

}

//Session mainipulation 

/*
destroy a session (security etc)
*/

function deleteSession($sessionID) {

	//Prepared statements make sure that we don't fail and have sql injection ...
	require $_SERVER['DOCUMENT_ROOT']."/core/db.php";
	
	$stmt = $db->prepare("DELETE FROM `SESSION` WHERE ID=?");

	$stmt->bind_param("s",$sessionID);

	$stmt->execute();

	$stmt->close();

}

/*
A user needs a session to be able to use the site
*/

function setSession($user, $sessionID) {

	require $_SERVER['DOCUMENT_ROOT']."/core/db.php";

	//Prepared statements make sure that we don't fail and have sql injection ...
	$stmt = $db->prepare("INSERT INTO `SESSION` (USER, ID) VALUES (?,?)");

	$stmt->bind_param("ss",$user,$sessionID);

	$stmt->execute();

	$stmt->close();
	
	//session will expire 2 weeks from now (now being an aribitary value that means the time the user logs in)
	setcookie("session",$sessionID,time()+1209600,"/");

	//also check for any expired sessions

	//Prepared statements make sure that we don't fail and have sql injection ...
	
	$stmt = $db->prepare("DELETE FROM SESSION WHERE TIMESTAMPDIFF(HOUR,TIMECREATED,NOW())>336"); //this should check if the session was made more than 2 weeks ago

	$stmt->execute();

	$stmt->close();
}

/*
Makes a random string to be used as session id
*/

function generateSessionID() {
	$length = 32;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
}

//Check the session
if (isset($_COOKIE['session'])) {
	$userName = getUserName($_COOKIE["session"]);
	$userPermission = getUserPermission($userName);
} else {
	//In this case the user is not logged in
	$userName = "null";
	$userPermission = 0;
}

/*
Checks if the device mobile or desktop
*/

function isMobile() {
	require_once $_SERVER['DOCUMENT_ROOT'].'/core/mobile-detect/Mobile_Detect.php';
	$detect = new Mobile_Detect;
	if ($detect->isMobile()) {
		return true;
	} else  {
		return false;
	}
}

?>

<script type="text/javascript">
	/*
	Gets a cookie because the inbuilt method annoys me
	*/
	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1);
			if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
		}
		return "";
	}

	/*
	Sets the last page cookie, this is useful for post login etc
	*/
	function setPage(pageFile) {
		var expDate = new Date();
		expDate.setTime(expDate.getTime()+(60*15));
		document.cookie="page=" + pageFile + ";" + expDate + "; path=/";
	}
</script>