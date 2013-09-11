<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Download</title>
	<script type="text/javascript" src="<?php echo base_url() . "assets/js/jquery-1.9.1.js"; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . "assets/js/download.js"; ?>"></script>
</head>
<body>
	<button class="download" data-url="<?php echo base_url('download/set_download_data'); ?>" data-download="<?php echo base_url('download/download_data'); ?>" data-file_url="<?php echo base_url() . "assets/files/user_guide.zip"; ?>" data-file_name="<?php echo uniqid() . ".zip"; ?>">
		Download
	</button>
</body>
</html>