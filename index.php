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
	<title>Home</title>
</head>

<body>
<div class="parallax-container">
	<div class="parallax"><img src="assets/wellydoingthings/group.jpg">
	</div>
</div>
  
<div class="section white">
	<div class="row container">
		<h2 class="header">Lorem ipsum</h2>
		<p class="grey-text text-darken-3 lighten-3">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et ipsum porttitor, mollis purus a, pellentesque turpis. Donec fringilla libero nec odio hendrerit, non fringilla tortor viverra. Aenean accumsan eros id mauris mollis porta. Maecenas ac nulla vitae turpis consequat volutpat. Integer quis dui tristique, sollicitudin nulla a, porttitor nisl. Cras risus eros, vehicula id pellentesque et, semper ac quam. Donec luctus ultrices enim congue commodo. Aenean molestie convallis risus vel dapibus. Phasellus laoreet tristique tempor.
		<br>
		<br>
		Nunc imperdiet finibus leo, in convallis ex lacinia quis. Morbi viverra eros eu turpis bibendum, quis porttitor nibh dictum. Quisque sagittis elit vel ultricies gravida. Curabitur eget vehicula massa. Vestibulum dignissim nec velit et suscipit. Integer sagittis quis nisi sit amet ultricies. Morbi quis enim mollis risus semper feugiat eu in nisl. Nullam lacinia id libero luctus molestie. Vivamus elit risus, sollicitudin vel euismod nec, auctor quis nunc. Vivamus fermentum, enim a interdum sollicitudin, risus dolor auctor sapien, non consectetur ante turpis sed mi. Quisque ut aliquam mi, vel volutpat elit. Pellentesque ac nunc vel quam ultrices aliquet vel ac odio. Ut luctus eros eget vestibulum convallis. Maecenas at urna vel massa lobortis volutpat in vitae turpis.
		<br>
		<br>
		Mauris mattis dui nisl, a interdum arcu ultrices in. Proin luctus neque vulputate, hendrerit lacus eu, condimentum odio. Proin eu libero mauris. Etiam euismod nec risus nec facilisis. Morbi lacinia mattis consequat. Pellentesque quis gravida tortor. Nulla facilisi. Proin mollis risus eu arcu mattis, sit amet suscipit sapien pellentesque. Nulla risus mauris, maximus vel rhoncus quis, varius quis felis.
		<br>
		<br>
		Praesent nec ullamcorper odio, sit amet interdum elit. Vivamus quis libero eros. Phasellus eu diam ullamcorper, placerat lectus id, faucibus mi. Curabitur non leo purus. Aenean placerat nulla sit amet sem varius dapibus. Curabitur et mattis justo. Morbi fringilla lorem magna, nec bibendum massa finibus ac. Nunc vitae lectus ut neque lacinia pulvinar. Vivamus condimentum lorem mi, non pellentesque ipsum vulputate ac. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
		<br>
		<br>
		Curabitur ullamcorper ipsum vitae orci pretium, sit amet accumsan mi dictum. Etiam est tellus, consequat a iaculis eget, aliquet in erat. Donec vel lorem dolor. Quisque mollis quam leo, at vehicula felis commodo aliquet. Ut convallis nulla magna, eu pellentesque urna mollis eget. Pellentesque nec justo fringilla, pulvinar tellus eget, dignissim urna. Vestibulum sed aliquam purus, vel fermentum ipsum. Vivamus consectetur efficitur nisl. Quisque congue metus aliquam egestas placerat. Maecenas dignissim volutpat fermentum. Nulla ut orci eros. Nam posuere facilisis magna. Etiam nec lorem at quam semper efficitur. In a venenatis neque. Etiam quis ipsum et eros laoreet ullamcorper. </p>
	</div>
</div>

<div class="parallax-container">
	<div class="parallax"><img src="assets/wellydoingthings/snow.jpg">
	</div>
</div>


<footer class="page-footer green darken-2">
	<div class="container ">
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