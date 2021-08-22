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

    // dump($endYear);
    // dump(($startYear));
    $invtollEnd = (100 * $endYear[1]) / $totalEndYear;
    $invfuelEnd = (100 * $endYear[2]) / $totalEndYear;
    $invoilEnd = (100 * $endYear[3]) / $totalEndYear;
    $invtimingEnd = (100 * $endYear[4]) / $totalEndYear;
    $invinsuranceEnd = (100 * $endYear[5]) / $totalEndYear;
    $invpneuEnd = (100 * $endYear[6]) / $totalEndYear;
    $invtechnicalEnd = (100 * $endYear[7]) / $totalEndYear;

    $invtollStart = ((100 * $startYear[1]) / $totalStartYear);
    $invfuelStart = (100 * $startYear[2]) / $totalStartYear;
    $invoilStart = (100 * $startYear[3]) / $totalStartYear;
    $invtimingStart = (100 * $startYear[4]) / $totalStartYear;
    $invinsuranceStart = (100 * $startYear[5]) / $totalStartYear;
    $invpneuStart = (100 * $startYear[6]) / $totalStartYear;
    $invtechnicalStart = (100 * $startYear[7]) / $totalStartYear;
}
// dump($invtechnicalEnd);
