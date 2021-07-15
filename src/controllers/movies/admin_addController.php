<?php

function addMovie(PDO $db)
{
	if (!empty($_POST['title'])) {
		$sql = 'INSERT INTO movies (title, released, viewer, runtime) VALUES (:title, :released, :viewer, :runtime)';
		$data = [
			'title' 	=> $_POST['title'],
			'released'  => $_POST['released'],
			'viewer' 	=> $_POST['viewer'],
			'runtime' 	=> $_POST['runtime']
		];
		$request = $db->prepare($sql);
		$result = $request->execute($data);

		dump($result);
	}
}
addMovie($db);