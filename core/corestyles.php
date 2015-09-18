<?php
//Lets make sure that we can use all the functions
require_once $_SERVER["DOCUMENT_ROOT"]."/core/corefunctions.php";
?>
<!--Owen Holloway @Zeryter 2015-->
<head>
	<!--Love me some good jquery-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	
	<!-- Compiled and minified CSS -->
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css" media="screen,projection">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

	<!--The Zeryt icon-->
	<link rel="icon" href="/assets/zeryt.ico" type="image/ico" sizes="16x16">

	<!--Meterial Icons-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="teal">
	<!--Navigation-->
	<nav class="grey darken-3" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">Zeryter</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="/">Home</a></li>
				<li><a href="/user">User <?php  if ($userName == "null") echo ""; else echo "(".$userName.")";?></a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a href="/">Home</a></li>
				<li><a href="/user">User <?php  if ($userName == "null") echo ""; else echo "(".$userName.")";?></a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		</div>
		<script type="text/javascript">
			(function($){
				$(function(){

					$('.button-collapse').sideNav();

			  }); // end of document ready
			})(jQuery); // end of jQuery name space
			
			
			$(document).ready(function(){
				$('.parallax').parallax();
			});
		</script>
	</nav>
</body>
