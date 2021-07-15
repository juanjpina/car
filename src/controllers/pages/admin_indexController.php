<?php
/**
 * Get last 3 users
 * 
 * @param object PDO connect db
 * @return array results
 */
function getLastUsers(PDO $db): array
{
	$sql = 'SELECT email FROM users ORDER BY id DESC LIMIT 3';
	$request = $db->query($sql);
	return $request->fetchAll();
}


/**
 * Get last 3 movies
 * 
 * @param object PDO connect db
 * @return array results
 */
function getLastMovies(PDO $db): array
{
	$sql = 'SELECT title FROM movies ORDER BY id DESC LIMIT 3';
	$request = $db->query($sql);
	return $request->fetchAll();
}
