$(document).ready(function(){

	$('#main-image').attr('src', $('.image-preview').first().attr('src'));

	images = [];

	$('.image-preview').click(function(){
		$('#main-image').attr('src', $(this).attr('src'));
		$('.image-preview').removeClass('border');
		$(this).addClass('border');
	})
});