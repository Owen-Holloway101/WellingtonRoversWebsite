<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/core/corestyles.php';
?>

<head>
	<title>Welly - Message</title>
</head>

<body>
<div class="row">
	<div class="col s12 m6 offset-m3">
			<div class="card grey darken-3">
				<div class="card-content white-text">
					<span class="card-title">Message</span>
					<p><?php echo $_COOKIE["message"]; setcookie("message","",time()-36000,"/");?></p>
				</div>
				<div class="card-action">
				</div>
			</div>
		</div>
</div>
</body>