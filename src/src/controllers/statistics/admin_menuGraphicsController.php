<?php
$id_car = getSessionCar($db, $router);


/**
 * retrieves the information from the form and sends it
 */
if (isset($_POST['ok'])) {
    if (is_numeric($_POST['endYear']) && is_numeric($_POST['startYear'])) {
        $data = array(
            'endYear' => $_POST['endYear'],
            'startYear' => $_POST['startYear'],
            'car' => $id_car
        );
        return  header('Location: ' . $router->generate('listedgraphics', $data));
    } else {
        header('Location: ' . $router->generate('executionHistory'));
    }
}
