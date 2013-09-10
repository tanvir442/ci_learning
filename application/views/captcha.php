<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Captcha</title>
	<script type="text/javascript" src="<?php echo base_url() . "assets/js/jquery-1.9.1.js"; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . "assets/js/captcha.js"; ?>"></script>
</head>
<body>
	<div id="captcha_container">
		<?php
			if(isset($image)){
				echo $image;
			}
		?>	
	</div>
	<form id="captcha" action="<?php echo base_url('captcha/validate_captcha'); ?>" method="post" data-base_url="<?php echo base_url(); ?>">
		<input type="text" name="captcha"  />
		<input type="submit" name="submit" value="submit"  />
	</form>
	<div class="result"></div>
</body>
</html>