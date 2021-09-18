<?php
$trademark = getCar($db); //db car
$typeInvoice = getSelect($db, 'type_invoice'); //select db invoice
$id_car = getSessionCar($db, $router);

/**
 * me da la lista de factuas de un tipo de factura
 */
function selectInvoice(PDO $db, $database, $id_car)
{
    if (!empty($_POST['submit'])) {

        if (!empty($id_car) && !empty($_POST['typeInvoice'])) {


            // dump($_POST['trademark']);
            // dump($_POST['invoice']);
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

/**
 * detalle de la factura de nuevo con el id de la factura
 */
                                
                                
                                // function getInvoice(PDO $db)
                                // {
                                    
                                    //     if (!empty($_POST['id_toll'])) {
                                        //         $data = array(
                                            //             'id_toll' => (int)$_POST['id_toll'],
                                            //         );
                                            //         $sql = "SELECT * FROM invtoll WHERE id_toll= :id_toll";
                                            //         $request = $db->prepare($sql);
                                            //         $request->execute($data);
                                            //         $result = $request->fetchAll(PDO::FETCH_ASSOC);
                                            //         return $result;
                                            //     };
                                            // };
                                            // $getInvoice = getInvoice($db, 'a');
