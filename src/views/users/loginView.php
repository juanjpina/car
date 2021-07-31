<?php get_header('Se connecter', 'login') ?>

etienne@mail.com
mdp
<div class="menu-login">
	<div class="login">
		<form action="" method="post">

			<div class="mail">
				<p class="parrafo-compte">Déjà une compte</p>
				<?php $error = checkField('login', 'Votre email est vide.'); ?>
				<input type="email" class="email<?= $error['class']; ?>" id="email" placeholder="Adresse email" name="login" value="<?= valueField('login'); ?>">

				<p class="message"> <?= $error['message']; ?> </p>
			</div>

			<div class="div-password">
				<?php $error = checkField('password', 'Votre mot de passe est vide.'); ?>
				<input type="password" class="password<?= $error['class']; ?>" id="password" placeholder="Mot de passe" name="password" value='Mot de passe'>
				<a href="">
					<p class="parrafo-mot">Mot de passe oublié?</p>
				</a>
				<?= $error['message']; ?>

			</div>
			<div class="submit">
				<button class="button" type="submit">
					<p>Se connecter</p>
				</button>
			</div>
		</form>

	</div>
	<div class="compte">
		<a class="creercompte" href="<?= $router->generate('newlogin'); ?>">
			<p>Créer une compte</p>
		</a>

	</div>
</div>
<?php get_footer('login') ?>