<?php
/**
 * Get all catégoires
 * 
 * @param object PDO connect db
 * @return array results
 */
function getAllCategories(PDO $db): array
{
	$sql = 'SELECT id, categorie FROM categories ORDER BY id DESC';
	$request = $db->query($sql);
	return $request->fetchAll();
}

$categories = getAllCategories($db);
