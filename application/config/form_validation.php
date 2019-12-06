<?php


$referencePattern = '/^[\w\-]{6,12}$/'; // Entre 3 et 10 lettres, chiffres, tirets ou underscore

$labelPattern = '/^[0-9A-Za-z-áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{2,24}$/'; // 2 à 24 chiffres ou lettres (+accents)(+tirets)

$descriptionPattern = '/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ \.,?;:!§=+\-_°@()&\"\'\[\]\#\~²]{0,1030}$/'; // Lettres, mots, chiffres (max 1030)

$pricePattern = '/^[0-9]{0,4}((,|\.)[0-9]{1,2})?$/'; // Chiffres, éventuellement suivis de d'un point ou d'une virgule et 2 chiffres

$stockPattern = '/^[0-9]{1,9}$/'; // 0 à 10 chiffres uniquement



$config = array(

	'Products/add' => array(

		// LABEL
		array(
				'field' => 'label',
				'label' => 'Libellé',
				'rules' => array('required',
								'min_length[4]',
								'max_length[128]',
								'regex_match['.$labelPattern.']'),
				'errors' => array('required' => 'Veuillez entrer le libellé',
								'min_length' => 'Au moins 3 caractères sont attendus',
								'max_length' => 'Votre libellé est bien trop long! (max. 128 caractères)',
								'regex_match' => 'Entrez un libellé valide!')
		),
		// REFERENCE
		array(
				'field' => 'reference',
				'label' => 'Référence',
				'rules' => array('required',
								'min_length[6]',
								'max_length[12]',
								'regex_match['.$referencePattern.']'),
				'errors' => array('required' => 'Veuillez entrer la référence',
								'min_length' => 'La référence doit faire entre 6 et 12 caractères',
								'max_length' => 'La référence doit faire entre 6 et 12 caractères',
								'regex_match' => 'La référence doit être composée de chiffres et lettres majuscules')
		),
		// SUPPLIER
		array(
				'field' => 'supplier',
				'label' => 'Fournisseur',
				'rules' => 'required'
		),
		// DESCRIPTION
		array(
				'field' => 'description',
				'label' => 'Description',
				'rules' => array('max_length[1024]',
								'regex_match['.$descriptionPattern.']'),
				'errors' => array('max_length' => 'La description ne peut pas excéder 1024 caractères',
								'regex_match' => 'Des caractères non-acceptés ont été detectés dans la description')
		),
		// MAKER
		array(
				'field' => 'maker',
				'label' => 'Fabriquant',
				'rules' => 'required'
		),
		// AVAILABILITY DELAY
		array(
				'field' => 'availabilitydelay',
				'label' => 'Délai de réapprovisionnement',
				'rules' => ''

		),

	),

	'products/update' => array(

		array(
				'field' => 'label',
				'label' => 'Libellé',
				'rules' => ''

		),
		array(
				'field' => 'reference',
				'label' => 'Référence',
				'rules' => ''

		),
		array(
				'field' => 'supplier',
				'label' => 'Fournisseur',
				'rules' => ''

		),
		array(
				'field' => 'description',
				'label' => 'Description',
				'rules' => ''

		),
		array(
				'field' => 'maker',
				'label' => 'Fabriquant',
				'rules' => ''

		),
		array(
				'field' => 'availabilitydelay',
				'label' => 'Délai de réapprovisionnement',
				'rules' => ''

		)

	)

);


?>