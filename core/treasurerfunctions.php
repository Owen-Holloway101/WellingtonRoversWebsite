<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/corefunctions.php";

//Add new payee to the payees database
function newpayee($firstname,$lastname,$email) {
    
	require $_SERVER['DOCUMENT_ROOT']."/core/db.php";

	$stmt = $db->prepare("INSERT INTO `payee` (`firstname`, `lastname`, `email`) VALUES (? ,? ,?)");

	$stmt->bind_param("sss",$firstname,$lastname,$email);

	$stmt->execute();

	$stmt->close();
}

function updatepayee($payeeno,$firstname,$lastname,$email) {
    require $_SERVER['DOCUMENT_ROOT']."/core/db.php";
    
	$stmt = $db->prepare("UPDATE payee SET firstname=?,lastname=?,email=? WHERE payeeno=?");

	$stmt->bind_param("sssi",$firstname,$lastname,$email,$payeeno);

	$stmt->execute();

	$stmt->close();
}

function getpayeeno() {
    require $_SERVER['DOCUMENT_ROOT']."/core/db.php";

	$query = "SELECT COUNT(*) FROM payee";

	if ($stmt = $db->prepare($query)) {

		/* execute statement */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($number);

		/* fetch values */
		while ($stmt->fetch()) {
		}
	}

	/* close statement */
	$stmt->close();

	return $number;
}

function getpayeeowing($payeeno) {
    
}

?>