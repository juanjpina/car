<?php get_header('Se connecter', 'login') ?>
<section>
	<div class="menu-login column">
		<div class="login column">
			<form action="" method="post" class="column" name="form">
				<div class="mail column" id="loginDivMail">
					<label for='login'>Votre e-mail*</label>
					<?php $error = checkField('login', "L'email est vide."); ?>
					<input type="email" class="input" id="emailLogin" placeholder="Adresse email" name="login" value="<?= valueField('login'); ?>">
					<p class="message" id="messageEmail"></p>
					<!-- <p class="message"> <?= $error['message']; ?> </p> -->
				</div>
				<div class="div-password column">
					<?php $error = checkField('password', 'Le mot de passe est vide.'); ?>
					<label for='login'>Mot de passe*</label>
					<input type="password" class="input" id="password" placeholder="Mot de passe" name="password" value="  ">
					<p class="message" id="messagePassword"></p>
					<!-- <p class="message"><?= $error['message']; ?></p> -->
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
<script>
	document.form.emailLogin.focus();

	let checkMail = (e) => {
		if (form.emailLogin.value == 0) {
			messageEmail.innerHTML = "L'e-mail est vide"
			e.preventDefault();
		}
	}

	let checkPassword = (e) => {
		if (form.password.value == 0) {
			messagePassword.innerHTML = "Le mot de passe est vide"
			e.preventDefault();

		}
	}

	let check = (e) => {

		checkMail(e);
		checkPassword();
	}
	form.addEventListener("submit", check);


	let emailLogin = document.getElementById('emailLogin');
	// let pMessage = document.createElement('p');
	let messageEmail = document.getElementById("messageEmail");
	let messagePassword = document.getElementById("messagePassword");
	// let inputNull = () => {
	// 	console.log(0);

	// 	if (document.form.emailLogin.value == '') {
	// 		// let message = document.createTextNode('hola');

	// 		// pMessage.appendChild(message);
	// 	}



	// }



	emailLogin.addEventListener("keyup", () => {

		if (emailLogin.value != "") {
			emailLogin.style.border = '4px solid green';

		}

		// let mail = emails.value;
		// const xhr = new XMLHttpRequest();
		// xhr.open("POST", "send");
		// xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded", true);
		// xhr.send('mail=' + mail);
		// xhr.onreadystatechange = function () {
		//     console.log(xhr.responseText);

		//     if (xhr.responseText !== 'ok') {
		//         emails.style.border = '4px solid green';
		//     } else {
		//         emails.style.border = '4px solid red';
		//     }

		// }
		console.log('as');
	});
</script>
<?php get_footer('login') ?>