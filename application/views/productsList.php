
<div class="">
	

	<div class="flex">

		<div class="w-1/4 max-w-sm mt-8">
			<?= form_open('', array('class'=>'flex flex-col shadow-md rounded px-5 py-4 m-4')) ?>

				<div class="flex w-full mb-6">
					<i class="fas fa-search text-xl mr-2 mt-1 text-gray-500"></i>
					<input class="w-full bg-gray-200 border-2 border-gray-300 rounded" type="text" name="label" id="label" value="">
				</div>

				<h3 class="text-gray-500 text-lg font-bold mt-4">Affiner votre recherche</h3>

				<div class="flex mt-5">
					<label class="w-1/2 text-gray-500 font-semibold text-left" for="available">Prix min.</label>
					<label class="w-1/2 text-gray-500 font-semibold text-right" for="available">Prix max.</label>
				</div>

				<input id="select" type="range" name="price" min="0" max="10">

				<div class="mt-4">
					<label class="text-gray-500 font-semibold ml-1" for="maker">Fabriquant</label>
					<?= form_dropdown('maker', $makersList,'', array('class'=>'w-full bg-gray-200 rounded mt-2')) ?>
				</div>

				<div class="mt-5">
					<label class="text-gray-500 font-semibold pr-3" for="available">Disponible</label>
					<input class="form-check-input" type="checkbox" name="available" id="available" checked>
				</div>

				<?= form_submit('', "Rechercher", array('class'=>'mx-auto bg-gray-200 border-2 border-gray-300 rounded px-2 py-1 mt-4')) ?>

			<?= form_close() ?>
		</div>

		<div class="w-3/4">
			<div class="">
				<?php foreach($products as $product){ ?>
				<a href="<?= site_url('Products/display/'. $product->productID) ?>">
					<div class="flex w-full shadow my-2 p-1">
						<div class="sm:w-1/3 h-full lg:w-1/5 rounded border-solid border-2 border-gray-300 h-64">
					  		<img class=" object-cover" src="<?= base_url('assets/imgs/noimg.png') ?>" alt="No image">
					  	</div>
					  	<div class="truncate ... sm:w-2/3 lg:w-4/5 mx-4 my-2">
					    	<div class="font-bold text-2xl"><?= $product->label ?></div>
					  		<div class="font-semibold text-sm"><?= $product->maker ?></div>
						    <p class="text-gray-700 text-base"><?= $product->description ?></p>
					  		<div class="bottom-0"><?= $product->ptprice ?></div>
					  	</div>
					</div>
				</a>
				<?php } ?>
			</div>
		</div>
	</div>

</div>
