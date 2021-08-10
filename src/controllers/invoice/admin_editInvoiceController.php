<?php
$trademark = getTrademark($db);
$typeInvoice = getSelect($db, 'type_invoice');
/**
 * me da la lista de factuas de un tipo de factura
 */
function selectInvoice(PDO $db, $database)
{
    // dump($_POST['trademark']);
    // dump($_POST['invoice']);
    if (!empty($_POST['trademark']) && !empty($_POST['typeInvoice'])) {
        switch ($_POST['typeInvoice']) {
            case 1: {
                    // dump($_POST['trademark']);
                    // dump($_POST['invoice']);
                    $data = array(
                        'id_car' => (int)$_POST['trademark'],
                    );
                    $sql = "SELECT * FROM invtoll WHERE id_car= :id_car";
                    $request = $db->prepare($sql);
                    $request->execute($data);
                    $result = $request->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                    break;
                }
            default;
        };
    };
};
$selectInvoice = selectInvoice($db, 'dd');

/**
 * detalle de la factura de nuevo con el id de la factura
 */


function getInvoice(PDO $db)
{

    if (!empty($_POST['typeInvoice'])) {
        $data = array(
            'id_toll' => (int)$_POST['typeInvoice'],
        );
        $sql = "SELECT * FROM invtoll WHERE id_toll= :id_toll";
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    };
};
$getInvoice = getInvoice($db, 'a');
