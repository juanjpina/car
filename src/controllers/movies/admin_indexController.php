<?php
/**
 * Get all movies
 * 
 * @param object PDO connect db
 * @return array results
 */
function getAllMovies(PDO $db): array
{
	$sql = 'SELECT id, title, released FROM movies ORDER BY id DESC';
	$request = $db->query($sql);
	return $request->fetchAll();
}
$movies = getAllMovies($db);
