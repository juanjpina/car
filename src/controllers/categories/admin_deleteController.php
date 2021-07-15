<?php

function delete(PDO $db, AltoRouter $router): void
{
	if (!empty($_GET['confirm'])) {
		$data = ['id' => $_GET['id']];
		$sql = 'DELETE FROM categories WHERE id = :id';
		$request = $db->prepare($sql);
		$request->execute($data);

		alert('La catégorie a bien été supprimé.');
		header('Location: ' . $router->generate('indexCategories'));
		die;
	}
}

$currentCate = getCateById($db, $_GET['id']);
noAccess($router, $currentCate);
delete($db, $router);
