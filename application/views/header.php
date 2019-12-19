<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?= $title ?></title>

		<!-- RESET CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/normalize.css') ?>">
		<!-- TAILWIND CDN -->
		<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
		<!-- FONT AWESOME CDN -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
		<!-- CUSTOM CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="<?= base_url('assets/js/window.js') ?>"></script>

	</head>

	<header>

		<nav class="flex items-center justify-between bg-teal-500 p-6">
		  	<div class="flex items-center flex-shrink-0 text-white mr-6">
		    	<span class="font-semibold text-xl">Tosma</span>
		 	</div>
		  	<div class="block lg:hidden">
		    		<!-- HAMBURGER MENU -->
		  	</div>
		  	<div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
			    <div class="text-sm lg:flex-grow">
			      	<a href="#" id="categories-toggler" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
			        Catégorie
			      	</a>
			    </div>
			</div>
			<div>
				<a id="profile-toggler" class="btn-collapse" href="<?= site_url('Users/sign') ?>"><i class="fas fa-user text-white text-2xl"></i></a>
			</div>
		</nav>


		<div class="collapsible-profile hidden absolute flex right-0 text-center w-64 md:w-4/12 lg:w-3/12 m-2 pt-2 pb-4 shadow-2xl border border-gray-200 bg-white rounded">
			<?php if(isset($_SESSION['logged'])){ ?>

				<span class="collapsible-elem block text-xl font-bold text-gray-800"><?= $_SESSION['login'] ?></span>
				<span class="collapsible-elem block text-sm text-gray-400 font-semibold">Connecté</span><br>

				<a href="<?= site_url('Users/logout') ?>" class="collapsible-elem m-auto bg-gray-300 border-2 border-gray-400 p-1 text-sm rounded">Se déconnecter</a>

			<?php } else { ?>

				<span class="collapsible-elem block text-sm text-gray-400 font-semibold mb-6">Vous n'êtes pas connecté</span>
				<a href="<?= site_url('Users/sign') ?>" class="collapsible-elem m-auto bg-gray-300 border-2 border-gray-400 p-1 text-sm rounded">Se connecter</a>

			<?php } ?>
		</div>

		<div class="collapsible-categories hidden absolute text-center w-auto m-2 p-2 pb-4 shadow-2xl border border-gray-200 text-sm bg-white rounded">
			<?php 
			foreach($this->Categories_model->selectParentsCategories() as $parent){ ?>
				<div class="inline-block w-1/4 align-top text-left m-2">
					<span class="font-bold text-lg"><?= $parent->label ?></span>
					<ul class="px-2 mt-1">
						<?php $subCats = $this->Categories_model->selectSubCategories($parent->categoryID);
						if($subCats){
							foreach($subCats as $subCat){ ?>

								<li class=""><a href="<?= site_url('Products/list') ?>"><?= $subCat->label ?></a></li>

							<?php } ?>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>
		</div>

	</header>

	<body>