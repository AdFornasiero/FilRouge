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
			      	<a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
			        Catégorie
			      	</a>
			    </div>
			</div>
			<div>
				<a id="loginbtn" ><i class="fas fa-user text-white text-2xl"></i></a>
			</div>
		</nav>
href="<?= site_url('Users/sign') ?>"
		<?php if(isset($_SESSION['logged'])){ ?>
			<div class="collapsible-window hidden absolute flex right-0 text-center w-64 md:w-4/12 lg:w-3/12 m-2 py-2 shadow-2xl border border-gray-200 bg-white rounded">

				<span class="collapsible-elem block text-xl font-bold text-gray-800"><?= $_SESSION['login'] ?></span>
				<span class="collapsible-elem block text-sm text-gray-400 font-semibold">Connecté</span><br><br>

				<button class="collapsible-elem m-auto bg-gray-300 border-2 border-gray-400 p-1 text-sm rounded">Se déconnecter</button>

			</div>
		<?php } ?>

	</header>

	<body>