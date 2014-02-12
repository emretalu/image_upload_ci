<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<title>Upload Crop Image</title>
		<link rel="stylesheet" href="<?=base_url(); ?>assets/css/default.css" type="text/css" />
		<link rel="stylesheet" href="<?=base_url(); ?>assets/css/jquery.Jcrop.min.css" type="text/css" media="screen" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="<?=base_url(); ?>assets/js/jquery.Jcrop.min.js"></script>
	</head>
	<body>

		<table width="160px" style="float:left">
			<tr>
				<td><a href="<?=base_url();?><?=$resimlink; ?>"><img src="<?=base_url();?><?=$resimlink; ?>" alt="" width="150px"/></a></td>
			</tr>
			<tr>
				<td align="center">
				<input type="button" value="Kırp"
				onclick="popup($('#kirpForm<?=$i; ?>'), <?=$x; ?>, <?=$y; ?>); $('.popup img').addClass('crop'); runCrop('.crop');"  />
				</td>
			</tr>
		</table>
		<div id="kirpForm<?=$i; ?>" style="display:none">
			<form method="post" id="kirpBeni">
				<img src="<?=base_url();?><?=$resimlink; ?>" id="crop"/>
				<input type="hidden" name="x" id="x" />
				<input type="hidden" name="y" id="y" />
				<input type="hidden" name="x2" id="x2" />
				<input type="hidden" name="y2" id="y2" />
				<input type="hidden" name="w" id="w" />
				<input type="hidden" name="h" id="h" />
				<input type="hidden" name="resimlink" value="<?=$resimlink; ?>" />
				<span id="w2">0</span> x <span id="h2">0</span> px
				<input type="submit" value="Kaydet" name="resimcrop" />
				<span>Resminizi en az 70x70px boyutlarında seçmelisiniz.</span>
				<p class="message" style="display:none"></p>
			</form>
		</div>

		<script type="text/javascript" src="<?=base_url(); ?>assets/js/pop-up.js"></script>
		<script type="text/javascript" src="<?=base_url(); ?>assets/js/crop.js"></script>
	</body>
</html>