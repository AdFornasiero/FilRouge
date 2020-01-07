$(document).ready(function(){


	var path = window.location.pathname.split('/');
	var baseurl = window.location.protocol + '//' + window.location.host + '/' + path[1] + '/' + path[2] + '/';

	/*$('#emaillog').blur(function(){
		$.post({
			url: baseurl + 'Users/ajax',
			data: 'emaillog='+ $('#emaillog').val(),
			datatype: 'html',
			success: function(data){
				$('#emaillogerror').fadeToggle(300);
				console.log(data);
			},
			error: function(ret, statut, err){
				console.log('erreur');
			},
			complete: function(){
				console.log('fini');
			}
		})
	});*/

	$('input[type="text"],input[type="password"]').blur(function(){
		name = $(this).attr('name');
		value = $(this).val();
		errorspan = '#' + $(this).attr('name') + 'error';

		$.post({
			url: baseurl + 'Users/ajax',
			data: {fieldname:name,fieldvalue:value},
			datatype: 'html',
			success: function(data){
				if(data.split('|')[0].length > 0){
					$(errorspan).html(data.split('|')[1]);
					$(errorspan).slideDown();
				}
				else{
					$(errorspan).slideUp();
					$(errorspan).html('');
				}
				console.log(data);
			},
			error: function(){
				console.log('erreur');
			}
		})
	});



});