<?php
$id_car = getSessionCar($db, $router);
$invoice = getSelect($db, 'type_invoice');


/**
 * collects the form data and sends it to list
 * @param 
 * @return array link post
 */
function getListed(AltoRouter $router, $id_car)
{
    $test = false;
    if (isset($_POST['ok'])) {
        $string = strcmp($_POST['period'], '0');
        if ($string == 0) {

            if (isset($_POST['dateStart']) && (isset($_POST['dateEnd']))) {
                if (validateDate($_POST['dateEnd'], $format = 'Y-m-d')) {
                    if (validateDate($_POST['dateStart'], $format = 'Y-m-d')) {
                        $test = true;
                    }
                }

                if ($test) {
                    $data = array(
                        'invoice' => $_POST['invoice'],
                        'period' => '0',
                        'dateStart' => $_POST['dateStart'],
                        'dateEnd' => $_POST['dateEnd'],
                        'id' => $id_car
                    );
                    return  header('Location: ' . $router->generate('listedhistory', $data));
                } else {
                    header('Location: ' . $router->generate('executionHistory'));
                }
            }
            // else {
            //     header('Refresh:' . 0.2);
            //     die();
            // }
        } else {
            if (in_range($_POST['period'], $value1 = 0, $value2 = 12)) {
                $test = true;
               
            }
            if ($test) {
                $data = array(
                    'invoice' => $_POST['invoice'],
                    'period' => $_POST['period'],
                    'dateStart' => '0',
                    'dateEnd' => '0',
                    'id' => $id_car
                );
                return  header('Location: ' . $router->generate('listedhistory', $data));
            } else {
                header('Location: ' . $router->generate('executionHistory'));//aqui
                die();
            }
        }
    } else {
        $data = array(
            'invoice' => '5',
            'period' => '5',
            'dateStart' => '5',
            'dateEnd' => '5',
            'id' => '5'
        );
    }
    return $data;
}
getListed($router, $id_car);
