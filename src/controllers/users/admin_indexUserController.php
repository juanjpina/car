<?php
/**
 * Get all movies
 * 
 * @param object PDO connect db
 * @return array results
 */
function getAllUser(PDO $db): array
{
	$sql = 'SELECT id, email FROM users ORDER BY id DESC';
	$request = $db->query($sql);
	return $request->fetchAll();
}
$users = getAllUser($db);
