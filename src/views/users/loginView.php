<?php get_header('Se connecter', 'login') ?>
<section>
	<div class="menu-login column">
		<div class="login">
			<form action="" method="post">
				<div class="mail column">
					<label for='login'>Votre e-mail</label>
					<?php $error = checkField('login', 'Votre email est vide.'); ?>
					<input type="email" class="input email<?= $error['class']; ?>" id="email" placeholder="Adresse email" name="login" value="<?= valueField('login'); ?>">
					<p class="message"> <?= $error['message']; ?> </p>
				</div>
				<div class="div-password column">
					<?php $error = checkField('password', 'Votre mot de passe est vide.'); ?>
					<label for='login'>Mot de passe</label>
					<input type="password" class=" input password<?= $error['class']; ?>" id="password" placeholder="Mot de passe" name="password" value='Mot de passe'>

					<?= $error['message']; ?>
				</div>
				<div class="column">
					<button class="button submit" type="submit">Se connecter</button>
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
<?php get_footer('login') ?>