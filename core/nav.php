<div class="background">

<script type="text/javascript">
	function toggleNav() {
			$(".nav").toggleClass("navOpen");
			$(".navSettings").toggleClass("navOpen");
		}
</script>

</div>

<div class="headerBar">
	<div onclick="toggleNav();" class="overflow">
	<img src="/assets/overflow.png" style="width: 100%; height: 100%;">
	</div>
	Wellington Rover Crew
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="nav">
	<span onclick="location.href='/'" class="navButton">Home</span>
	<span onclick="location.href='/calendar'" class="navButton">Calendar</span>
	<span onclick="location.href='/links'" class="navButton">Links</span>
	<span onclick="location.href='/user'" class="navButton">User</span>
	<div class="fb-like-box" data-href="https://www.facebook.com/WellingtonRovers" data-width="218" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="false" data-show-border="true"></div>
	<div class="navSettings"><button onclick="toggleMobile()">Toggle Mobile Site</button></div>
</div>