<?php
$invoice = getSelect($db, 'type_invoice');
$cars = getCar($db);

/**
 * get listed invoice
 * @param 
 * @return array data base
 */
function getListed(AltoRouter $router)
{
    if (!empty($_POST['ok'])) {
        $string = strcmp($_POST['period'], '0');
        if ($string == 0) {

            if (!empty($_POST['dateStart']) && (!empty($_POST['dateEnd']))) {
                $data = array(
                    'invoice' => $_POST['invoice'],
                    'period' => '0',
                    'dateStart' => $_POST['dateStart'],
                    'dateEnd' => $_POST['dateEnd'],
                    'id' => $_POST['car']
                );
                return  header('Location: ' . $router->generate('listedhistory', $data));
                // return  $router->generate('listedhistory', $data);
            } else {
                header('Refresh:' . 0.2);
                die();
            }
        } else {
            $data = array(
                'invoice' => $_POST['invoice'],
                'period' => $_POST['period'],
                'dateStart' => '0',
                'dateEnd' => '0',
                'id' => $_POST['car']
            );
            // return  $router->generate('listedhistory', $data);
            return  header('Location: ' . $router->generate('listedhistory', $data));
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
getListed($router);
