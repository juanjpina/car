<?php
/**
 * Get all movies
 * 
 * @param object PDO connect db
 * @return array results
 */
function getAllMovies(PDO $db): array
{
	if (!empty($_GET['search'])) {
		$data['search'] = '%' . $_GET['search'] . '%';
		$sql = 'SELECT id, title, released, poster, viewer FROM movies WHERE title LIKE :search ORDER BY id DESC';
		$request = $db->prepare($sql);
		$request->execute($data);	
	}
	else {
		$sql = 'SELECT id, title, released, poster, viewer FROM movies ORDER BY id DESC';
		$request = $db->query($sql);
	}

	return $request->fetchAll();
}
$movies = getAllMovies($db);
