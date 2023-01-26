<?php
try {
	// Connect database
	$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

	// Config PDO
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$db->exec('SET CHARACTER SET utf8');
	if (DEBUG) :
		// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	endif;
} catch (PDOException $e) {
	if (DEBUG) :
		$message = utf8_encode($e->getMessage());
		echo $message;
	else :
		echo 'Erreur de connexion à la base de données.';
	endif;
	die();
}
