<?php

function delete(PDO $db, AltoRouter $router): void
{
	if (!empty($_GET['confirm'])) {
		$data = ['id' => $_GET['id']];
		$sql = 'DELETE FROM movies WHERE id = :id';
		$request = $db->prepare($sql);
		$request->execute($data);

		alert('Le film a bien été supprimé.');
		header('Location: ' . $router->generate('indexMovie'));
		die;
	}
}

$currentMovie = getMovieById($db, $_GET['id']);
noAccess($router, $currentMovie);
delete($db, $router);
