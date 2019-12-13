<div class="max-w-lg mx-auto mt-8">

	<?= validation_errors() ?>

	<div class="tabs flex rounded">
	  	<button class="tablinks w-1/2" id="signinbtn">Se connecter</button>
	  	<button class="tablinks w-1/2 active" id="signupbtn">S'inscrire</button>
	</div>


	<div id="signin" class="tabcontent">
		<?= form_open('', array('class'=>'flex flex-col text-center rounded p-6')) ?>
			<div class="mt-2">	
			 	<label class="block text-gray-500 font-semibold pr-3" for="login">Identifiant ou adresse email</label>
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="login" id="login">
			</div>

			<div class="mt-2">	
			 	<label class="block text-gray-500 font-semibold pr-3" for="password">Mot de passe</label>
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="password" id="password">
			</div>
			<?= form_submit('', 'Connexion', array('class' => 'mx-auto bg-gray-200 px-2 py-1 border-2 border-gray-300 rounded mt-4')); ?>
		</form>
	</div>



	<div id="signup" class="tabcontent">
	  	<?= form_open('', array('class'=>'flex flex-col rounded px-8 pt-6 pb-6')) ?>


			<div class="mt-2">	
			 	<label class="block text-gray-500 font-semibold ml-2" for="email">Votre adresse email</label>
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="email" id="email"  value="<?= set_value('email') ?>">
			</div>

			<div class="mt-2">	
			 	<label class="block text-gray-500 font-semibold ml-2" for="login">Choisissez un nom d'utilisateur</label>
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="login" id="login"  value="<?= set_value('login') ?>">
			</div>
	  		
	  		<div class="flex mt-2">
				<div class="w-1/2 mr-1">	
				 	<label class="block text-gray-500 font-semibold ml-2" for="login">Votre prénom</label>
					<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="firstname" id="firstname"  value="<?= set_value('firstname') ?>">
				</div>
				<div class="w-1/2 ml-1">	
				 	<label class="block text-gray-500 font-semibold ml-2" for="login">Votre nom</label>
					<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="lastname" id="lastname"  value="<?= set_value('lastname') ?>">
				</div>
			</div>

			<div class="mt-5 mb-2 flex">	
			 	<label class="w-1/2 text-gray-500 font-semibold ml-2" for="birthdate">Votre date de naissance</label>
				<input class="w-12 bg-gray-200 border-2 border-gray-300 rounded mr-1" type="text" name="birthdateday" id="birthdateday" maxlength="2" min="1" max="31" placeholder="JJ"  value="<?= set_value('birthdateday') ?>">
				<input class="w-12 bg-gray-200 border-2 border-gray-300 rounded mr-1" type="text" name="birthdatemonth" id="birthdatemonth" maxlength="2" min="1" max="12" placeholder="MM"  value="<?= set_value('birthdatemonth') ?>">
				<input class="w-16 bg-gray-200 border-2 border-gray-300 rounded" type="text" name="birthdateyear" id="birthdateyear" maxlength="4" min="1900" max="2020" placeholder="AAAA"  value="<?= set_value('birthdateyear') ?>">
			</div>

			<div class="mt-2 flex">	
				<div class="w-1/2">
				 	<label class="block text-gray-500 font-semibold ml-2" for="country">Pays de résidence</label>
					<?= form_dropdown('country', $countriesList,'FR', array('class'=>'w-full bg-gray-200 border-2 border-gray-300 rounded mr-1 mt-1', 'id'=>'country')) ?>
				</div>
				<div class="w-1/2">	
				 	<label class="block text-gray-500 font-semibold ml-2" for="phone">Votre n° de téléphone</label>
					<input class="w-full bg-gray-200 border-2 border-gray-300 rounded ml-1 mt-1" type="text" name="phone" id="phone"  value="<?= set_value('phone') ?>">
				</div>
			</div>

			<div class="mt-2 flex">	
				<div class="w-1/2 mr-1">	
				 	<label class="block text-gray-500 font-semibold ml-2" for="password">Votre mot de passe</label>
					<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="password" id="password">
				</div>
				<div class="w-1/2 ml-1">	
				 	<label class="block text-gray-500 font-semibold ml-2" for="passwordConfirm">Confirmez</label>
					<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="passwordConfirm" id="passwordConfirm">
				</div>
			</div>

			<div class="mt-2 text-right">	
			 	<label class="text-gray-500 font-semibold mr-2" for="pro">Je suis un professionnel</label>
				<input class="rounded" type="checkbox" name="pro" id="pro" <?= (set_value('pro') ? 'checked' : '') ?>>
			</div>

			<?= form_submit('', 'Connexion', array('class' => 'mx-auto bg-gray-200 px-2 py-1 border-2 border-gray-300 rounded mt-4')); ?>
		</form>
	</div>


</div>

<script src="<?= base_url('assets/js/tabs.js') ?>"></script>