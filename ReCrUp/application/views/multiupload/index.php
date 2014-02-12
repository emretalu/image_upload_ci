<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<title>Upload Crop Image</title>
		<link rel="stylesheet" href="<?=base_url();?>assets/css/default.css" type="text/css" />
		<link rel="stylesheet" href="<?=base_url();?>assets/css/jquery.Jcrop.min.css" type="text/css" media="screen" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.Jcrop.min.js"></script>
	</head>
	<body>
		<form method="post" action="<?=site_url();?>/multiupload/go_upload" enctype="multipart/form-data">
			<input type="file" name="resim[]" multiple />
			<input type="submit" name="submit" value="Yükle" />
		</form>

		<script type="text/javascript" src="<?=base_url();?>assets/js/pop-up.js"></script>
		<script type="text/javascript" src="<?=base_url();?>assets/js/crop.js"></script>
	</body>
</html>