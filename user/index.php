<?php
//Internet explorer 10 and below are broken
if(preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT']))
{
	header("Location: /core/iepage.html");
	die();
}

require_once $_SERVER["DOCUMENT_ROOT"]."/core/corestyles.php";

if($userName == "null") {
	//Bring up a login page
	echo "
	<div class=\"row\">
		<div class=\"col s12 m6 offset-m3 l4 offset-l4\">
			<div class=\"card grey darken-3\">
				<div class=\"card-content white-text\">
					<span class=\"card-title\"><i class=\"material-icons prefix\">perm_identity</i> Login</span>
					<form action=\"/core/login.php\" id=\"login\" method=\"post\">
						<div class=\"input-field\">
							<input id=\"icon_prefix\" type=\"text\" name=\"username\" class=\"validate\">
							<label for=\"icon_prefix\">User Name</label>
						</div>
						<div class=\"input-field\">
							<input id=\"icon_prefix\" type=\"password\" name=\"password\" class=\"validate\">
							<label for=\"icon_prefix\">Password</label>
						</div>
					</form>
				</div>
				<div class=\"card-action\">
					<a href=\"#\" onclick=\"$('#login').submit();\">Login</a>
					<a href=\"/user/newuser.php\">New User</a>
				</div>
			</div>
		</div>
	</div>
	";
} else {
	echo "
	<div class=\"row\">
		<div class=\"col s12 m6 offset-m3 l4 offset-l4\">
			<div class=\"card grey darken-3\">
				<div class=\"card-content white-text\">
					<span class=\"card-title\"><i class=\"material-icons prefix\">perm_identity</i> User (".$userName.")</span><br>
					<br>
					<br>
					Permission Level: ".$userPermission."
				</div>
				<div class=\"card-action\">
					<a href=\"/core/logout.php\">Logout</a>
					<a href=\"#\">Change Pass</a>
				</div>
			</div>
		</div>
	</div>
	";
}

?>

<head>
	<title>Welly - User</title>
</head>