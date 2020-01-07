<div id="content" class="w-full md:max-w-lg mx-auto mt-8 rounded">

	<?= validation_errors() ?>

	<div class="tabs flex rounded-t text-lg font-semibold">
	  	<button class="tablinks shadow-inner border-none w-1/2 <?= isset($focusOnSignin) ? 'active' : ''; ?>" id="signinbtn">Connexion</button>
	  	<button class="tablinks shadow-inner border-none w-1/2" id="signupbtn">Inscription</button>
	</div>


	<div id="signin" class="tabcontent shadow-xl rounded-b">
		<?= form_open('', array('class'=>'flex flex-col text-center rounded p-6')) ?>
			<div class="mt-2">
			 	<label class="block text-gray-500 font-semibold pr-3" for="emaillog">Adresse email</label>
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="emaillog" id="emaillog">
				<span id="emaillogerror" class="hidden"></span>
			</div>

			<div class="mt-2">	
			 	<label class=" text-gray-500 font-semibold pr-3" for="passwordlog">Mot de passe</label>
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="passwordlog" id="passwordlog">
				<span id="passwordlogerror" class="hidden"></span>
			</div>
			<?= form_submit('signin', 'Connexion', array('class' => 'mx-auto bg-gray-200 px-2 py-1 border-2 border-gray-300 rounded mt-4')); ?>
			<a id="forgotpassword" class="text-right text-gray-400 font-semibold" href="<?= site_url('Users/forgot_password') ?>">Mot de passe oublié</a>
		</form>
	</div>



	<div id="signup" class="tabcontent shadow-xl rounded">
	  	<?= form_open('', array('class'=>'flex flex-col rounded px-8 pt-6 pb-6')) ?>

			<div class="mt-3">	
			 	<label class="block text-gray-500 font-semibold ml-2" for="email"><i class="fas fa-envelope"></i> Adresse email</label>
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="email" id="email"  value="<?= set_value('email') ?>">
				<span id="emailerror" class="invisible">Champ</span>
			</div>

			<div class="mt-3">	
			 	<label class="block text-gray-500 font-semibold ml-2" for="login"><i class="fas fa-user"></i> Nom d'utilisateur</label>
				<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="login" id="login"  value="<?= set_value('login') ?>">
			</div>
	  		
	  		<div class="md:flex mt-3">
				<div class="md:w-1/2 md:mr-1">	
				 	<label class="block text-gray-500 font-semibold ml-2" for="login">Prénom</label>
					<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="firstname" id="firstname"  value="<?= set_value('firstname') ?>">
				</div>
				<div class="md:w-1/2 md:ml-1">	
				 	<label class="block text-gray-500 font-semibold ml-2" for="login">Nom</label>
					<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="lastname" id="lastname"  value="<?= set_value('lastname') ?>">
				</div>
			</div>

			<div class="md:flex mt-6 text-center">	
			 	<label class="w-1/2 text-gray-500 font-semibold " for="birthdate">Date de naissance</label>
				<input class="w-12 bg-gray-200 border-2 border-gray-300 rounded mr-1" type="text" name="birthdateday" id="birthdateday" maxlength="2" min="1" max="31" placeholder="JJ"  value="<?= set_value('birthdateday') ?>">
				<input class="w-12 bg-gray-200 border-2 border-gray-300 rounded mr-1" type="text" name="birthdatemonth" id="birthdatemonth" maxlength="2" min="1" max="12" placeholder="MM"  value="<?= set_value('birthdatemonth') ?>">
				<input class="w-16 bg-gray-200 border-2 border-gray-300 rounded" type="text" name="birthdateyear" id="birthdateyear" maxlength="4" min="1900" max="2020" placeholder="AAAA"  value="<?= set_value('birthdateyear') ?>">
			</div>

			<div class="md:flex mt-3">	
				<div class="md:w-1/2">
				 	<label class="block text-gray-500 font-semibold ml-2" for="country">Pays</label>
					<?= form_dropdown('country', $countriesList,'FR', array('class'=>'w-full bg-gray-200 border-2 border-gray-300 rounded mr-1 mt-1', 'id'=>'country')) ?>
				</div>
				<div class="md:w-1/2">	
				 	<label class="block text-gray-500 font-semibold ml-2" for="phone">N° de téléphone</label>
					<input class="w-full bg-gray-200 border-2 border-gray-300 rounded ml-1 mt-1" type="text" name="phone" id="phone"  value="<?= set_value('phone') ?>">
				</div>
			</div>

			<div class="md:flex mt-3">	
				<div class="md:w-1/2 mr-1">	
				 	<label class="block text-gray-500 font-semibold ml-2" for="password">Mot de passe</label>
					<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="password" id="password">
				</div>
				<div class="md:w-1/2 ml-1">	
				 	<label class="block text-gray-500 font-semibold ml-2" for="passwordConfirm">Confirmez</label>
					<input class="w-full bg-gray-200 border-2 border-gray-300 rounded mt-1" type="text" name="passwordConfirm" id="passwordConfirm">
				</div>
			</div>

			<div class="mt-3 text-right">	
			 	<label class="text-gray-500 font-semibold mr-2" for="pro">Je suis un professionnel</label>
				<input class="rounded" type="checkbox" name="pro" id="pro" <?= (set_value('pro') ? 'checked' : '') ?>>
			</div>

			<?= form_submit('signup', 'S\'inscrire', array('class' => 'mx-auto bg-gray-200 px-2 py-1 border-2 border-gray-300 rounded mt-4')); ?>
		</form>
	</div>

</div>

<script src="<?= base_url('assets/js/tabs.js') ?>"></script>
<script src="http://code.jquery.com/color/jquery.color-2.1.2.min.js"></script>
<script src="<?= base_url('assets/js/ajax-validation.js') ?>"></script>