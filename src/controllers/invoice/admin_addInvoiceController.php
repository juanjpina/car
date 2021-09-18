<?php
// $trademark = getTrademark($db);
$invoice = getSelect($db, 'type_invoice');
$id_car = getSessionCar($db, $router);
if (
    !empty($id_car) && !empty($_POST['invoice'])
    && !empty($_POST['date'])  && !empty($_POST['total'])
) {
    $id_car = $id_car;
    $invoice = $_POST['invoice'];
    $date = $_POST['date'];
    $km = $_POST['km'];
    $total = $_POST['total'];
    $comment = $_POST['comment'];

    switch ((int)$invoice) {
        case 1:
            insertInvoice($db, 'invtoll', $id_car, $date, $km, $total, $comment);
            break;
        case 2:
            //ibvfuel
            insertInvoice($db, 'invfuel', $id_car, $date, $km, $total, $comment);
            break;
        case 3:
            $res = insertInvoice($db, 'invtechnical', $id_car, $date, $km, $total, $comment);
            maintenanceUpdate($db, 'technicalcontrol', $date, $km, $id_car);
            //invtechnicalcontrol
            break;
        case 4:
            insertInvoice($db, 'invtiming', $id_car, $date, $km, $total, $comment);
            maintenanceUpdate($db, 'timingbelt', $date, $km, $id_car);
            //invtiming
            break;
        case 5:
            insertInvoice($db, 'invoil', $id_car, $date, $km, $total, $comment);
            maintenanceUpdate($db, 'oilchanges', $date, $km, $id_car);

            //invoil
            break;
        case 6:
            insertInvoice($db, 'invinsurance', $id_car, $date, $km, $total, $comment);
            //invinsurance
            break;
        case 7:
            insertInvoice($db, 'invpneu', $id_car, $date, $km, $total, $comment);
            //invpneu
            break;
        default;
    };
    header('Refresh:' . 0.2);
};
