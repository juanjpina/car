<?php

// dump($_GET['invoice']);
// $fecha = date("Y-m-d");
// dump($_GET['dateEnd']);
// dump($_GET['dateStart']);
// dump($fecha);

$string = strcmp($_GET['period'], '0');
if ($string == 0) {
    $invoice = get($db, $_GET['invoice']);
} else {
    $invoice = getPeriod($db, 'dfd');
}
/**
 * @return invoice title
 */
$typeInvoice = getInvoiceTitel($db, $_GET['invoice'], 'type_invoice');


/**
 * @param PDO
 * @return array data base from between date 
 */
function get(PDO $db, $database)
{
    $database = $_GET['invoice'];
    $data = [
        'dateStart' => $_GET['dateStart'],
        'dateEnd' => $_GET['dateEnd']
    ];
    $sql = "SELECT * FROM $database WHERE date BETWEEN :dateEnd AND :dateStart ORDER BY date DESC";
    $request = $db->prepare($sql);
    $request->execute($data);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
};

// SELECT * FROM `invtoll` WHERE date BETWEEN '2020-03-11' AND '2021-08-11' 
// dump(get($db, $_GET['invoice']));

/**
 * @param PDO
 * 
 * @return array data base from period
 */
function getPeriod(PDO $db, $database)
{
    $databases = $_GET['invoice'];
    $period = $_GET['period'];
    $sql = "SELECT * FROM $databases WHERE date BETWEEN  DATE_SUB( curdate(), INTERVAL $period MONTH ) AND curdate()
ORDER BY date ASC";
    $request = $db->prepare($sql);
    $request->execute();
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
};









// SELECT * FROM invtoll WHERE CAST(2021-08-12 AS DATE) >= '2021-08-12'
// AND date < DATE_ADD( '2021-08-12', INTERVAL 1 MONTH )
// ORDER BY post_date ASC

// SELECT * FROM invtoll WHERE  '2021-08-12' BET DATE_SUB( '2021-08-12', INTERVAL 1 MONTH )
// ORDER BY date ASC
// SELECT * FROM invtoll WHERE  date BETWEEN '2021-08-12' AND DATE_SUB( '2021-08-12', INTERVAL 1 MONTH )
// ORDER BY date ASC

// SELECT * FROM invtoll WHERE  date BETWEEN  DATE_SUB( curdate(), INTERVAL 1 MONTH ) AND curdate()
// ORDER BY date ASC