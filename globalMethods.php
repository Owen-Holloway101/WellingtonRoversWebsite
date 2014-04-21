<head>
	<link rel="stylesheet" type="text/css" media="(min-device-width: 800px)" href="/mainStyles.css">
	<link rel="stylesheet" type="text/css" media="(max-device-width: 799px)" href="/mobileStyles.css">
	<script src="http://code.jquery.com/jquery-2.0.0.js"></script>
	<script type="text/javascript">
	function hello() {
		print "Hello World";
	}</script>
	<link rel="shortcut icon" href="/assets/Shorts.ico">
</head>

<body>
	<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/nav.php';?>
</body>

<?php
//Owen HOlloway, Welly Rover Crew, 2014
error_reporting(-1);
//echo "<!--Global Methods included-->"; //uncommment for debug
//This is the file that stores all the global methods, requires and includes
require_once $_SERVER["DOCUMENT_ROOT"]."/keys.private";
require_once $_SERVER["DOCUMENT_ROOT"]."/usefulLinks.php";
//require_once $_SERVER["DOCUMENT_ROOT"]."/facebook-php-sdk/src/facebook.php";
?>