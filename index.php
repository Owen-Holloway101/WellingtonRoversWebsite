<!--Owen Holloway, Welly Rover Crew, 2014-->
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/core/globalMethods.php';
?>

<head>
	<title>Welly Rover Crew - Home</title>
	<script type="text/javascript">
		$(".headerBar").append(" - Home Page");
	</script>
</head>

<body>
<div class="content">
	<textarea></textarea>
</div>

<?php
for($i = 0; $i < 100; $i++) {
echo "<div class=\"content\">
	This is just test text <br>
	Really nothing exciting ...
	</div>";
}
?>
</body>