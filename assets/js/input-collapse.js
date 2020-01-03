$(document).ready(function(){

	$('.input-activator').click(function(){

		if($('.input-collapse').css('display') == 'block'){
			$('.input-collapse').toggle('fast',function(){
				$('.dropdown-collapse').toggle('fast');
				$('.input-activator').text('Entrez-le manuellement');
			});
		}
		else{
			$('.dropdown-collapse').toggle('fast',function(){
				$('.input-collapse').toggle('fast');
				$('.input-activator').text('Afficher la liste');
			});
		}

		$('.input-collapse').val('');
	
	});

});