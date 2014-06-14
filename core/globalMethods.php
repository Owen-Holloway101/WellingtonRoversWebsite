<?php
//Owen Holloway, Welly Rover Crew, 2014
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//echo "<!--Global Methods included-->"; //debug

//This is the file that stores all the global methods, requires and includes

include $_SERVER['DOCUMENT_ROOT']."/core/session.php";

function errorHandle($description) {
	setcookie("error",$description,time()+36000,"/");
	echo "<script type=\"text/javascript\">window.location.href = \" http://\"+window.location.hostname+\"/"."error.php"."\"</script>";
}

?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="/core/mainStyles.css">
	<!-- <link rel="stylesheet" type="text/css" media="only screen and (device-width : 801px)" href="/core/mainStyles.css"> -->
	<!-- <link rel="stylesheet" type="text/css" media="only screen and (device-width : 800px)" href="/core/mobileStyles.css"> -->
	<!-- <link rel="stylesheet" type="text/css" media="only screen and (max-device-width : 1200px) and (max-device-height : 1920px)" href="/core/mobileStyles.css" /> -->
	<script src="http://code.jquery.com/jquery-2.0.0.js"></script>
	<script type="text/javascript">

	function hello () {
		console.log("Hello World");
	}

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