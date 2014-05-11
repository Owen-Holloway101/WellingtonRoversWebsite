<?php


ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);


echo "user:".$_POST["user"];

function deleteSession($sessionID) {
	
	include $_SERVER["DOCUMENT_ROOT"].'/core/dbConnect.php';

	//Prepared statements make sure that we don't fail and have sql injection ...
	$stmt = $db->prepare("DELETE FROM `SESSION` WHERE ID=?");

	$stmt->bind_param("s",$sessionID)

	$stmt->execute();

}

deleteSession($_COOKIE["sessionID"]);

require $_SERVER["DOCUMENT_ROOT"].'/core/password_compact/lib/password.php';

function userExists($user) {

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
			echo "userExists"."<br>";
		} else {
			return False;
			echo "userNotExists"."<br>";
		}	
	}
}

function checkSalt($user, $pass) {

	include $_SERVER["DOCUMENT_ROOT"].'/core/dbConnect.php';
	//require 'password_compact/lib/password.php';
	

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
			    
			}
		} else {
			setcookie("loginStatus", "User does not exist or pass incorrect",time()+3600);
		}
	}
}

function setSession($user, $sessionID) {
	
	include $_SERVER["DOCUMENT_ROOT"].'/core/dbConnect.php';

	//Prepared statements make sure that we don't fail and have sql injection ...
	$stmt = $db->prepare("INSERT INTO `SESSION` (USER, ID) VALUES (?,?)");

	$stmp->bind_param("ss",$user,$sessionID)

	$stmt->execute();

}

function checkSession() {

	include $_SERVER["DOCUMENT_ROOT"].'/core/dbConnect.php';

	//Prepared statements make sure that we don't fail and have sql injection ...
	$stmt = $db->prepare("DELETE FROM SESSION WHERE TIMESTAMPDIFF(HOUR,TIMECREATED,NOW())>336");

	$stmt->execute();

}

function generateSessionID() {
	$length = 32;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

$user = $_POST["user"];
$pass = $_POST["pass"];
echo "checked pass";

if (userExists($user)) {
	$passAccepted = checkSalt($user, $pass);
	echo "checked pass";
}

if ($passAccepted) {
	setcookie("loginStatus", "pass correct, logged in",time()+3600);
	$newSessionID = generateSessionID();
	//Save session into the DB
	setSession($user,$newSessionID);
	//Set to expire in a day from now (now being whenever the session is handed out)
	setcookie("sessionID",$newSessionID,time()+1209600); //session is set to expire in 2 weeks from now
} else {
	setcookie("loginStatus", "User does not exist or pass incorrect",time()+3600);
};

checkSession();

function userLogin() {

}
?>

<html>
<!--
<script type="text/javascript">
	window.location.href=<?php echo $COOKIE["page"]; setcookie("page","",time()-36000);?>
</script>
-->
</html>