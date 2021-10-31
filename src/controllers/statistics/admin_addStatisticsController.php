<?php

// $cars = getCar($db);
$id_car = getSessionCar($db, $router);
$invoices = getSelect($db, 'type_invoice');



/**
 * get listed invoice
 * @param 
 * @return array data base
 */
function getListe(AltoRouter $router, $id_car)
{
    if (isset($_POST['ok'])) {
        $string = strcmp($_POST['period'], '0');
        if ($string == 0) {

            if (isset($_POST['dateStart']) && (isset($_POST['dateEnd']))) {
                $data = array(
                    'period' => '0',
                    'dateStart' => $_POST['dateStart'],
                    'dateEnd' => $_POST['dateEnd'],
                    'id' => $id_car,
                );
                return  header('Location: ' . $router->generate('listedstatistics', $data));
            } else {
                header('Location: ' . $router->generate('executionHistory'));
                // header('Refresh:' . 0.2);
                die();
            }
        } else {
            if (is_numeric($_POST['period'])) {

                $data = array(
                    'period' => $_POST['period'],
                    'dateStart' => '0',
                    'dateEnd' => '0',
                    'id' => $id_car
                );
                return  header('Location: ' . $router->generate('listedstatistics', $data));
            } else {
                header('Location: ' . $router->generate('executionHistory'));
            }
        }
    } else {
        $data = [
            [
                'period' => '5',
                'dateStart' => '5',
                'dateEnd' => '5',
                'id' => '5'
            ]
        ];
    }
    return $data;
}
getListe($router, $id_car);
