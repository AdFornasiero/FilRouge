
<?= validation_errors() ?>

<div class="mx-auto w-full max-w-xl mt-8">
	<?= form_open_multipart('', array('class'=>'flex flex-col text-center shadow-md rounded px-8 pt-6 pb-8 mb-4')) ?>
		
		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="label">Catégorie</label>
			</div>
			<div class="md:w-2/3">
				<?= form_dropdown('category', $categoriesList,'', array('class'=>'bg-gray-200 border-2 border-gray-300 rounded')) ?>
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="label">Libellé</label>
			</div>
			<div class="md:w-2/3">
				<input class="bg-gray-200 border-2 border-gray-300 rounded" type="text" name="label" id="label" value="<?= set_value('label') ?>">
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="referenceInput">Référence</label>
			</div>
			<div class="md:w-2/3">
				<input class="bg-gray-200 border-2 border-gray-300 rounded" type="text" name="reference" id="referenceInput" value="<?= set_value('reference') ?>">
			<!--<button name="reference" value="Auto-générer" id="referenceButton">-->
			</div>
		</div>


		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="label">Fournisseur</label>
				</div>
			<div class="md:w-2/3">
				<?= form_dropdown('supplierID', $suppliersList,set_value('supplierID'), array('class'=>'bg-gray-200 border-2 border-gray-300 rounded')) ?>
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="description">Description</label>
				</div>
			<div class="md:w-2/3">
				<textarea class="bg-gray-200 border-2 border-gray-300 rounded" name="description" id="description"><?= set_value('description') ?></textarea>
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="maker">Fabriquant</label>
			</div>
			<div class="md:w-2/3">
				<?= form_dropdown('maker', $makersList,set_value('maker'), array('class'=>'bg-gray-200 border-2 border-gray-300 rounded')) ?>
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="ptprice">Prix (Hors-taxes)</label>
			</div>
			<div class="md:w-2/3">
				<input class="bg-gray-200 border-2 border-gray-300 rounded" type="text", name="ptprice", id="ptprice" value="<?= set_value('ptprice') ?>">
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="available">Disponible à la vente</label>
			</div>
			<div class="md:w-2/3">
				<input class="form-check-input" type="checkbox" name="available" id="available" checked>
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="stock">Quantité en stock</label>
			</div>
			<div class="md:w-2/3">
				<input class="bg-gray-200 border-2 border-gray-300 rounded" type="text", name="stock", id="stock" value="<?= set_value('stock') ?>">
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="label">Délai de réapprovisionnement (en jours)</label>
			</div>
			<div class="md:w-2/3">
				<input class="bg-gray-200 border-2 border-gray-300 rounded" type="text" name="availabilitydelay" id="availabilitydelay" value="<?= set_value('stock') ?>">
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="label">Images du produit</label>
			</div>
			<div class="md:w-2/3">
				<?= form_upload('images') ?>
			</div>
		</div>


		<?= form_submit('', "Ajouter", array('class'=>'bg-gray-200 border-2 border-gray-300 rounded')) ?>

	<?= form_close() ?>
</div>
