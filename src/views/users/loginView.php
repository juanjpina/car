<?php get_header('Se connecter', 'login') ?>

<div class="menu-login column">
	<div class="login">
		<form action="" method="post">
			<ul>
				<li>
					<div class="mail">
						<p class="parrafo-compte">Déjà une compte</p>
						<?php $error = checkField('login', 'Votre email est vide.'); ?>
						<input type="email" class=" input email<?= $error['class']; ?>" id="email" placeholder="Adresse email" name="login" value="<?= valueField('login'); ?>">

						<p class="message"> <?= $error['message']; ?> </p>
					</div>
				</li>
				<li>
					<div class="div-password">
						<?php $error = checkField('password', 'Votre mot de passe est vide.'); ?>
						<input type="password" class=" input password<?= $error['class']; ?>" id="password" placeholder="Mot de passe" name="password" value='Mot de passe'>
						<a href="">
							<p class="parrafo-mot">Mot de passe oublié?</p>
						</a>
						<?= $error['message']; ?>
					</div>
				</li>
				<li>
					<div class="">
						<button class="button submit" type="submit">Se connecter</button>
					</div>
				</li>
			</ul>
		</form>
	</div>
	<a class="compte button" href="<?= $router->generate('newlogin'); ?>">
		<div class="">
			<p>Créer un compte</p>
		</div>
	</a>
</div>
<?php get_footer('login') ?>