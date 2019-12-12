
<div class="w-full">
	<div class="">
		<?php foreach($products as $product){ ?>
		<a href="<?= site_url('Products/displayOne/'. $product->productID) ?>">
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