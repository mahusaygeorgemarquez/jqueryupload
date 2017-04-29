<?php
if(isset($_POST,$_POST['action'])){
	if($_POST['action'] == 'upload'){
		foreach ($_FILES["files"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
				$name = $_FILES["files"]["name"][$key];
				move_uploaded_file( $_FILES["files"]["tmp_name"][$key], "uploads/" . $_FILES['files']['name'][$key]);
			}
		}
		 
		echo json_encode( array('success'=>true) );
		exit;
	}
}
?>
<html lang="en">
	<head>
		<link rel="stylesheet" href="uploaddraganddrop.css" />
		<script type="text/javascript">
			(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);
		</script>
	</head>
	<body>
		<div class="container" role="main">

			<h1><a href="/article-url"></a></h1>

			<form method="post" action="" enctype="multipart/form-data" novalidate="" class="box">
				<input type="hidden" name="action" value="upload" />
				
				<div class="box__input">
					<svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43"><path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z"></path></svg>
					<input type="file" name="files[]" id="file" class="box__file" data-multiple-caption="{count} files selected" multiple="">
					<label for="file">2 files selected</label>
					<button type="submit" class="box__button">Upload</button>
				</div>

				
				<div class="box__uploading">Uploading…</div>
				<div class="box__success">Done! <a href="uploaddraganddrop.php" class="box__restart" role="button">Upload more?</a></div>
				<div class="box__error">Error! <span></span>. <a href="uploaddraganddrop.php" class="box__restart" role="button">Try again!</a></div>
				<input type="hidden" name="ajax" value="1">
			</form>

			<ul id="image-list"></ul>

			<footer>
				<p><strong>Be sure to try the demo on a browser (e.g. IE 9 and below) that does not support drag&amp;drop file upload. You can also try with a JavaScript support disabled.</strong></p>
				<p>The icon was borrowed from <a href="http://www.flaticon.com/free-icon/outbox_3686" target="_blank">FlatIcon</a>.</p>
			</footer>

		</div>
		<script type="text/javascript" src="uploaddraganddrop.js"></script>
	</body>
</html>