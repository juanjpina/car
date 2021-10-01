<?php

$string = strcmp($_GET['period'], '0');
if ($string == 0) {
} else {
    $invtoll = getTotalPeriodCar($db, 'invtoll');
    $invfuel = getTotalPeriodCar($db, 'invfuel');
    $invinsurance =  getTotalPeriodCar($db, 'invinsurance');
    $invoil =  getTotalPeriodCar($db, 'invoil');
    $invpneu = getTotalPeriodCar($db, 'invpneu');
    $invtechnical = getTotalPeriodCar($db, 'invtechnical');
    $invtiming =  getTotalPeriodCar($db, 'invtiming');
}



$total =  (int)$invtoll[0]['SUM(total)'] + (int) $invfuel[0]['SUM(total)'] + (int) $invinsurance[0]['SUM(total)'] + (int) $invoil[0]['SUM(total)'] + (int) $invpneu[0]['SUM(total)'] + (int) $invtechnical[0]['SUM(total)'] +
    (int)$invtiming[0]['SUM(total)'];





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
