

<?php if(isset($added) && $added){ ?>
	<div class="mx-auto max-w-xl text-sm font-semibold bg-green-100 text-green-600 border border-green-600 px-4 py-2 my-2 text-center rounded shadow">
		<p>Le produit a correctement été ajouté au catalogue</p>
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
	<h2 class="text-3xl text-gray-600 font-semibold mb-6 ml-2">Ajouter un produit</h2>
		
	<!-------------->
	<!-- CATEGORY -->
	<!-------------->
		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-gray-500 font-semibold pr-3 pl-1" for="label">Catégorie*</label>
			</div>
			<div class="md:w-3/4">
				<?= form_dropdown('category', $categoriesList,'', array('class'=>'w-full bg-gray-200 border-2 border-gray-300 rounded')) ?>
			</div>
		</div>

	<!------------->
	<!--  LABEL  -->
	<!------------->
		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-gray-500 font-semibold pr-3 pl-1" for="label">Libellé*</label>
			</div>
			<div class="md:w-3/4">
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded" type="text" name="label" id="label" value="<?= (!isset($added)) ? set_value('label') : '' ?>">
				<span id="labelerror" class="errorspan"><?= form_error('label') ?></span>
			</div>
		</div>

	<!----------------->
	<!--  REFERENCE  -->
	<!----------------->
		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-gray-500 font-semibold pr-3 pl-1" for="reference">Référence*</label>
			</div>
			<div class="md:w-3/4">
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded" type="text" name="reference" id="reference" value="<?= (!isset($added)) ? set_value('reference') : '' ?>">
				<span id="referenceerror" class="errorspan"><?= form_error('reference') ?></span>
			<!--<button name="reference" value="Auto-générer" id="referenceButton">-->
			</div>
		</div>

	<!---------------->
	<!--  SUPPLIER  -->
	<!---------------->
		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-gray-500 font-semibold pr-3 pl-1" for="label">Fournisseur*</label>
				</div>
			<div class="md:w-3/4">
				<?= form_dropdown('supplierID', $suppliersList,set_value('supplierID'), array('class'=>'w-full bg-gray-200 border-2 border-gray-300 rounded')) ?>
			</div>
		</div>

	<!------------------->
	<!--  DESCRIPTION  -->
	<!------------------->
		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-gray-500 font-semibold pr-3 pl-1" for="description">Description</label>
				</div>
			<div class="md:w-3/4">
				<textarea class="w-full bg-gray-200 border-2 border-gray-300 rounded" name="description" id="description"><?= (!isset($added)) ? set_value('description') : '' ?></textarea>
				<span id="descriptionerror" class="errorspan"><?= form_error('description') ?></span>
			</div>
		</div>

	<!------------->
	<!--  MAKER  -->
	<!------------->
		<div class="md:flex mb-1 h-full">
			<div class="md:w-1/4">
				<label class="text-gray-500 font-semibold pr-3 pl-1" for="maker">Fabriquant*</label>
			</div>
			<div class="dropdown-collapse w-full md:w-3/4">
				<?= form_dropdown('maker', $makersList,set_value('maker'), array('class'=>'w-full bg-gray-200 border-2 border-gray-300 rounded')) ?>
			</div>
			<div class="input-collapse w-full md:w-3/4 hidden">
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded" type="text", name="ownmaker", id="ptprice" value="<?= (!isset($added)) ? set_value('') : '' ?>">
				<span id="ownmakererror" class="errorspan"><?= form_error('ownmaker') ?></span>
			</div>
		</div>

		<div class="block text-right text-gray-500 font-semibold mb-2">
			<span class="input-activator font-semibold text-xs hover:underline cursor-pointer">Entrez-le manuellement</span>
		</div>

		
	<!------------->
	<!--  PRICE  -->
	<!------------->
		<div class="flex mb-5">
			<div class="w-1/2 mr-1">
				<label class="text-gray-500 font-semibold pl-1" for="ptprice">Prix*<span class="font-semibold text-xs"> hors-taxes</span></label>
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded" type="text", name="ptprice", id="ptprice" value="<?= (!isset($added)) ?set_value('ptprice') : '' ?>">
				<span id="ptpriceerror" class="errorspan"><?= form_error('ptprice') ?></span>
			</div>
	<!------------->
	<!--  STOCK  -->
	<!------------->
			<div class="w-1/2 ml-1">
				<label class="text-gray-500 font-semibold pl-1" for="stock">En stock</label>
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded" type="text", name="stock", id="stock" value="<?= (!isset($added)) ? set_value('stock') : '' ?>">
				<span id="stockerror" class="errorspan"><?= form_error('stock') ?></span>
			</div>
		</div>

	<!-------------->
	<!--  IMAGES  -->
	<!-------------->
		<div class="flex mb-2">
			<div class="w-2/3 md:w-3/4">
				<label class="text-gray-500 font-semibold pl-1" for="images">Images <span class="font-semibold text-xs"> png / jpg / gif</span><br><span id="filenumber" class="font-semibold text-sm"></span></label>
				<?= form_upload('images[]','images',array('id' => 'images','accept' => 'image/png, image/jpeg, image/gif','multiple' => '','class' => 'img-upload hidden w-0')) ?>
			</div>
	<!----------------->
	<!--  AVAILABLE  -->
	<!----------------->
			<div class="w-1/3 md:w-1/4">
				<label class="text-gray-500 font-semibold pr-3" for="available">Disponible</label>
				<input class="form-check-input" type="checkbox" name="available" id="available" checked>
			</div>
		</div>

		<div id="img-preview-container" class="w-full overflow-x-auto overflow-y-hidden flex cursor-pointer bg-gray-200 border-2 p-0  h-32">
			
		</div>

	<!-------------->
	<!--  SUBMIT  -->
	<!-------------->
		<?= form_submit('', "Ajouter", array('class'=>'bg-gray-200 border-2 border-gray-300 rounded mx-auto py-1 px-3 mt-3')) ?>

	<?= form_close() ?>
</div>

<script src="<?= base_url('assets/js/images-preview.js') ?>"></script>
<script src="<?= base_url('assets/js/input-collapse.js') ?>"></script>