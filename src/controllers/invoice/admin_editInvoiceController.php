<?php
$typeInvoice = getSelect($db, 'type_invoice'); //select db invoice
$id_car = getSessionCar($db, $router);

/**
 * me da la lista de factuas de un tipo de factura
 */
function selectInvoice(PDO $db, $database, $id_car)
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
            return
                array(
                    [
                        'id' => '0',
                        'date' => '',
                        'km' => '',
                        'total' => '',
                        'comment' => ''
                    ]
                );
        }
    }
};



if (!empty($_POST['typeInvoice'])) {

    $selectInvoice = selectInvoice($db, $_POST['typeInvoice'], $id_car);
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
