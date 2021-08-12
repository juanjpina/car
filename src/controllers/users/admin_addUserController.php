<?php

function addUser(PDO $db)
{
	if (!empty($_POST['email'])) {
		$sql = 'INSERT INTO users (email, password) VALUES (:email, :password)';
		$data = [
			'email' 	=> $_POST['email'],
			'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
		];
		$request = $db->prepare($sql);
		$result = $request->execute($data);
	}
}
addUser($db);


if ($d) {
} elseif ($f) {
}
