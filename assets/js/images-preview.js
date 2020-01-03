$(document).ready(function(){

	$('#img-preview-container').click(function(){
		$('.img-upload').trigger('click');
	})


	var filenumber = 0;

	$('.img-upload').change(function(){

		$('#img-preview-container').css('filter', 'grayscale(0%)');
		$('#img-preview-container').css('background-image', 'none');
		var images = $('.img-upload').prop('files');
		for(var i = 0; i < images.length; i++){

			var imgpreview = '<img id="img'+i+'" class="img-preview w-auto h-full border object-contain bg-gray-200 mr-1" src="'+window.URL.createObjectURL(images[i])+'" alt="Image '+i+1+'">';

			$('#img-preview-container').html($('#img-preview-container').html() + imgpreview);

			filenumber ++;
			$('#filenumber').text(filenumber+' images sélectionnées');

			//$(".img-preview:last span").offset($(".img-preview:last img").offset());

		}
	});
});
