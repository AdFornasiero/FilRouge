$(document).ready(function(){

	$('.collapsible-window').css('display', 'none');


	var btnpos = $('#loginbtn').offset();
	var btnheight = $('#loginbtn').height();

	$('.collapsible-window').offset({top:btnpos.top+btnheight+8});


	$('#loginbtn').hover(function(){
		$('.collapsible-elem').css('opacity', '0%');
		$('.collapsible-window').slideDown('slow');
		$('.collapsible-elem').animate({opacity: '100%'},'slow');
		/*$('.collapsible-window').css('height','auto');
		var finalHeight = $('.collapsible-window').height();
		$('.collapsible-window').css('height',0);

		$('.collapsible-window').animate({
			overflow: 'hidden',
			height: finalHeight,
			display: 'flex',
			'padding-top': '4px',
			'padding-bottom': '4px',
			'margin-top': '4px',
			'margin-bottom': '4px'


			
		});*/
	});

	$('*').click(function(){
		$('.collapsible-window').slideUp();
	});


	function open(){

		
		height
		padding
		margin

	}


});
