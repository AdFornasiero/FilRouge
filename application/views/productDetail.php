

<div class="w-4/5 md:w-3/4 lg:w-2/3 mx-auto shadow-xl mt-5 p-2">
	<div class="flex flex-wrap">

		<div class="w-full md:w-1/2 border">
			<div class="border m-2 rounded">
				<img src="<?= base_url('assets/imgs/noimg.png') ?>">
			</div>
			<div class="w-full h-32 flex border-t mt-6">
				<div class="w-1/3 m-2 border border-gray-300 bg-gray-200">
					
				</div>
				<div class="w-1/3 m-2 border border-gray-300 bg-gray-200">
					
				</div>
				<div class="w-1/3 m-2 border border-gray-300 bg-gray-200">
					
				</div>
			</div>
		</div>

		<div class="w-full md:w-1/2 p-2">
			
			<div class="text-md text-gray-600">
				<?= $product->maker ?>
			</div>
			<div class="text-4xl text-gray-800 font-semibold">
				<?= $product->label ?>
			</div>
			<div class="">
				<?= number_format($product->ptprice*1.2, 2, ",", ".") ?> €
			</div>

			<input type="button" class="bg-gray-200 border-2 border-gray-300 rounded px-2 py-1 mt-4 block" value="Ajouter au panier"/>

		</div>
	</div>
	<div class="px-8 mt-2">
		<?= $product->description ?><br>
	</div>

</div>