<?php

$id_car = getSessionCar($db, $router);


/**
 * returns the name of the expenses
 */
$typeInvoice = getSelect($db, 'type_invoice');

/**
 * return the list of expenses
 */
function selectInvoice(PDO $db, $database, $id_car, AltoRouter $router)
{
    if (!empty($_POST['submit'])) {
        if (!empty($id_car) && !empty($_POST['typeInvoice'])) {
            $data = array(
                'id_car' => (int)$id_car,
            );
            $sql = "SELECT * FROM $database WHERE id_car= :id_car";
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            }
        } else {
            header('Location: ' . $router->generate('executionError'));
            // return
            //     array(
            //         [
            //             'id' => '0',
            //             'date' => '',
            //             'km' => '',
            //             'total' => '',
            //             'comment' => ''
            //         ]
            //     );
        }
    }
};




if (!empty($_POST['typeInvoice'])) {

    $selectInvoice = selectInvoice($db, $_POST['typeInvoice'], $id_car, $router);
} else {
    $selectInvoice
        = array(
            [
                'id' => '',
                'date' => '',
                'km' => '',
                'total' => '',
                'comment' => ''
            ]
        );
}
