<?php
//Owen Holloway, Welly Rover Crew, 2014
//@Zeryter

//FAR OUT STOP GIVING ME ERRORS!!! Have your stupid timezone crap if you must.
date_default_timezone_set("Australia/Hobart");
error_reporting(0);
//echo "<!--Global Methods included-->"; //debug

//The setup for mobile detection, its like magic :D
require_once $_SERVER['DOCUMENT_ROOT'].'/core/Mobile-Detect/Mobile_Detect.php';
$detect = new Mobile_Detect;

if (!isset($_COOKIE["useMobileSite"])) {
	if ($detect->isMobile()) {
		//This will epxire in 10 years ... which is plenty of time!
		setcookie("useMobileSite","true",time() + (10 * 365 * 24 * 60 * 60),"/");
		$_COOKIE["useMobileSite"] = "true";
	} else if ($detect->isTablet()) {
		setcookie("useMobileSite","true",time() + (10 * 365 * 24 * 60 * 60),"/");
		$_COOKIE["useMobileSite"] = "true";
	} else {
		setcookie("useMobileSite","false",time() + (10 * 365 * 24 * 60 * 60),"/");
		$_COOKIE["useMobileSite"] = "false";
	}
}

//This is the file that stores all the global methods, requires and includes

include $_SERVER['DOCUMENT_ROOT']."/core/session.php";

function errorHandle($description) {
	setcookie("error",$description,time()+36000,"/");
	echo "<script type=\"text/javascript\">window.location.href = \" http://\"+window.location.hostname+\"/"."error.php"."\"</script>";
}

?>
<!DOCTYPE html>
<!--
Owen Holloway, Wellington Rover Crew 2014
@Zeryter

Project source code can be viewed at: https://github.com/Owen-Holloway101/WellingtonRoversWebsite
along with all commit logs and builds

If you are reading this and want to submit a bug: https://github.com/Owen-Holloway101/WellingtonRoversWebsite/issues/new 
will get you what you want -->
<head>
	<?php
	if ($_COOKIE["useMobileSite"] == "true") {
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/core/mobileStyles.css\"/>";
	} else {
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/core/mainStyles.css\">";
	}
	?>
	<script src="http://code.jquery.com/jquery-2.0.0.js"></script>
	<script type="text/javascript">

	function postToUrl(path, params, method) {
		method = method || "post"; // Set method to post by default if not specified.

		// The rest of this code assumes you are not using a library.
		// It can be made less wordy if you use one.
		var form = document.createElement("form");
		form.setAttribute("method", method);
		form.setAttribute("action", path);

		for(var key in params) {
			if(params.hasOwnProperty(key)) {
				var hiddenField = document.createElement("input");
				hiddenField.setAttribute("type", "hidden");
				hiddenField.setAttribute("name", key);
				hiddenField.setAttribute("value", params[key]);

				form.appendChild(hiddenField);
			}
		}

		document.body.appendChild(form);
		form.submit();
	}

	function setPage(pageFile) {
		var expDate = new Date();
		expDate.setTime(expDate.getTime()+(60*15));
		document.cookie="page=" + pageFile + ";" + expDate + "; path=/";
	}

	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) {
			var c = ca[i].trim();
			if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
		}
		return "";
	}

	function setMobile(value) {
		var expDate = new Date();
		expDate.setTime(expDate.getTime()+(10 * 365 * 24 * 60 * 60));
		document.cookie="useMobileSite=" + value + ";" + expDate + "; path=/";
		location.reload();
	}

	function toggleMobile() {
		var expDate = new Date();
		expDate.setTime(expDate.getTime()+(10 * 365 * 24 * 60 * 60));
		if (getCookie("useMobileSite") == "true") {
			document.cookie="useMobileSite=" + "false" + ";" + expDate + "; path=/";
		} else {
			document.cookie="useMobileSite=" + "true" + ";" + expDate + "; path=/";
		}
		location.reload();
	}

	function bugReport() {
		location.href="https://github.com/Owen-Holloway101/WellingtonRoversWebsite/issues/new";
	}

	</script>
	<link rel="shortcut icon" href="/assets/Shorts.ico">
</head>

<body>
	<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/core/nav.php';
	?>

	<div class="login">
	<?php
	if ($userName == "null") {
		echo "	<form action=\"/core/login.php\" method=\"post\">
					User: <input class=\"text\" type=\"text\"     name=\"user\"><br>
					Pass: <input class=\"text\" type=\"password\" name=\"pass\"><br>
					<input class=\"button\" type=\"submit\" value=\"login\">
				</form>";
	} else {
		echo "Logged in as: ".$userName."<br>";
		echo "<button onclick=\"location.href='/core/logout.php'\">logout</button>";
	}
	?>
	</div>

</body>