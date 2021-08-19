<?php

$cars =  getCar($db);

//enviar a totales


if (!empty($_POST['ok'])) {

    $data = array(
        'endYear' => $_POST['endYear'],
        'startYear' => $_POST['startYear'],
        'car' => $_POST['car']
    );
    return  header('Location: ' . $router->generate('listedgraphics', $data));
}
