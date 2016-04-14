<?php
//Lets make sure that we can use all the functions
require_once $_SERVER["DOCUMENT_ROOT"]."/core/corefunctions.php";
?>
<!--Owen Holloway Wellington Rover Crew 2015-->
<head>
	<!--Love me some good jquery-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script type="text/javascript" src="http://malsup.github.com/jquery.form.js"></script> 
	
	<!-- Compiled and minified CSS -->
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css" media="screen,projection">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

	<!--The Zeryt icon-->
	<link rel="icon" href="/assets/Shorts.ico" type="image/ico" sizes="16x16">

	<!--Meterial Icons-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!--Overrides for the styles-->
	<link rel="stylesheet" type="text/css" href="/core/styles.css"/>

	<!--We use UTF-8 here-->
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<?php
	
	if (isMobile()) {
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/core/mobile.css\"/>";
	} else {
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/core/desktop.css\"/>";
	}
	
	?>
</head>

<body>
	<!--Navigation-->
    <!--Dropdowns START-->
    <ul id="treasurer_dropdown" class="dropdown-content">
        <li><a href="/treasurer">Overview</a></li>
        <li class="divider"></li>
        <li><a href="/treasurer/invoices.php">Invoices</a></li>
        <li><a href="/treasurer/newinvoice.php">New Invoice</a></li>
        <li class="divider"></li>
        <li><a href="/treasurer/payees.php">Payees</a></li>
    </ul>
    <!--Dropdowns END-->
	<nav class="grey darken-3" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">Wellington Rovers</a>
            <!--NAV Bar START-->
			<ul class="right hide-on-med-and-down">
				<li><a href="/">Home</a></li>
				<li><a href="/calendar">Calendar</a></li>
				<li><a href="/links">Links</a></li>
                <?php if($userPermission == 50) { echo "<li><a class=\"dropdown-button\" href=\"#!\" data-activates=\"treasurer_dropdown\">Treasurer<i class=\"material-icons right\">arrow_drop_down</i></a></li>";} ?>
				<li><a href="/user"><?php  if ($userName == "null") echo "Login"; else echo "User (".$userName.")";?></a></li>
			</ul>
            <!--NAV Bar END-->
			<ul id="nav-mobile" class="side-nav">
				<li><a href="/">Home</a></li>
				<li><a href="/calendar">Calendar</a></li>
				<li><a href="/links">Links</a></li>
                <!--TODO add treasurer drop down-->
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header">Treasurer<i class="mdi-navigation-arrow-drop-down"></i></a>
                        <div class="collapsible-body">
                        <ul>
                            <li><a href="/treasurer">Overview</a></li>
                            <li class="divider"></li>
                            <li><a href="/treasurer/invoices.php">Invoices</a></li>
                            <li><a href="/treasurer/newinvoice.php">New Invoice</a></li>
                            <li class="divider"></li>
                            <li><a href="/treasurer/payees.php">Payees</a></li>
                        </ul>
                        </div>
                    </li>
                    </ul>
                </li>
				<li><a href="/user"><?php  if ($userName == "null") echo "Login"; else echo "User (".$userName.")";?></a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		</div>
		<script type="text/javascript">
			//Enable mobile pull out menu
			(function($){
				$(function(){

					$('.button-collapse').sideNav();

			  });
			})(jQuery);
			
			//Enable parallax
			$(document).ready(function(){
				$('.parallax').parallax();
			});
            
            $(document).ready(function() {
                $('select').material_select();
            });  
            
            $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
            });
		</script>
	</nav>

</body>
