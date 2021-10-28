<?php

function addUser(PDO $db, AltoRouter $router)
{
	if (isset($_POST['email'])) {
		try {
			$data = [
				'email' 	=> $_POST['email'],
				'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
				'date' => date('Y-m-d H:i:s')
			];
			$sql = 'INSERT INTO user (email, password, date) VALUES (:email, :password, :date)';
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
