<?php


/**
 * returns a list of cars
 */
 $cars = getCarSelect($db, $router);

/**
 *creates a car session with the new car selection
 * 
 */
if (isset($_POST['cars-ok'])) {
    $car = $_POST['car'];
    $listCar = getCarId($db, $car, 'car', $router);
    $_SESSION['car'] = [
        'id_car' => $car,
        'trademark' => $listCar[0]['trademark'],
    ];
    header('Location: ' . $router->generate('editalerts'));
    die();
};
