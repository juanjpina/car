<?php

$cars =  getCar($db);

//enviar a totales

$id_car = getSessionCar($db, $router);
if (!empty($_POST['ok'])) {

    $data = array(
        'endYear' => $_POST['endYear'],
        'startYear' => $_POST['startYear'],
        'car' => $id_car
    );
    return  header('Location: ' . $router->generate('listedgraphics', $data));
}
