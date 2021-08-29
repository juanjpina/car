<?php
$trademark = getTrademark($db);
$invoice = getSelect($db, 'type_invoice');
dump($_SESSION['car']['trademark']);

if (
    !empty($_POST['trademark']) && !empty($_POST['invoice'])
    && !empty($_POST['date'])  && !empty($_POST['total'])
) {

    $id_car = $_POST['trademark'];
    $invoice = $_POST['invoice'];
    $date = $_POST['date'];
    $km = $_POST['km'];
    $total = $_POST['total'];
    $comment = $_POST['comment'];
    // dump($id_car);
    // dump($invoice);
    // dump($date);
    // dump($km);
    // dump($total);
    // dump($comment);

    switch ((int)$invoice) {
        case 1:
            // dump($id_car);
            // dump($invoice);
            // dump($date);
            // dump($km);
            // dump($total);
            // dump($comment);
            //invtoll
            insertInvoice($db, 'invtoll', $id_car, $date, $km, $total, $comment);
            break;
        case 2:
            //ibvfuel
            insertInvoice($db, 'invfuel', $id_car, $date, $km, $total, $comment);
            break;
        case 3:
            insertInvoice($db, 'invtechnical', $id_car, $date, $km, $total, $comment);
            //invtechnicalcontrol
            break;
        case 4:
            insertInvoice($db, 'invtiming', $id_car, $date, $km, $total, $comment);
            //invtiming
            break;
        case 5:
            insertInvoice($db, 'invoil', $id_car, $date, $km, $total, $comment);
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

// function insert(PDO $db, $database, $id_car, $date, $km, $total, $comment)
// {
//     $data = [
//         ':id_car' => (int)$id_car,
//         ':date' => $date,
//         ':km' => (int)$km,
//         ':total' => (int)$total,
//         ':comment' => $comment
//     ];
//     $sql = "INSERT INTO $database (id_car, date, km, total, comment ) VALUES (:id_car, :date, :km, :total, :comment)";
//     $request = $db->prepare($sql);
//     $result = $request->execute($data);
// };
