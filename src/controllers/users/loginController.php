<?php
redirectAdmin($router);
login($db, $router);

function login(PDO $db, AltoRouter $router)
{
	if (isset($_POST['login'])) {
		honeyPot($router);
		if (!empty($_POST['login']) || !empty($_POST['password'])) {
			$data 	 = ['email' => $_POST['login']];
			$sql 	 = 'SELECT id_user, email, password, nickname FROM user WHERE email = :email';
			$request = $db->prepare($sql);
			$request->execute($data);
			$result = $request->fetch();
			$request->closeCursor();
			if ($result && password_verify($_POST['password'], $result->password)) {
				$_SESSION['auth'] = [
					'nickname' => $result->nickname,
					'email' => $result->email,
					'id_user'	=> $result->id_user,
				];
				header('Location: ' . $router->generate('white'));
				die();
			}
		}
		// if (empty($_SESSION['auth'])) {
		// 	alert('Merci de compléter les informations');
		// }
	}
}


function redirectAdmin(AltoRouter $router)
{
	if (!empty($_SESSION['auth'])) {
		header('Location: ' . $router->generate('reception'));
		die();
	}
}


function honeyPot(AltoRouter $router)
{
	if (!empty($_POST['auth'])) {
		dump('Vous êtes connecté', 'success');
		header('Location: ' . $router->generate('login'));
		die;
	}
}
