<?php


$referencePattern = '/^[\w\-]{6,12}$/'; // Entre 3 et 10 lettres, chiffres, tirets ou underscore

$labelPattern = '/^[0-9A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{2,24}$/'; // 2 à 24 chiffres ou lettres (+accents)(+tirets/underscores/espaces)

$globalPattern = '/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ \.,?;:!§=+\-_°@()&\"\'\[\]\#\~²]{0,1030}$/'; // Lettres, mots, chiffres (max 1030)

$pricePattern = '/^[0-9]{0,6}((,|\.)[0-9]{1,2})?$/'; // Chiffres, éventuellement suivis de d'un point ou d'une virgule et 2 chiffres

$stockPattern = '/^[0-9]{1,9}$/'; // 0 à 10 chiffres uniquement

$loginPattern = '/^[0-9A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';

$namePattern = '/^[0-9A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ -_\']{1,64}$/';




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
								'regex_match['.$globalPattern.']'),
				'errors' => array('max_length' => 'La description ne peut pas excéder 1024 caractères',
								'regex_match' => 'Des caractères non-acceptés ont été detectés dans la description')
		),

		// MAKER
		array(
				'field' => 'maker',
				'label' => 'Fabriquant',
				'rules' => array('required',
								'regex_match['.$globalPattern.']',
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


	'signup' => array(

		array(
				'field' => 'email',
				'label' => 'Adresse email',
				'rules' => array('required',
								'valid_email',
								'is_unique[Users.email]'),
				'errors' => array('required' => 'Entrez votre adresse email',
								'valid_email' => 'Entrez une adresse email valide',
								'is_unique' => 'Cette adresse est déja assignée à un compte')
		),
		array(
				'field' => 'login',
				'label' => 'Nom d\'utilisateur',
				'rules' => array('required',
								'regex_match['.$loginPattern.']',
								'is_unique[Users.login]',
								'min_length[4]',
								'max_length[16]'),
				'errors' => array('required' => 'Entrez un nom d\'utilisateur',
								'regex_match' => 'Merci de n\'utiliser que des lettres, des chiffres ou des tirets',
								'is_unique' => 'Cet identifiant est déja utilisé. Veuillez en choisir un autre',
								'max_length' => 'Votre identifiant ne peut pas excéder 16 caractères',
								'min_length' => 'Votre identifiant doit faire au moins 4 caractères')
		),
		array(
				'field' => 'firstname',
				'label' => 'Prénom',
				'rules' => array('required',
								'regex_match['.$namePattern.']'),
				'errors' => array('required' => 'Entrez votre prénom',
								'regex_match' => 'Merci d\'entrez votre vrai prénom')
		),
		array(
				'field' => 'lastname',
				'label' => 'Nom',
				'rules' => array('required',
								'regex_match['.$namePattern.']'),
				'errors' => array('required' => 'Entrez votre nom',
								'regex_match' => 'Merci d\'entrez votre vrai nom')
		),
		array(
				'field' => 'birthdateday',
				'label' => 'Jour de naissance',
				'rules' => array('required',
								'is_natural_no_zero',
								'less_than[32]'),
				'errors' => array('required' => 'Entrez votre jour de naissance',
								'is_natural_no_zero' => 'Entrez un vrai jour de naissance',
								'less_than' => 'Entrez votre vrai jour de naissance')
		),
		array(
				'field' => 'birthdatemonth',
				'label' => 'Mois de naissance',
				'rules' => array('required',
								'is_natural_no_zero',
								'less_than[13]'),
				'errors' => array('required' => 'Entrez votre mois de naissance',
								'is_natural_no_zero' => 'Entrez un vrai mois de naissance',
								'less_than' => 'Entrez votre vrai mois de naissance')
		),
		array(
				'field' => 'birthdateyear',
				'label' => 'Année de naissance',
				'rules' => array('required',
								'is_natural',
								'greater_than[1900]',
								'less_than[2020]'),
				'errors' => array('required' => 'Entrez votre année de naissance',
								'is_natural' => 'Entrez votre vraie année de naissance',
								'greater_than' => 'Entrez votre vraie année de naissance',
								'less_than' => 'Entrez votre vraie année de naissance')
		),
		array(
				'field' => 'country',
				'label' => 'Pays',
				'rules' => array('required',
								'alpha',
								'exact_length[2]'),
				'errors' => array('required' => 'Sélectionnez votre pays',
								'alpha' => 'Sélectionnez votre pays',
								'exact_length' => 'Sélectionnez votre pays'),
		),
		array(
				'field' => 'phone',
				'label' => 'N° de téléphone',
				'rules' => array('integer',
								'max_length[16]'),
				'errors' => array('integer' => 'Entrez un numéro de téléphone valide',
								'max_length' => 'Entrez un numéro de téléphone valide')
		),
		array(
				'field' => 'password',
				'label' => 'Mot de passe',
				'rules' => array('required',
								'regex_match['.$globalPattern.']',
								'min_length[6]',
								'max_length[32]'),
				'errors' => array('required' => 'Choisissez un mot de passe',
								'regex_match' => 'Caractères non-autorisés',
								'min_length' => 'Votre mot de passe doit être d\'au moins 6 caractères',
								'max_length' => 'Votre mot de passe ne peut dépasser 32 caractères')
		),
		array(
				'field' => 'passwordConfirm',
				'label' => 'Confirmation du mot de passe',
				'rules' => array('required',
								'regex_match['.$globalPattern.']',
								'matches[password]'),
				'errors' => array('required' => 'Confirmez votre mot de passe',
								'regex_match' => 'Caractères non-autorisés',
								'matches' => 'Les mots de passe ne sont pas identiques')
		)

	),

	'signin' => array(

		array(
				'field' => 'email',
				'label' => 'Adresse email',
				'rules' => array('required',
								'valid_email',
								'callback_exists_email'),
				'errors' => array('required' => 'Entrez votre adresse email',
								'valid_email' => 'Entrez votre adresse email',
								'exists_email' => 'Cette adresse email n\'existe pas')
		),
		
		array(
				'field' => 'password',
				'label' => 'Mot de passe',
				'rules' => array('required',
								'callback_correct_password'),
				'errors' => array('required' => 'Entrez votre mot de passe',
								'correct_password' => 'Identifiant ou mot de passe incorrect')
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