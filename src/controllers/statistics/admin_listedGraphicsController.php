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
    // $endYear = total($db, $_GET['startYear'], $totales, $invoice);
    $totalEndYear = (array_sum($endYear));


    $invtol = ((100 * $endYear[1]) / $totalEndYear);

    $intvoll = round(((100 * $endYear[1]) / $totalEndYear), 2, PHP_ROUND_HALF_UP);



    $invfuel = round(((100 * $endYear[2]) / $totalEndYear), 2, PHP_ROUND_HALF_UP);
    $invoil = (100 * $endYear[3]) / $totalEndYear;
    $invtiming = (100 * $endYear[4]) / $totalEndYear;
    $invinsurance = (100 * $endYear[5]) / $totalEndYear;
    $invpneu = (100 * $endYear[6]) / $totalEndYear;
    $invtechnical = (100 * $endYear[7]) / $totalEndYear;
}
