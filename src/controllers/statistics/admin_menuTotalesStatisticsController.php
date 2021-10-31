<?php

$cars =  getCar($db, $router);

//enviar a totales

$id_car = getSessionCar($db, $router);
if (isset($_POST['ok'])) {

    if (is_numeric($_POST['year'])) {
        $data = array(
            'year' => $_POST['year'],
            'car' => $id_car
        );
        return  header('Location: ' . $router->generate('totalstatistics', $data));
    } else {
        header('Location: ' . $router->generate('executionHistory'));
    }
}
