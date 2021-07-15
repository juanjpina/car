<?php

function checkAdmin(AltoRouter $router, string $path)
{
	$existAdmin = strpos($path, 'admin_');
	if ($existAdmin) :
		if (empty($_SESSION['auth'])) :
			header('Location: ' . $router->generate('login'));
			die;
		endif;
	endif;
}


function get_header(string $title, string $layout = 'public')
{
	global $router;
	require_once ROOT . '/views/layouts/' . $layout . '/header.php';
}


function get_footer(string $layout = 'public')
{
	require_once ROOT . '/views/layouts/' . $layout . '/footer.php';
}


/**
 * Convert date
 * 
 * @param string $date to convert
 * @param bool $time format datetime
 * @return string $date new format
 */
function dateFormat(string $date, bool $time = false): string
{
	$format = ($time) ? ' - %Hh%Mmin' : '';

	setlocale(LC_ALL, 'fr_FR.utf8', 'fra');
	$date = strftime('%A %e %B %Y' . $format, strtotime($date));
	$date = utf8_encode($date);

	return $date;
}



/**
 * Check if id in url exit in db movies
 */
function noAccess(AltoRouter $router, $check): void
{
	if (!$check) {
		header('Location: ' . $router->generate('homeAdmin'));
		die;
	}
}


function getMovieById(PDO $db, int $id)
{
	$data = ['id' => $id];
	$sql = 'SELECT title FROM movies WHERE id = :id';
	$request = $db->prepare($sql);
	$request->execute($data);
	return $request->fetch();
}


function formatBytes($size, $precision = 2) {
	$base     = log($size, 1024);
	$suffixes = ['', 'Ko', 'Mo', 'Go', 'To'];

	return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

function getCateById(PDO $db, int $id)
{
	$data = ['id' => $id];
	$sql = 'SELECT categorie FROM categories WHERE id = :id';
	$request = $db->prepare($sql);
	$request->execute($data);
	return $request->fetch();
}