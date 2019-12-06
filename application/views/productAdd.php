
<?= validation_errors() ?>

<div class="container mx-auto w-full max-w-xl">
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
				<input class="bg-gray-200 border-2 border-gray-300 rounded" type="text" name="label" id="label">
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="referenceInput">Référence</label>
			</div>
			<div class="md:w-2/3">
				<input class="bg-gray-200 border-2 border-gray-300 rounded" type="text" name="reference" id="referenceInput">
			<!--<button name="reference" value="Auto-générer" id="referenceButton">-->
			</div>
		</div>


		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="label">Fournisseur</label>
				</div>
			<div class="md:w-2/3">
				<?= form_dropdown('supplier', $suppliersList,'', array('class'=>'bg-gray-200 border-2 border-gray-300 rounded')) ?>
			</div>
		</div>


		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="description">Description</label>
				</div>
			<div class="md:w-2/3">
				<textarea class="bg-gray-200 border-2 border-gray-300 rounded" name="description" id="description"></textarea>
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="label">Fabriquant</label>
			</div>
			<div class="md:w-2/3">
				<?= form_dropdown('maker', $makersList,'', array('class'=>'bg-gray-200 border-2 border-gray-300 rounded')) ?>
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="available">Disponible à la vente</label>
			</div>
			<div class="md:w-2/3">
				<input class="form-check-input" type="checkbox", name="available", id="available">
			</div>
		</div>

		<div class="md:flex mb-6">
			<div class="md:w-1/3">
				<label class="block text-gray-500 font-bold md:text-right pr-3" for="label">Délai de réapprovisionnement (en jours)</label>
			</div>
			<div class="md:w-2/3">
				<input class="bg-gray-200 border-2 border-gray-300 rounded" type="text", name="availabilitydelay", id="availabilitydelay">
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


		<?= form_submit('submit', "Ajouter", array('class'=>'bg-gray-200 border-2 border-gray-300 rounded')) ?>

	<?= form_close() ?>
</div>
