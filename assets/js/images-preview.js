$(document).ready(function(){


	$('.img-upload').change(function(){

		var images = $('.img-upload').prop('files');
		for(var i = 0; i < images.length; i++){


			$('#img-preview img').attr('src', window.URL.createObjectURL(images[i]));
			$('#img-preview img').attr('alt', i+1);

			$('#img-preview span').text(images[i].name);

			var newdiv = $('#img-preview').html();
			$('#img-preview:last-child').addClass('img-preview');
			$('#img-preview:last-child').attr('id', 'image'+i);

			$('#img-preview-container').html($('#img-preview-container').html() + );
			

			var pos = $(".img-preview:last-child").offset();
			console.log(pos);
			//$('#img-preview span').offset({top:pos.top+5 ,left:pos.left+5});
		}
	});
});
