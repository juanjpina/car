<?php
redirectAdmin($router);
login($db, $router);

function login(PDO $db, AltoRouter $router)
{
	if (isset($_POST['login'])) {
		// honeyPot($router);
		if (!empty($_POST['login']) && isset($_POST['login']) || !empty($_POST['password']) && isset($_POST['password'])) {
			try {
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
				} else {
					if ($result == false) {
						return "L'e-mail est incorrect";
					}
					if (!password_verify($_POST['password'], $result->password))

						return "Le mot de passe est incorrect";

					// if (!empty($_POST['login']) &&  !empty($_POST['password'])) {
					// 	return "L'e-mail ou le mot de passe sont incorrect";
					// }
				}
			} catch (Exception $e) {
				header('Location: ' . $router->generate('executionError'));
				die();
			} catch (PDOException $e) {
				header('Location: ' . $router->generate('executionError'));
				die();
			} finally {
				$sql = null;
			}
		}
	}
}


function redirectAdmin(AltoRouter $router)
{
	if (isset($_SESSION['auth'])) {
		header('Location: ' . $router->generate('whiteHome'));
		die();
	}
}


function honeyPot(AltoRouter $router)
{
	if (isset($_POST['auth'])) {
		dump('Vous êtes connecté', 'success');
		header('Location: ' . $router->generate('login'));
		die;
	}
}
