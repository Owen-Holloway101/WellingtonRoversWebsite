<?php
//Owen Holloway, Welly Rover Crew, 2014
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//echo "<!--Global Methods included-->"; //debug

//This is the file that stores all the global methods, requires and includes

include $_SERVER['DOCUMENT_ROOT']."/core/session.php";

?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" media="screen and (min-width: 700px)"href="/core/mainStyles.css">
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 699px)" href="/core/mobileStyles.css" /> <!--This line will dynamic change on desktop version-->
	<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 699px)" href="/core/mobileStyles.css" />
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
		document.cookie="page=" + pageFile + ";" + expDate;
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
					User: <input type=\"text\"     name=\"user\"><br>
					Pass: <input type=\"password\" name=\"pass\"><br>
					<input type=\"submit\">
				</form>";
	} else {
		echo $userName;
	}
	?>
	</div>

</body>