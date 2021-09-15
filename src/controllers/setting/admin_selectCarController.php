<?php $cars = getCar($db);
if (!empty($_POST['cars-ok'])) {
    $car = $_POST['car'];
    $listCar = getCarId($db, $car, 'car');
    $_SESSION['car'] = [
        'id_car' => $car,
        'trademark' => $listCar[0]['trademark'],
    ];
    header('Location: ' . $router->generate('white'));
    die();
} else {
};
