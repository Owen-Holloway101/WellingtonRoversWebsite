<?php
//Database checks and inserts 

/*
Checks if user exists
*/

function userExists($user) {

	//This is a check for if the user exists, 
	//we don't want 2 users getting inserted with the same name, and is an easy first stage check for login

	include $_SERVER["DOCUMENT_ROOT"].'/core/dbConnect.php';

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

		if ($userExists) {
			return True;
		} else {
			return False;
		}	
	}
}

/*
If the salt is correct the user has provided the correct password
*/

function checkSalt($user, $pass) {

	//This checks if the user has provided the correct password

	include $_SERVER["DOCUMENT_ROOT"].'/core/dbConnect.php';

	//This is only needed for php <5.5
	require $_SERVER['DOCUMENT_ROOT'].'/core/password_compat-master/lib/password.php';
	

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
			echo "Pass failed";
		}
	}
}

/*
Inserts a new user into the DB complete with hashed password
*/

function insertNewUser($user, $pass) {

	//This inserts a new user into the system with the pass $pass, it also salts the password
	require $_SERVER['DOCUMENT_ROOT']."/core/dbConnect.php";

	//This is only needed for php <5.5
	require $_SERVER['DOCUMENT_ROOT'].'/core/password_compat-master/lib/password.php';

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
	require $_SERVER['DOCUMENT_ROOT']."/core/dbConnect.php";

	//This is only needed for php <5.5
	require $_SERVER['DOCUMENT_ROOT'].'/core/password_compat-master/lib/password.php';

	$options = array('cost' => 11);
	$passHash = password_hash($pass, PASSWORD_BCRYPT, $options);

	$stmt = $db->prepare("UPDATE 'USERS' SET 'SPASS'=? WHERE 'UNAME'=?");

	$stmt->bind_param("ss",$passHash,$user);

	$stmt->execute();

	$stmt->close();

}

//Session mainipulation 

/*
destroy a session (security etc)
*/

function deleteSession($sessionID) {
	
	include $_SERVER["DOCUMENT_ROOT"].'/core/dbConnect.php';

	//Prepared statements make sure that we don't fail and have sql injection ...
	$stmt = $db->prepare("DELETE FROM `SESSION` WHERE ID=?");

	$stmt->bind_param("s",$sessionID);

	$stmt->execute();

	$stmt->close();

}

/*
A user needs a session to be able to use the site
*/

function setSession($user, $sessionID) {
	
	include $_SERVER["DOCUMENT_ROOT"].'/core/dbConnect.php';

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

?>