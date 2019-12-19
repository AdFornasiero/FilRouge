$(document).ready(function(){

	

	var profilePos = $('#profile-toggler').offset();
	var profileHeight = $('#profile-toggler').height();
	$('.collapsible-profile').offset({top:profilePos.top+profileHeight+8});

	$('#profile-toggler').hover(function(){
		$('.collapsible-profile').slideDown(400,'swing');
	});

	$('*').click(function(){
		$('.collapsible-profile').slideUp(300,'swing');
	});

	/*$('.collapsible-profile').mouseleave(function(){
		$('.collapsible-profile').slideUp(550,'swing');
	});*/

	/*$('.collapsible-profile').hover(function(){
		$('.collapsible-profile').slideDown(350,'swing');
	});*/

	/*$('.collapsible-profile, #loginbtn').mouseenter(function(){
		$('.collapsible-profile').slideDown();
	});
*/

	var categoriesPos = $('#categories-toggler').offset();
	var categoriesHeight = $('#categories-toggler').height();
	$('.collapsible-categories').offset({top:categoriesPos.top+categoriesHeight+8,
										left:categoriesPos.left-2});

	$('#categories-toggler').hover(function(){
		$('.collapsible-categories').slideDown(400,'swing');
	});



	$('*').click(function(){
		$('.collapsible-categories').slideUp(300,'swing');
	});

});
