<?php

$string = strcmp($_GET['period'], '0');
if ($string == 0) {
    // $invoice = get($db, $_GET['invoice']);
    // $totalPeriod = getTotalDate($db, $_GET['invoice']);
} else {
    $invtoll = getTotalPeriodCar($db, 'invtoll');
    $invfuel = getTotalPeriodCar($db, 'invfuel');
    $invinsurance =  getTotalPeriodCar($db, 'invinsurance');
    $invoil =  getTotalPeriodCar($db, 'invoil');
    $invpneu = getTotalPeriodCar($db, 'invpneu');
    $invtechnical = getTotalPeriodCar($db, 'invtechnical');
    $invtiming =  getTotalPeriodCar($db, 'invtiming');

    // $getTotalPeriod = getTotalPeriod($db, $_GET['invoice']);
}
dump($invtoll);


$total =  (int)$invtoll[0]['SUM(total)'] + (int) $invfuel[0]['SUM(total)'] + (int) $invinsurance[0]['SUM(total)'] + (int) $invoil[0]['SUM(total)'] + (int) $invpneu[0]['SUM(total)'] + (int) $invtechnical[0]['SUM(total)'] +
    (int)$invtiming[0]['SUM(total)'];






















// /**
//  * @return invoice title
//  */
// $typeInvoice = getInvoiceTitel($db, $_GET['invoice'], 'type_invoice');


/**
 *table list by dates
 * @param PDO
 * @return array data base from between date 
 */
// function get(PDO $db, $database)
// {
//     // $database = $_GET['invoice'];
//     $data = [
//         'dateStart' => $_GET['dateStart'],
//         'dateEnd' => $_GET['dateEnd'],
//         'id_car' => $_GET['id']
//     ];
//     $sql = "SELECT * FROM $database WHERE id_car = :id_car AND  date BETWEEN :dateEnd AND :dateStart ORDER BY date DESC";
//     $request = $db->prepare($sql);
//     $request->execute($data);
//     $result = $request->fetchAll(PDO::FETCH_ASSOC);
//     return $result;
// };


/**
 * table list by periods
 * 
 * @param PDO
 * 
 * @return array data base from period
 */
// function getPeriod(PDO $db, $database)
// {
//     // $database = $_GET['invoice'];
//     $period = $_GET['period'];
//     $data = [
//         'id_car' => $_GET['id']
//     ];
//     $sql = "SELECT * FROM $database WHERE id_car= :id_car AND date BETWEEN  DATE_SUB( curdate(), INTERVAL $period MONTH ) AND curdate()
// ORDER BY date ASC";
//     $request = $db->prepare($sql);
//     $request->execute($data);
//     $result = $request->fetchAll(PDO::FETCH_ASSOC);
//     return $result;
// };


/**
 * sum the total of the table by periods
 * @return array 
 */
function getTotalPeriodCar(PDO $db, $database)
{
    // $database = $_GET['invoice'];
    $period = $_GET['period'];
    $data = [
        'id_car' => $_GET['id']
    ];

    $sql = "SELECT SUM(total) FROM $database WHERE id_car = :id_car AND date BETWEEN  DATE_SUB( curdate(), INTERVAL $period MONTH ) AND curdate()
ORDER BY date ASC";
    $request = $db->prepare($sql);
    $request->execute($data);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}



$totales = [
    1 => 0,
    2 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
    8 => 0,
    9 => 0,
    10 => 0,
    11 => 0,
    12 => 0
];

$invoice = [
    1 =>    'invtoll',
    2 =>    'invfuel',
    3 =>    'invoil',
    4 =>    'invtiming',
    5 =>    'invinsurance',
    6 =>    'invpneu',
    7 =>    'invtechnical'
];
dump($invoice[1]);
/**
 * sumA TOTALES POR MES Y Ano
 */
function x(PDO $db, $totales, $invoice)
{
    $as = 0;

    for ($j = 1; $j <= 7; $j++) {
        for ($i = 1; $i <= 12; $i++) {
            $data = [
                'id_car' => $_GET['id']
            ];
            $sql = "SELECT sum(total) as total FROM $invoice[$j] WHERE id_car = :id_car
and month(date) = $i and year(date)=2021";
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            $as += (int)$result[0]['total'];
            $totales[$i] += (int)$result[0]['total'];
        }
    }
    return $totales;
}

$ass = x($db, $totales, $invoice);

dump($ass);






/**
 * sum the total of the table by periods
 * @return array 
 */
function getTotalPeriod(PDO $db, $database)
{
    // $database = $_GET['invoice'];
    $period = $_GET['period'];


    $sql = "SELECT SUM(total) FROM $database WHERE date BETWEEN  DATE_SUB( curdate(), INTERVAL $period MONTH ) AND curdate()
ORDER BY date ASC";
    $request = $db->prepare($sql);
    $request->execute();
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
/**
 * sum the total of the table by dates
 * @return array 
 */
// function getTotalDate(PDO $db, $database)
// {
//     // $database = $_GET['invoice'];
//     $data = [
//         'dateStart' => $_GET['dateStart'],
//         'dateEnd' => $_GET['dateEnd'],
//         'id_car' => $_GET['id']
//     ];
//     $sql = "SELECT SUM(total) FROM $database WHERE id_car=:id_car AND date BETWEEN :dateEnd AND :dateStart ORDER BY date DESC";
//     $request = $db->prepare($sql);
//     $request->execute($data);
//     $result = $request->fetchAll(PDO::FETCH_ASSOC);
//     return $result;
// }
