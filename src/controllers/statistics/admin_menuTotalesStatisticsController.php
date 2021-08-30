<?php

$cars =  getCar($db);

//enviar a totales

$id_car = $_SESSION['car']['id_car'];
if (!empty($_POST['ok'])) {

    $data = array(
        'year' => $_POST['year'],
        'car' => $id_car
    );
    return  header('Location: ' . $router->generate('totalstatistics', $data));
}
