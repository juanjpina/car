<?php
$cars = getCar($db);
dump($cars);
if (!empty($_POST['cars-ok'])) {
    $car = (int)$_POST['car'];


    $listCar = getCarId($db, $car, 'car');

    dump($listCar);




    $_SESSION['car'] = [
        'id_car' => $car,
        'trademark' => $listCar[0]['trademark'],
    ];

    // $router->generate('addinvoicecar');
    // header('Location: ' . $router->generate('homeadmin'));
    die();
}
