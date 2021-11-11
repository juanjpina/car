<?php get_header('Se connecter', 'login') ?>
<section>
	<div class="menu-login column">
		<div class="login column">
			<form action="" method="post" class="column" name="form">
				<div class="mail column" id="loginDivMail">
					<label for='login'>Votre e-mail*</label>
					<input type="email" class="input" id="emailLogin" placeholder="Adresse email" name="login" value="<?= valueField('login'); ?>">
					<p class="message" id="messageEmail"></p>
				</div>
				<div class="div-password column">
					<label for='login'>Mot de passe*</label>
					<input type="password" class="input" id="passwordLogin" placeholder="Mot de passe" name="password" value="">
					<p class="message" id="messagePassword"></p>
				</div>
				<?php $message =  login($db, $router); ?>
				<div>
					<p class="message"> <?= $message; ?> </p>
				</div>
				<div class="column">
					<button class="button" type="submit">Se connecter</button>
				</div>
				<div class="column">
					<a href="<?= $router->generate('pswforget'); ?>">
						<p class="parrafo-mot">Mot de passe oublié?</p>
					</a>
				</div>
			</form>
		</div>
		<div class="column new">
			<a class="compte button" href="<?= $router->generate('newlogin'); ?>">
				<div class="">
					<p>Créer un compte</p>
				</div>
			</a>
		</div>
	</div>
</section>
<script src="/car/src/assets/js/inputNullLogin.js"></script>
<?php get_footer('login') ?>