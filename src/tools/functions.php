<?php

/**
 * @param id-user
 * 
 * @return get id_car
 * 
 */
function getCar(PDO $db)
{
	$data = array(
		':id_user' => $_SESSION['auth']['id_user']
	);
	$sql = 'SELECT * FROM car where id_user = :id_user ';
	$request = $db->prepare($sql);
	$request->execute($data);
	$result = $request->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

/**
 * Check if the car session is open, if you do not send to select a car or to create it
 * @return id_car
 */
function getSessionCar(PDO $db, AltoRouter $router)
{
	if (!empty($_SESSION['car']['id_car'])) {
		$value = (int)$_SESSION['car']['id_car'];
	} else if (getCar($db)) {
		header('Location: ' . $router->generate('selectcar'));
		die();
	} else {
		header('Location: ' . $router->generate('addnewcar'));
		die();
	}
	return $value;
};



/**
 * @param id_user
 * @return array 
 */
function getUser(PDO $db, $id_user)
{
	$data = array(
		'id_user' => $id_user
	);
	$sql = 'SELECT * FROM user WHERE id_user= :id_user';
	$request = $db->prepare($sql);
	$request->execute($data);
	$result = $request->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}




/**
 * @param id, data base
 * @return array data base
 */
function getInvoice(PDO $db, $id, $database)
{
	$data = array(
		':id' => $id
	);
	$sql = "SELECT * FROM $database where id = :id";
	$request = $db->prepare($sql);
	$request->execute($data);
	$result = $request->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

/**
 * @param id, data base
 * @return array data base
 */
function getCarId(PDO $db, $id, $database)
{
	$data = array(
		':id_car' => $id
	);
	$sql = "SELECT * FROM $database where id_car = :id_car";
	$request = $db->prepare($sql);
	$request->execute($data);
	$result = $request->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}


/**
 * @param id, data base
 * @return array data base
 */
function getInvoiceTitel(PDO $db, $invoice, $database)
{
	$data = array(
		':invoice' => $invoice
	);
	$sql = "SELECT type FROM $database where invoice = :invoice";
	$request = $db->prepare($sql);
	$request->execute($data);
	$result = $request->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}


/**
 * @param id_car / id_user
 * 
 * @return: array data base car (trademark). 
 */
function getTrademark(PDO $db)
{
	if (!empty($_POST['select'])) {
		$data = array(
			':id_car' => $_POST['select']
		);
		$sql = 'SELECT * FROM car where id_car = :id_car LIMIT 1';
		$request = $db->prepare($sql);
		$request->execute($data);
		$result = $request->fetchAll(PDO::FETCH_ASSOC);
		// dump('trad', $result);
		return $result;
	} else {
		// dump($_SESSION['auth']['id_user']);
		$data = array(
			':id_user' => $_SESSION['auth']['id_user']
		);
		$sql = 'SELECT * FROM car where id_user = :id_user LIMIT 1';
		$request = $db->prepare($sql);
		$request->execute($data);
		$result = $request->fetchAll(PDO::FETCH_ASSOC);
		// dump('trad', $result);
		return $result;
	}
}


/**
 * @param: id_car / data base.
 * 
 * @return: array data base, 
 * 
 */
function dbSelect(PDO $db, $id_car, $database)
{
	if (!empty($_POST['select'])) {
		$data = array(
			':id_car' => $_POST['select']
		);
		$sql = "SELECT * FROM $database where (id_car = :id_car)";
		$request = $db->prepare($sql);
		$request->execute($data);
		$result = $request->fetchAll(PDO::FETCH_ASSOC);
		if ($result) {
			return $result;
		}
	} else {
		$data = array(
			':id_car' => $id_car
		);
		$sql = "SELECT * FROM $database where (id_car = :id_car)";
		$request = $db->prepare($sql);
		$request->execute($data);
		$result = $request->fetchAll(PDO::FETCH_ASSOC);
		// dump('timi', $result);
		if ($result) {
			return $result;
		}
	}
}


/**
 * returns a table
 * 
 * @param table
 * 
 * @return array data base.
 */
function getSelect(PDO $db, $table)
{
	$sql      = "SELECT * FROM $table";
	$request = $db->prepare($sql);
	$request->execute();
	$result = $request->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}


/**
 * @param database, id_car, $date, $km, $total, $comment
 * 
 * @return add database
 */
function insertInvoice(PDO $db, $database, $id_car, $date, $km, $total, $comment, AltoRouter $router)
{
	$data = [
		':id_car' => (int)$id_car,
		':date' => $date,
		':km' => (int)$km,
		':total' => (int)$total,
		':comment' => $comment
	];
	$sql = "INSERT INTO $database (id_car, date, km, total, comment ) VALUES (:id_car, :date, :km, :total, :comment)";
	$request = $db->prepare($sql);
	$result = $request->execute($data);
	if ($result) {
		header('Location: ' . $router->generate('execution'));
	}
};


/**
 * update form a data base
 */
function maintenanceUpdate(PDO $db, $invoice, $date, $km, $id_car)
{
	$data = [
		':id_car' => $id_car,
		':date'  => $date,
		':km' =>  (int)$km,
	];
	$sql = "INSERT INTO $invoice (id_car, date, km) VALUES (:id_car, :date, :km) ";
	$request = $db->prepare($sql);
	$result = $request->execute($data);
}

/**
 * returns the last car in the data base.
 */
function getLastCar(PDO $db)
{
	$sql = "SELECT * FROM car ORDER BY id_car DESC LIMIT 1";
	$request = $db->prepare($sql);
	$request->execute();
	$result = $request->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}


























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


// function getMovieById(PDO $db, int $id)
// {
// 	$data = ['id' => $id];
// 	$sql = 'SELECT title FROM movies WHERE id = :id';
// 	$request = $db->prepare($sql);
// 	$request->execute($data);
// 	return $request->fetch();
// }


// function formatBytes($size, $precision = 2)
// {
// 	$base     = log($size, 1024);
// 	$suffixes = ['', 'Ko', 'Mo', 'Go', 'To'];

// 	return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
// }

// function getCateById(PDO $db, int $id)
// {
// 	$data = ['id' => $id];
// 	$sql = 'SELECT categorie FROM categories WHERE id = :id';
// 	$request = $db->prepare($sql);
// 	$request->execute($data);
// 	return $request->fetch();
// }

/**
 * busca en la tabla de types y devuelve el resultado de las columnas en base al id_user.
 */
// function searchDb(PDO $db, $table, $id_user)
// {

	// $data = ['$id_user' => $_SESSION['auth']['id_user']];
	// $sql = 'SELECT id_car FROM user WHERE id_user = :id_user';
	// $request = $db->prepare($sql);
	// $request->execute($data);

	// 	$data=>id_car


	// // $data = ['$id' => $id];
	// $sql = 'SELECT * FROM $table WHERE id_car = :id';
	// $request = $db->prepare($sql);
	// $request->execute($data);
	// return $request->fetch();


// }
