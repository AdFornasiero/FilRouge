<?php


$referencePattern = '/^[\w\-]{6,12}$/'; // Entre 3 et 10 lettres, chiffres, tirets ou underscore

$labelPattern = '/^[0-9A-Za-z-áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{2,24}$/'; // 2 à 24 chiffres ou lettres (+accents)(+tirets)

$descriptionPattern = '/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ \.,?;:!§=+\-_°@()&\"\'\[\]\#\~²]{0,1030}$/'; // Lettres, mots, chiffres (max 1030)

$pricePattern = '/^[0-9]{0,6}((,|\.)[0-9]{1,2})?$/'; // Chiffres, éventuellement suivis de d'un point ou d'une virgule et 2 chiffres

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
								'regex_match['.$referencePattern.']',
								'is_unique[products.reference]'),
				'errors' => array('required' => 'Veuillez entrer la référence',
								'min_length' => 'La référence doit faire entre 6 et 12 caractères',
								'max_length' => 'La référence doit faire entre 6 et 12 caractères',
								'regex_match' => 'La référence doit être composée de chiffres et lettres majuscules',
								'is_unique' => 'La référence saisie est déjà attribuée à un produit')
		),

		// SUPPLIER
		array(
				'field' => 'supplierID',
				'label' => 'Fournisseur',
				'rules' => array('required',
								'integer'),
				'errors' => array('required' => 'Selectionnez le fournisseur',
								'integer' => 'Selectionnez le fournisseur')
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
				'rules' => array('required',
								'regex_match['.$descriptionPattern.']',
								'max_length[64]'),
				'errors' => array('required' => 'Sélectionnez le fabriquant, ou entrez-le manuellement',
								'regex_match' => 'Sélectionnez le fabriquant, ou entrez-le manuellement',
								'max_length' => 'Sélectionnez le fabriquant, ou entrez-le manuellement')
		),

		// PRICE
		array(
				'field' => 'ptprice',
				'label' => 'Prix',
				'rules' => array('required',
								'regex_match['.$pricePattern.']'),
				'errors' => array('required' => 'Entrez le prix hors-taxes du produit',
								'regex_match' => 'Le prix n\'est pas correct')

		),

		// STOCK
		array(
				'field' => 'stock',
				'label' => 'Quantité en stock',
				'rules' => array('is_natural',
								'max_length[10]'),
				'errors' => array('is_natural' => 'Entrez la quantité en stock',
								'max_length' => 'Entrez la quantité en stock')

		),

		// AVAILABILITY DELAY
		array(
				'field' => 'availabilitydelay',
				'label' => 'Délai de réapprovisionnement',
				'rules' => array('is_natural',
								'max_length[6]'),
				'errors' => array('is_natural' => 'Entrez le délai en jours',
								'max_length' => 'Entrez le délai en jours')

		)

	),


	'users/signin' => array(

		array(
				'field' => 'email',
				'label' => 'Adresse email',
				'rules' => array('required',
								'valid_email'),
				'errors' => array('required' => 'Entrez votre adresse email',
								'valid_email' => 'Entrez une adresse email valide')

		),
		array(
				'field' => 'login',
				'label' => 'Nom d\'utilisateur',
				'rules' => array('required',
								'integer'),
				'errors' => array('required' => 'Selectionnez le fournisseur',
								'integer' => 'Selectionnez le fournisseur')

		),
		array(
				'field' => 'firstname',
				'label' => 'Prénom',
				'rules' => array('required',
								'integer'),
				'errors' => array('required' => 'Selectionnez le fournisseur',
								'integer' => 'Selectionnez le fournisseur')

		),
		array(
				'field' => 'lastname',
				'label' => 'Nom',
				'rules' => array('required',
								'integer'),
				'errors' => array('required' => 'Selectionnez le fournisseur',
								'integer' => 'Selectionnez le fournisseur')

		),
		array(
				'field' => 'birthdateday',
				'label' => 'Jour de naissance',
				'rules' => array('required',
								'integer'),
				'errors' => array('required' => 'Selectionnez le fournisseur',
								'integer' => 'Selectionnez le fournisseur')

		),
		array(
				'field' => 'birthdatemonth',
				'label' => 'Mois de naissance',
				'rules' => array('required',
								'integer'),
				'errors' => array('required' => 'Selectionnez le fournisseur',
								'integer' => 'Selectionnez le fournisseur')

		),
		array(
				'field' => 'birthdateyear',
				'label' => 'Année de naissance',
				'rules' => array('required',
								'integer'),
				'errors' => array('required' => 'Selectionnez le fournisseur',
								'integer' => 'Selectionnez le fournisseur')

		),
		array(
				'field' => 'country',
				'label' => 'country',
				'rules' => array('required',
								'integer'),
				'errors' => array('required' => 'Selectionnez le fournisseur',
								'integer' => 'Selectionnez le fournisseur')

		),
		array(
				'field' => 'phone',
				'label' => 'phone',
				'rules' => array('required',
								'integer'),
				'errors' => array('required' => 'Selectionnez le fournisseur',
								'integer' => 'Selectionnez le fournisseur')

		),
		array(
				'field' => 'password',
				'label' => 'password',
				'rules' => array('required',
								'integer'),
				'errors' => array('required' => 'Selectionnez le fournisseur',
								'integer' => 'Selectionnez le fournisseur')

		),
		array(
				'field' => 'passwordConfirm',
				'label' => 'passwordConfirm',
				'rules' => array('required',
								'integer'),
				'errors' => array('required' => 'Selectionnez le fournisseur',
								'integer' => 'Selectionnez le fournisseur')

		)

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