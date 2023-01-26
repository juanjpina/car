<?php

/**
 * @param string
 * @return string
 * check the length of the string >10
 */
function lengthPseudo($pseudo)
{
	if (!empty($_POST[$pseudo])) {
		if (strlen($_POST[$pseudo]) > 9) {
			return "Le pseudo ne doit pas avoir plus de 10 caractères";
		}
	}
}


/**
 * session verification
 */
function redirectAdmin(AltoRouter $router)
{
	if (isset($_SESSION['auth'])) {
		header('Location: ' . $router->generate('whiteHome'));
		die();
	}
}


/**
 * verifies the count if it meets the proposed conditions
 * @param string (password)
 * @return boolean
 */
function password($pass)
{

	if (strlen($pass) < 9) {
		return false;
	}
	if (strlen($pass) > 17) {
		return false;
	}
	if (preg_match('@[a-zA-Z0-9]@', $pass) == 0) {
		return false;
	}
	if (preg_match('@[/\\(\\)\\=\\/\\!\\@\\#\\$\\%\\*\\-\\+\\/]@', $pass) == 0) {
		return false;
	}
	return true;
}


/**
 * function that checks if the date has a correct format
 */
function validateDate($date, $format = 'Y-m-d H:i:s')
{
	$d = DateTime::createFromFormat($format, $date);
	return $d && $d->format($format) == $date;
}


/**
 * check if it is number and if the number is between two values
 */
function in_range($number = 0, $value1 = 0, $value2 = 0)
{
	if (!is_numeric($number) or !is_numeric($value1) or !is_numeric($value2)) return false;
	if ($value1 > $value2) {
		$min = $value2;
		$max = $value1;
	} else {
		$min = $value1;
		$max = $value2;
	}
	if ($number <= $max and $number >= $min) return true;
	return false;
};


/**
 * returns from fuel table data with car id
 */
function getFuel(PDO $db, $id, AltoRouter $router)
{
	try {
		$data = [
			':id_car' => $id
		];
		$sql = "SELECT km FROM fuel WHERE id_car = :id_car";
		$request = $db->prepare($sql);
		$request->execute($data);
		$result = $request->fetchAll(PDO::FETCH_ASSOC);
		$request->closeCursor();
		return $result;
	} catch (Exception $e) {
		header('Location: ' . $router->generate('executionError'));
		die();
	} finally {
		$sql = null;
	}
}


/**
 *search the database with the user id limit 1
 * @param string (id-user)
 * @return array
 *
 */
function getCar(PDO $db, AltoRouter $router)
{
	try {
		$data = array(
			':id_user' => $_SESSION['auth']['id_user']
		);
		$sql = 'SELECT * FROM car where id_user = :id_user LIMIT 1';
		$request = $db->prepare($sql);
		$request->execute($data);
		$result = $request->fetchAll(PDO::FETCH_ASSOC);
		$request->closeCursor();
		return $result;
	} catch (Exception $e) {
		header('Location: ' . $router->generate('executionErrorr'));
		die();
	} catch (PDOException $e) {
		header('Location: ' . $router->generate('executionErrorr'));
		die();
	} finally {
		$sql = null;
	}
}


/**
 *search the database with the user id 
 * @param string (id-user)
 * @return array
 *
 */
function getCarSelect(PDO $db, AltoRouter $router)
{
	try {
		$data = array(
			':id_user' => $_SESSION['auth']['id_user']
		);
		$sql = 'SELECT * FROM car where id_user = :id_user';
		$request = $db->prepare($sql);
		$request->execute($data);
		$result = $request->fetchAll(PDO::FETCH_ASSOC);
		$request->closeCursor();
		return $result;
	} catch (Exception $e) {
		header('Location: ' . $router->generate('executionErrorr'));
		die();
	} catch (PDOException $e) {
		header('Location: ' . $router->generate('executionErrorr'));
		die();
	} finally {
		$sql = null;
	}
}


/**
 * Check if the car session is open, if you do not send to select a car or to create it
 * @return id_car
 */
