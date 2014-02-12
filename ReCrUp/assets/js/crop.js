function runCrop(selector) {
	$(selector).Jcrop({
		onChange : showCoords,
		onSelect : showCoords,
		aspectRatio : 1
	});

	resimKirp();
}

function showCoords(c) {
	$('.popup #x').val(c.x);
	$('.popup #x2').val(c.x2);
	$('.popup #y').val(c.y);
	$('.popup #y2').val(c.y2);
	$('.popup #w').val(c.w);
	$('.popup #h').val(c.h);
	$('.popup #w2').text((c.w).toFixed(2));
	$('.popup #h2').text((c.h).toFixed(2));
}

function resimKirp() {
	$(".popup form").submit(function(e) {
		$.ajax({
			type : "POST",
			url : "http://localhost/ReCrUp/index.php/multiupload/go_crop",
			data : $('.popup form').serialize(),
			success : function(data) {
				if (data == 0) {
					$('.popup form .message').addClass('warning').show();
					$('.popup form .message').text('70x70 boyutundan küçük kırpamazsınız.');
				} else if (data == 1) {
					$('.popup form .message').addClass('success').show();
					$('.popup form .message').text('Resim kırpma işlemi başarılı.');
				} else {
					$('.popup form .message').addClass('warning').show();
					$('.popup form .message').text('Hata oluştu. Tekrar deneyiniz.');
				}
			}
		});
		e.preventDefault();
	});
}