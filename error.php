<!--Owen Holloway, Welly Rover Crew, 2014-->
<?php
//This is the index for the forum all other pages after this _should_ be auto generated 
require_once $_SERVER["DOCUMENT_ROOT"].'/forum/forumCore.php';
?>

<head>
	<title>Welly Rover Crew - Home</title>
	<script type="text/javascript">
		$(".headerBar").append(" - Error");
		setPage("index");
	</script>
</head>

<body>
	<div class="content">
	<h3>An error has occurred :/</h3>
	Error description: <?php echo $_COOKIE["error"]; setcookie("error","",time()-36000,"/");?>
	</div>
</body>