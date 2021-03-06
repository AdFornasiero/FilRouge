

<?php if(isset($updated) && $updated){ ?>
	<div class="mx-auto max-w-xl text-sm font-semibold bg-green-100 text-green-600 border border-green-600 px-4 py-2 my-2 text-center rounded shadow">
		<p>Le produit a correctement été modifié</p>
	</div>
<?php };
if(isset($uploaded) && !$uploaded){ ?>
	<div class="mx-auto max-w-xl text-sm font-semibold bg-red-100 text-red-700 border border-red-700 px-4 py-2 my-2 text-center rounded shadow">
		<p>Un problème est survenu pendant le chargement des images. Réessayez plus tard</p>
	</div>
<?php } ?>

<?= validation_errors() ?>
<!--------------->
<!-- FORM OPEN -->
<!--------------->
<div class="mx-auto w-full max-w-lg shadow-xl mt-4">
	<?= form_open_multipart('', array('class'=>'flex flex-col rounded px-8 pt-6 pb-8 mb-4')) ?>
	<h2 class="text-3xl text-indigo-600 font-semibold mb-6 ml-2">Modifier le produit</h2>
		
	<!-------------->
	<!-- CATEGORY -->
	<!-------------->
		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-indigo-500 font-bold pr-3 pl-1" for="label">Catégorie</label>
			</div>
			<div class="md:w-3/4">
				<?= form_dropdown('category', $categoriesList,$product->categoryID, array('class'=>'w-full bg-indigo-200 border-2 border-indigo-300 text-indigo-800 rounded')) ?>
			</div>
		</div>

	<!------------->
	<!--  LABEL  -->
	<!------------->
		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-indigo-500 font-bold pr-3 pl-1" for="label">Libellé</label>
			</div>
			<div class="md:w-3/4">
				<input class="w-full bg-indigo-200 border-2 border-indigo-300 text-indigo-800 rounded" type="text" name="label" id="label" value="<?= ($updated) ? set_value('label') : $product->label ?>">
			</div>
		</div>

	<!----------------->
	<!--  REFERENCE  -->
	<!----------------->
		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-indigo-500 font-bold pr-3 pl-1" for="referenceInput">Référence</label>
			</div>
			<div class="md:w-3/4">
				<input class="w-full bg-indigo-200 border-2 border-indigo-200 rounded text-indigo-800" type="text" name="reference" id="referenceInput" value="<?= $product->reference ?>" disabled>
			<!--<button name="reference" value="Auto-générer" id="referenceButton">-->
			</div>
		</div>

	<!---------------->
	<!--  SUPPLIER  -->
	<!---------------->
		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-indigo-500 font-bold pr-3 pl-1" for="label">Fournisseur</label>
				</div>
			<div class="md:w-3/4">
				<?= form_dropdown('supplierID', $suppliersList,$product->supplierID, array('class'=>'w-full bg-indigo-200 border-2 border-indigo-300 text-indigo-800 rounded')) ?>
			</div>
		</div>

	<!------------------->
	<!--  DESCRIPTION  -->
	<!------------------->
		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-indigo-500 font-bold pr-3 pl-1" for="description">Description</label>
				</div>
			<div class="md:w-3/4">
				<textarea class="w-full bg-indigo-200 border-2 border-indigo-300 text-indigo-800 rounded" name="description" id="description"><?= ($updated) ? set_value('description') : $product->description ?></textarea>
			</div>
		</div>

	<!------------->
	<!--  MAKER  -->
	<!------------->
		<div class="md:flex">
			<div class="md:w-1/4">
				<label class="text-indigo-500 font-bold pr-3 pl-1" for="maker">Fabriquant</label>
			</div>
			<div class="md:w-3/4 w-full hidden dropdown-collapse">
				<?= form_dropdown('maker', $makersList,$product->maker, array('class'=>'w-full bg-indigo-200 border-2 border-indigo-300 rounded')) ?>
			</div>
			<input class="input-collapse w-full md:w-3/4 bg-indigo-200 border-2 border-indigo-300 text-indigo-800 rounded" type="text", name="ownmaker", id="ptprice" value="<?= ($updated) ? set_value('maker') : $product->maker ?>">
		</div>

		<div class="block text-right text-indigo-500 font-semibold mb-1">
			<span class="input-activator font-semibold text-xs hover:underline cursor-pointer">Afficher la liste</span>
		</div>

	<!------------->
	<!--  PRICE  -->
	<!------------->
		<div class="flex mb-4">
			<div class="w-1/2 mr-1">
				<label class="text-indigo-500 font-bold pl-1" for="ptprice">Prix<span class="font-semibold text-xs"> hors-taxes</span></label>
				<input class="w-full bg-indigo-200 border-2 border-indigo-300 text-indigo-800 rounded" type="text", name="ptprice", id="ptprice" value="<?= ($updated) ? set_value('ptprice') : $product->ptprice ?>">
			</div>
	<!------------->
	<!--  STOCK  -->
	<!------------->
			<div class="w-1/2 ml-1">
				<label class="text-indigo-500 font-bold pl-1" for="stock">En stock</label>
				<input class="w-full bg-indigo-200 border-2 border-indigo-300 text-indigo-800 rounded" type="text", name="stock", id="stock" value="<?= ($updated) ? set_value('stock') : $product->stock ?>">
			</div>
		</div>

	<!---------------->
	<!--  DISCOUNT  -->
	<!---------------->
		<div class="flex mb-5">
			<div class="w-1/2 mr-1">
				<label class="text-indigo-500 font-bold pl-1" for="discount">Réduction<span class="font-semibold text-xs"> en %</span></label>
				<input class="w-full bg-indigo-200 border-2 border-indigo-300 text-indigo-800 rounded" type="text", name="discount", id="discount" value="<?= ($updated) ? set_value('discount') : $product->discount ?>">
			</div>
	<!----------------->
	<!--  AVAILABLE  -->
	<!----------------->
			<div class="w-1/2 flex flex-row-reverse items-end">
				<input class="form-check-input mb-1" type="checkbox" name="available" id="available" <?= ($product->available) ? 'checked' : '' ?>>
				<label class="text-indigo-500 font-bold mr-3 ml-1" for="available">Disponible</label>
			</div>
		</div>

	<!-------------->
	<!--  IMAGES  -->
	<!-------------->
		<div class="flex mb-2">
			<div class="w-full">
				<label class="text-indigo-500 font-bold pl-1" for="images">Images <span class="font-semibold text-xs"> png / jpg / gif</span><br><span id="filenumber" class="font-semibold text-sm"></span></label>
				<?= form_upload('images[]','images',array('id' => 'images','multiple' => '','class' => 'img-upload hidden w-0')) ?>
			</div>
		</div>

		<div id="img-preview-container" class="w-full overflow-x-auto overflow-y-hidden flex cursor-pointer bg-indigo-200 border-2 p-0  h-32">
			
		</div>

	<!-------------->
	<!--  SUBMIT  -->
	<!-------------->
		<?= form_submit('', "Ajouter", array('class'=>'bg-indigo-200 border-2 border-indigo-300 rounded mx-auto py-1 px-3 mt-3')) ?>

	<?= form_close() ?>
</div>

<script src="<?= base_url('assets/js/images-preview.js') ?>"></script>
<script src="<?= base_url('assets/js/input-collapse.js') ?>"></script>