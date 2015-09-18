<?php
//Internet explorer 10 and below are broken
if(preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT']))
{
	header("Location: /core/iepage.html");
	die();
}

require_once $_SERVER["DOCUMENT_ROOT"]."/core/corestyles.php";

if($userName == "null") {
	//Bring up a user creation page
	echo "
	<div class=\"row\">
		<div class=\"col s12 m6 offset-m3 l4 offset-l4\">
			<div class=\"card grey darken-3\">
				<div class=\"card-content white-text\">
					<span class=\"card-title\"><i class=\"material-icons prefix\">perm_identity</i> New User</span>
					<form action=\"/core/newuser.php\" id=\"newuser\" method=\"post\">
						<div class=\"input-field\">
							<input id=\"icon_prefix\" type=\"text\" name=\"username\" class=\"validate\">
							<label for=\"icon_prefix\">User Name</label>
						</div>
						<div class=\"input-field\">
							<input id=\"icon_prefix\" type=\"password\" name=\"password1\" class=\"validate\">
							<label for=\"icon_prefix\">Password</label>
						</div>
						<div class=\"input-field\">
							<input id=\"icon_prefix\" type=\"password\" name=\"password2\" class=\"validate\">
							<label for=\"icon_prefix\">Password Confirm</label>
						</div>
					</form>
				</div>
				<div class=\"card-action\">
					<a href=\"#\" onclick=\"submitForm();\">Create User</a>
				</div>
			</div>
		</div>
	</div>
	";

} else {
	header("Location: /user/");
}

?>

<head>
	<title>New User</title>
	<script type="text/javascript">
	function submitForm () {
			var username = $("input[name=username]").val();
			var password1 = $("input[name=password1]").val();
			var password2 = $("input[name=password2]").val();
			if (password1 == password2 && !(password1 == "") && !(username == "")) {
				console.log("pass equal");
				$('#newuser').submit();
			} else {
			}
		}
	</script>
</head>