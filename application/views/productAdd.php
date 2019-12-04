
<?= validation_errors() ?>

<div class="container">

<?= form_open_multipart('', array('class'=>'form')) ?>

	<div class="md-form">
		<label for="label">Catégorie</label>
		<?= form_dropdown('category', $categoriesList,'', array('class'=>'custom-select')) ?>
	</div>

	<div class="md-form">
		<label for="label">Libellé</label>
		<input class="form-control" type="text" name="label" id="label">
	</div>

	<div class="md-form">
		<label for="referenceInput">Référence</label>
		<input class="form-control" type="text" name="reference" id="referenceInput">
		<!--<button name="reference" value="Auto-générer" id="referenceButton">-->
	</div>


	<div class="md-form">
		<label for="label">Fournisseur</label>
		<?= form_dropdown('supplier', $suppliersList,'', array('class'=>'custom-select')) ?>
	</div>


	<div class="md-form">
		<label for="description">Description</label>
		<textarea class="md-textarea form-control" name="description" id="description"></textarea>
	</div>

	<div class="md-form">
		<label for="label">Fabriquant</label>
		<?= form_dropdown('maker', $makersList,'', array('class'=>'custom-select')) ?>
	</div>

	<div class="form_check">
		<input class="form-check-input" type="checkbox", name="available", id="available">
		<label class="form-check-label" for="available">Disponible à la vente</label>
	</div>

	<div class="md-form">
		<label for="label">Délai de réapprovisionnement (en jours)</label>
		<?= form_input('availabilitydelay','', array('class'=>'form_control')) ?>
	</div>

	<div class="md-form">
		<label for="label">Images du produit</label>
		<?= form_upload('imgs') ?>
	</div>


	<?= form_submit('submit', "Ajouter") ?>

<?= form_close() ?>

</div>