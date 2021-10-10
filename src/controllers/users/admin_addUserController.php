<?php

function addUser(PDO $db, AltoRouter $router)
{
	if (isset($_POST['email'])) {
		try {
			$sql = 'INSERT INTO user (email, password) VALUES (:email, :password)';
			$data = [
				'email' 	=> $_POST['email'],
				'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
			];
			$request = $db->prepare($sql);
			$result = $request->execute($data);
			$request->closeCursor();
		} catch (PDOException $e) {
			header('Location: ' . $router->generate('executionError'));
			die();
		} catch (Exception $e) {
			header('Location: ' . $router->generate('executionError'));
			die();
		} finally {
			$sql = null;
		}
	}
}
addUser($db, $router);


if ($d) {
} elseif ($f) {
}
