<?php

function addCategorie(PDO $db)
{
	if (!empty($_POST['categorie'])) {
		$sql = 'INSERT INTO categories (categorie) VALUES (:categorie)';
		$data = [
			'categorie'	=> $_POST['categorie']
			
		];
		$request = $db->prepare($sql);
		$result = $request->execute($data);

		dump($result);
	}
}
addCategorie($db);