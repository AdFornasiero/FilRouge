<h1 class="text-5xl font-semibold ml-2 md:ml-16 my-4">Bonjour <?= $_SESSION['login'] ?></h1>

<div class="md:flex h-screen mx-2 sm:4 md:mx-8 lg:mx-12">

	<div class="flex flex-wrap w-full md:w-3/5">
		<div id="coords" class="w-full lg:w-3/4 h-42 bg-gray-300 m-2">
			coords
		</div>

		<div id="basket" class="w-full bg-gray-300 m-2">
			panier
		</div>

		<div id="recents" class="w-full h-48 bg-gray-300 m-2">
			recent
		</div>
	</div>

	<div class="flex flex-wrap w-full md:w-2/5 ">
		<div id="historical" class="w-full bg-gray-300 m-2">
			commandes
		</div>
		<div id="adresses" class="w-full h-64 bg-gray-300 m-2">
			adresses
		</div>
	</div>


</div>