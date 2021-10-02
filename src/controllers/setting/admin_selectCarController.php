<?php


/**
 * returns a list of cars
 */
$cars = getCar($db);


/**
 *creates a car session with the new car selection
 * 
 */
if (!empty($_POST['cars-ok'])) {
    $car = $_POST['car'];
    $listCar = getCarId($db, $car, 'car');
    $_SESSION['car'] = [
        'id_car' => $car,
        'trademark' => $listCar[0]['trademark'],
    ];
    header('Location: ' . $router->generate('editalerts'));
    die();
} else {
    header('Location: ' . $router->generate('executionError'));
    die();
};
