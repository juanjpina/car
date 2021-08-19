<?php

$cars =  getCar($db);

//enviar a totales


if (!empty($_POST['ok'])) {

    $data = array(
        'year' => $_POST['year'],
        'car' => $_POST['car']
    );
    return  header('Location: ' . $router->generate('totalstatistics', $data));
}
