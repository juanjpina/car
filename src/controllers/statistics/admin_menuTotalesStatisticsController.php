<?php

$cars =  getCar($db);

//enviar a totales


if (!empty($_POST['ok'])) {

    $data = array(
        'an' => $_POST['an'],
        'car' => $_POST['car']
    );
    return  header('Location: ' . $router->generate('totalstatistics', $data));
}
