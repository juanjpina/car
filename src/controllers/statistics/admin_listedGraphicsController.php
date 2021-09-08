<?php

$totales = [
    1 => 0,
    2 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    6 => 0,
    7 => 0
];

$invoice = [
    1 => 'invtoll',
    2 => 'invfuel',
    3 => 'invoil',
    4 => 'invtiming',
    5 => 'invinsurance',
    6 => 'invpneu',
    7 => 'invtechnical'
];


/**
 * sumA TOTALES POR MES Y Ano
 */
function total(PDO $db, $startYear, $totales, $invoice)
{
    $as = 0;

    for ($j = 1; $j <= 7; $j++) {
        // for ($i = 1; $i <= 7; $i++) {
        $data = [
            'id_car' => $_GET['car'],
            'startYear' => $startYear
        ];
        $sql = "SELECT sum(total) as total FROM $invoice[$j] WHERE id_car = :id_car
    and year(date)= :startYear";
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        // $as += (int)$result[0]['total'];
        $totales[$j] = (int)$result[0]['total'];
    }
    // }
    return $totales;
}

if (!empty($_GET['car']) && !empty($_GET['endYear']) && !empty($_GET['startYear'])) {

    $endYear = total($db, $_GET['endYear'], $totales, $invoice);
    $startYear = total($db, $_GET['startYear'], $totales, $invoice);
    $totalEndYear = (array_sum($endYear));
    $totalStartYear = (array_sum($endYear));
    $endY = $_GET['endYear'];
    $startY = $_GET['startYear'];

    $value = 100;

    $invtollEnd = $endYear[1]; // ($value * $endYear[1]) / $totalEndYear;
    $invfuelEnd = $endYear[2]; // ($value * $endYear[2]) / $totalEndYear;
    $invoilEnd = $endYear[3]; // ($value * $endYear[3]) / $totalEndYear;
    $invtimingEnd = $endYear[4]; // ($value * $endYear[4]) / $totalEndYear;
    $invinsuranceEnd = $endYear[5]; // ($value * $endYear[5]) / $totalEndYear;
    $invpneuEnd = $endYear[6]; //($value * $endYear[6]) / $totalEndYear;
    $invtechnicalEnd = $endYear[7]; // ($value * $endYear[7]) / $totalEndYear;

    $invtollStart =  $startYear[1];  //          (($value * $startYear[1]) / $totalStartYear);
    $invfuelStart = $startYear[2]; //($value * $startYear[2]) / $totalStartYear;
    $invoilStart = $startYear[3]; //($value * $startYear[3]) / $totalStartYear;
    $invtimingStart = $startYear[4]; //($value * $startYear[4]) / $totalStartYear;
    $invinsuranceStart = $startYear[5]; //($value * $startYear[5]) / $totalStartYear;
    $invpneuStart = $startYear[6]; // ($value * $startYear[6]) / $totalStartYear;
    $invtechnicalStart = $startYear[7]; //($value * $startYear[7]) / $totalStartYear;
}
// dump($invtechnicalEnd);
