<!--Owen Holloway, Welly Rover Crew, 2014-->
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/core/globalMethods.php';
?>

<head>
	<title>Welly Rover Crew - Test Page</title>
	<script type="text/javascript">
		$(".headerBar").append(" - Test Page");
	</script>
	<link href="/froala/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<link href="/froala/css/froala_editor.min.css" rel="stylesheet" type="text/css">

	<script src="/froala/js/froala_editor.min.js"></script>

	<script>
    $(function() {
        $('#edit').editable({
            inverseSkin: true,
            inlineMode: false,
            spellcheck: true,
            imageUploadURL: '/core/upload.php', 
            imageParams: {id: "my_editor",}
        });
    });

    function post() {
    	postToUrl('/core/post.php',{content : $("#edit").editable("getHTML")});
    }
	</script>

</head>

<body>

<div class="content">
	<iframe frameBorder="0" src="http://www.google.com/calendar/embed?src=welly%40tasrovers.com" style="width: 100%; height: 500px;"></iframe>
</div>

<!--

<div class="content">
	<div id="edit">
		
	</div>
	<button onclick="post()">POST</button>
</div>

<?php
for($i = 0; $i < 2; $i++) {
echo "<div class=\"content\">
	This is just test text <br>
	Really nothing exciting ...
	</div>";
}
?>

-->
</body>