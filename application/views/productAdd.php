
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

<div class="mx-auto w-full max-w-lg shadow-xl mt-4">
	<?= form_open_multipart('', array('class'=>'flex flex-col rounded px-8 pt-6 pb-8 mb-4')) ?>
	<h2 class="text-3xl text-gray-600 font-semibold mb-6 ml-2">Ajouter un produit</h2>
		
		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-gray-500 font-bold pr-3" for="label">Catégorie</label>
			</div>
			<div class="md:w-3/4">
				<?= form_dropdown('category', $categoriesList,'', array('class'=>'w-full bg-gray-200 border-2 border-gray-300 rounded')) ?>
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-gray-500 font-bold pr-3" for="label">Libellé</label>
			</div>
			<div class="md:w-3/4">
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded" type="text" name="label" id="label" value="<?= set_value('label') ?>">
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-gray-500 font-bold pr-3" for="referenceInput">Référence</label>
			</div>
			<div class="md:w-3/4">
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded" type="text" name="reference" id="referenceInput" value="<?= set_value('reference') ?>">
			<!--<button name="reference" value="Auto-générer" id="referenceButton">-->
			</div>
		</div>


		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-gray-500 font-bold pr-3" for="label">Fournisseur</label>
				</div>
			<div class="md:w-3/4">
				<?= form_dropdown('supplierID', $suppliersList,set_value('supplierID'), array('class'=>'w-full bg-gray-200 border-2 border-gray-300 rounded')) ?>
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-gray-500 font-bold pr-3" for="description">Description</label>
				</div>
			<div class="md:w-3/4">
				<textarea class="w-full bg-gray-200 border-2 border-gray-300 rounded" name="description" id="description"><?= set_value('description') ?></textarea>
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/4">
				<label class="text-gray-500 font-bold pr-3" for="maker">Fabriquant</label>
			</div>
			<div class="md:w-3/4">
				<?= form_dropdown('maker', $makersList,set_value('maker'), array('class'=>'w-full bg-gray-200 border-2 border-gray-300 rounded')) ?>
			</div>
		</div>

		

		<div class="flex mb-5">
			<div class="w-1/2 mr-1">
				<label class="text-gray-500 font-bold pl-1" for="ptprice">Prix<span class="font-semibold text-xs"> hors-taxes</span></label>
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded" type="text", name="ptprice", id="ptprice" value="<?= set_value('ptprice') ?>">
			</div>

			<div class="w-1/2 ml-1">
				<label class="text-gray-500 font-bold pl-1" for="stock">En stock</label>
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded" type="text", name="stock", id="stock" value="<?= set_value('stock') ?>">
			</div>
		</div>

		<div class="flex mb-2">
			<div class="w-2/3 md:w-3/4">
				<label class="text-gray-500 font-bold" for="images">Images <span class="font-semibold text-xs"> png / jpg / gif</span><br><span id="filenumber" class="font-semibold text-sm"></span></label>
				<?= form_upload('images[]','images',array('id' => 'images','multiple' => '','class' => 'img-upload hidden w-0')) ?>
			</div>

			<div class="w-1/3 md:w-1/4">
				<label class="text-gray-500 font-bold pr-3" for="available">Disponible</label>
				<input class="form-check-input" type="checkbox" name="available" id="available" checked>
			</div>
		</div>

		<div id="img-preview-container" class="w-full overflow-x-auto overflow-y-hidden flex cursor-pointer bg-gray-200 border-2 p-0  h-32">
			
		</div>


		<?= form_submit('', "Ajouter", array('class'=>'bg-gray-200 border-2 border-gray-300 rounded mx-auto py-1 px-3 mt-3')) ?>

	<?= form_close() ?>
</div>

<script src="<?= base_url('assets/js/images-preview.js') ?>"></script>