<?php
redirectAdmin($router);
login($db, $router);

function login(PDO $db, AltoRouter $router)
{
	if (isset($_POST['login'])) {
		honeyPot($router);
		
		if (!empty($_POST['login']) || !empty($_POST['password'])) {
			$data 	 = ['email' => $_POST['login']];
			$sql 	 = 'SELECT password, id, username FROM users WHERE email = :email';
			$request = $db->prepare($sql);
			$request->execute($data);
			$result = $request->fetch();
	
			if ($result && password_verify($_POST['password'], $result->password)) {
				$_SESSION['auth'] = [
					'username' => $result->username,
					'id'	   => $result->id
				];
				header('Location: ' . $router->generate('homeAdmin'));
				die();
			}
		}
	
		if (empty($_SESSION['auth'])) {
			alert('Merci de compléter les informations');
		}
	}
}


function redirectAdmin(AltoRouter $router)
{
	if (!empty($_SESSION['auth'])) {
		header('Location: ' . $router->generate('homeAdmin'));
		die();
	}
}



function honeyPot(AltoRouter $router)
{
	if (!empty($_POST['username'])) {
		alert('Vous êtes connecté', 'success');
		header('Location: ' . $router->generate('login'));
		die;
	}
}
