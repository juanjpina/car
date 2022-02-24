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
 * sum of totals per month and year
 * @param string
 * @return array
 */
function total(PDO $db, $startYear, $totales, $invoice, Altorouter $router)
{
    $as = 0;
    try {
        for ($j = 1; $j <= 7; $j++) {
            $data = [
                'id_car' => $_GET['car'],
                'startYear' => $startYear
            ];
            $sql = "SELECT sum(total) as total FROM $invoice[$j] WHERE id_car = :id_car
    and year(date)= :startYear";
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            $totales[$j] = (int)$result[0]['total'];
        }
    } catch (Exception $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } finally {
        $sql = null;
    }
    return $totales;
}

if (isset($_GET['car']) && isset($_GET['endYear']) && isset($_GET['startYear'])) {

    $endYear = total($db, $_GET['endYear'], $totales, $invoice, $router);
    $startYear = total($db, $_GET['startYear'], $totales, $invoice, $router);
    $totalEndYear = (array_sum($endYear));
    $totalStartYear = (array_sum($endYear));
    $endY = $_GET['endYear'];
    $startY = $_GET['startYear'];

    $invtollEnd = $endYear[1];
    $invfuelEnd = $endYear[2];;
    $invoilEnd = $endYear[3];;
    $invtimingEnd = $endYear[4];;
    $invinsuranceEnd = $endYear[5];
    $invpneuEnd = $endYear[6];
    $invtechnicalEnd = $endYear[7];

    $invtollStart =  $startYear[1];
    $invfuelStart = $startYear[2];
    $invoilStart = $startYear[3];
    $invtimingStart = $startYear[4];
    $invinsuranceStart = $startYear[5];
    $invpneuStart = $startYear[6];
    $invtechnicalStart = $startYear[7];
}
