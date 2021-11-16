<?php




$invoice = getSelect($db, 'type_invoice');
$id_car = getSessionCar($db, $router);
$test = false;
if (
    isset($id_car) && isset($_POST['invoice'])
    && isset($_POST['date'])  && isset($_POST['total'])
) {

    if (in_range($_POST['invoice'], $value1 = 1, $value2 = 7)) {
        if (is_numeric($_POST['km'])) {
            if (is_numeric($_POST['total'])) {
                if (validateDate($_POST['date'], $format = 'Y-m-d')) {
                    $test = true;
                }
            }
        }
    }

    if ($test) {
        $id_car = $id_car;
        $invoice = $_POST['invoice'];
        $date = $_POST['date'];
        $km = $_POST['km'];
        $total = $_POST['total'];
        $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES, "UTF-8"); 

        switch ((int)$invoice) {
            case 1:
                //invtoll
                insertInvoice($db, 'invtoll', $id_car, $date, $km, $total, $comment, $router);
                break;
            case 2:
                //invfuel
                insertInvoice($db, 'invfuel', $id_car, $date, $km, $total, $comment, $router);
                break;
            case 3:
                //invtechnical
                insertInvoice($db, 'invtechnical', $id_car, $date, $km, $total, $comment, $router);
                break;
            case 4:
                //invtimingbelt
                insertInvoice($db, 'invtiming', $id_car, $date, $km, $total, $comment, $router);
                break;
            case 5:
                //invoil
                insertInvoice($db, 'invoil', $id_car, $date, $km, $total, $comment, $router);
                break;
            case 6:
                //invinsurance
                insertInvoice($db, 'invinsurance', $id_car, $date, $km, $total, $comment, $router);
                break;
            case 7:
                //invpneu
                insertInvoice($db, 'invpneu', $id_car, $date, $km, $total, $comment, $router);
                break;
            default;
        };
    } else {
        header('Location: ' . $router->generate('invoiceError'));
        die();
    } 
}; 