function getSessionCar(PDO $db, AltoRouter $router)
{
	$car = getCar($db, $router);
	if (!empty($_SESSION['car']['id_car'])) {
		$value = (int)$_SESSION['car']['id_car'];
	} else if ($car) {

		$value = $car[0]['id_car'];
		$_SESSION['car'] = [
			'id_car' => $car[0]['id_car'],
			'trademark' => $car[0]['trademark'],
		];
		header('Location: ' . $router->generate('editalerts'));
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
	$request->closeCursor();
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
	$request->closeCursor();
	return $result;
}


/**
 * 
 * returns the data from the car table
 * @param id, data base
 * @return array data base
 */
function getCarId(PDO $db, $id, $database, AltoRouter $router)
{
	try {
		$data = array(
			':id_car' => $id,
			':id_user' => $_SESSION['auth']['id_user']
		);
		$sql = "SELECT * FROM $database where id_car = :id_car AND id_user=:id_user";
		$request = $db->prepare($sql);
		$request->execute($data);
		$result = $request->fetchAll(PDO::FETCH_ASSOC);
		$request->closeCursor();
		return $result;
	} catch (PDOException $e) {
		header('Location: ' . $router->generate('executionError'));
	} finally {
		$sql = null;
	}
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
	$request->closeCursor();
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
		$request->closeCursor(); // dump('trad', $result);
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
		$request->closeCursor();
		// dump('trad', $result);
		return $result;
	}
}


/**
 * @param: id_car / data base.
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
		$request->closeCursor();
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
		$request->closeCursor();
		// dump('timi', $result);
		if ($result) {
			return $result;
		}
	}
}


/**
 * returns a table
 * 
 * @param string 
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
 * insert data into the expenditure table
 * 
 * @param database, id_car, $date, $km, $total, $comment
 * @return add database
 */
function insertInvoice(PDO $db, $database, $id_car, $date, $km, $total, $comment, AltoRouter $router)
{
	try {
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
		$request->closeCursor();
		header('Location: ' . $router->generate('executionInvoice'));
		die();
	} catch (PDOException $e) {
		header('Location: ' . $router->generate('executionError'));
		die();
	} finally {
		$sql = null;
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
	$request->closeCursor();
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
	$request->closeCursor();
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
 * returns the favorite car 
 */
function returnFavorite(PDO $db)
{
	$data = [
		':id' => $_SESSION['auth']['id_user'],
	];

	$sql = "select trademark from car where id_car= (select id_car from favorite where id_user= :id)";
	$request = $db->prepare($sql);
	$request->execute($data);
	$result = $request->fetchAll(PDO::FETCH_ASSOC);
	$request->closeCursor();
	$value = $result[0]['trademark'];
	empty($value) ? $value = '' : $value = "'" . $value . "'";
	return $value;
}















// /**
//  * verifies the count if it meets the proposed conditions * 
//  * @param string(password)
//  * @return string
//  */
// function messagePassword($pass)
// {
// 	if (!empty($_POST[$pass])) {
// 		dump('45');
// 		// dump($_POST[$pass]);
// 		// $pass = $_POST[$pass];
// 		// if ($pass != null) {
// 		// 	dump($pass);
// 		// } else {
// 		// 	dump('as');
// 		// }

// 		if (strlen($pass) < 8) {
// 			return "Le mot de passe doit avoir au moins 8 caractères";
// 		}
// 		if (strlen($pass) > 16) {
// 			return "Le mot de passe ne doit pas avoir plus de 16 caractères";
// 		}
// 		if (preg_match('@[a-z]@', $pass) == 0) {
// 			return "Le mot de passe doit avoir au moins une minuscule";
// 		}
// 		if (preg_match('@[A-Z]@', $pass) == 0) {
// 			return "Le mot de passe doit avoir au moins une majuscule";
// 		}
// 		if (preg_match('@[0-9]@', $pass) == 0) {
// 			return "Le mot de passe doit avoir au moins un caractère numérique";
// 		}
// 	}
// 	// $_POST[$pass] = null;
// 	// dump($_POST[$pass]);
// }
