<?php
$invoice = getSelect($db, 'type_invoice');


function xx(AltoRouter $router)
{
    if (!empty($_POST['ok'])) {
        $string = strcmp($_POST['period'], '0');
        if ($string == 0) {

            if (!empty($_POST['dateStart']) && (!empty($_POST['dateEnd']))) {
                dump('mal error');
            } else {

                dump(0);
                $data = array(
                    'invoice' => $_POST['invoice'],
                    'period' => '',
                    'dateStart' => $_POST['dateStart'],
                    'dateEnd' => $_POST['dateEnd']
                );
                // return  header('Location: ' . $router->generate('listedhistory', $data));
            }
        } else {
            $data = array(
                'invoice' => $_POST['invoice'],
                'period' => $_POST['period'],
                'dateStart' => '',
                'dateEnd' => ''
            );
            // return  header('Location: ' . $router->generate('listedhistory', $data));
        }
    } else {
        $data = array(
            'invoice' => '5',
            'period' => '5',
            'dateStart' => '5',
            'dateEnd' => '5'
        );
    }
    return $data;
}

xx($router);
