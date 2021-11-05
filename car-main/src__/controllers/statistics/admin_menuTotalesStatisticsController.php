<?php

$cars =  getCar($db);

//enviar a totales

$id_car = getSessionCar($db, $router);
if (!empty($_POST['ok'])) {

    if (is_numeric($_POST['year'])) {
        $data = array(
            'year' => $_POST['year'],
            'car' => $id_car
        );
        return  header('Location: ' . $router->generate('totalstatistics', $data));
    } else {
        // header('Location: ' . $router->generate('executionError'));
    }
}
