<?php
//Internet explorer 10 and below are broken
if(preg_match('/MSIE/',$_SERVER['HTTP_USER_AGENT']))
{
	header("Location: /core/iepage.html");
	die();
}

require_once $_SERVER["DOCUMENT_ROOT"]."/core/corestyles.php";

?>

<head>
	<title>Welly - Home</title>
</head>

<body class="welly-red">
<div class="parallax-container">
	<div class="parallax"><img src="/assets/wellydoingthings/group.jpg">
	</div>
</div>
  
<div class="section white">
	<div class="row container">
	<iframe frameBorder="0" src="http://www.google.com/calendar/embed?src=welly%40tasrovers.com" style="width: 100%; height: 600px;"></iframe>
	</div>
</div>

<div class="parallax-container">
	<div class="parallax"><img src="/assets/wellydoingthings/snow.jpg">
	</div>
</div>


<footer class="page-footer welly-blue">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">Footer Content</h5>
				<p class="grey-text text-lighten-4">Look at this pretty footer</p>
			</div>
			<div class="col l4 offset-l2 s12">
				<h5 class="white-text">Links</h5>
				<ul>
				<li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
				<li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
				<li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
				<li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
		© 2015 Wellington Rover Crew
		<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
		</div>
	</div>
</footer>

</body>