<?php

$cars = getCar($db);
$invoices = getSelect($db, 'type_invoice');

$id_car = $_SESSION['car']['id_car'];
/**
 * get listed invoice
 * @param 
 * @return array data base
 */
function getListe(AltoRouter $router, $id_car)
{
    if (!empty($_POST['ok'])) {
        $string = strcmp($_POST['period'], '0');
        if ($string == 0) {

            if (!empty($_POST['dateStart']) && (!empty($_POST['dateEnd']))) {
                $data = array(
                    // 'invoice' => $_POST['invoice'],
                    'period' => '0',
                    'dateStart' => $_POST['dateStart'],
                    'dateEnd' => $_POST['dateEnd'],
                    'id' => $id_car,
                );
                return  header('Location: ' . $router->generate('listedstatistics', $data));
                // return  $router->generate('listedhistory', $data);
            } else {
                header('Refresh:' . 0.2);
                die();
            }
        } else {
            $data = array(
                // 'invoice' => $_POST['invoice'],
                'period' => $_POST['period'],
                'dateStart' => '0',
                'dateEnd' => '0',
                'id' => $id_car
            );
            // return  $router->generate('listedhistory', $data);
            return  header('Location: ' . $router->generate('listedstatistics', $data));
        }
    } else {
        $data = array(
            // 'invoice' => '5',
            'period' => '5',
            'dateStart' => '5',
            'dateEnd' => '5',
            'id' => '5'
        );
    }
    return $data;
}
getListe($router, $id_car);
