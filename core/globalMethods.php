<?php
//Owen Holloway, Welly Rover Crew, 2014
error_reporting(-1);
//echo "<!--Global Methods included-->"; //debug

//This is the file that stores all the global methods, requires and includes

?>

<head>
	<link rel="stylesheet" type="text/css" media="screen and (min-width: 920px)"href="/core/mainStyles.css">
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 919px)" href="/core/mobileStyles.css" /> <!--This line will dynamic change on desktop version-->
	<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 919px)" href="/core/mobileStyles.css" />
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

	</script>
	<link rel="shortcut icon" href="/assets/Shorts.ico">
</head>

<body>
	<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/core/nav.php';
	?>
</body>