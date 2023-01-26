<?php

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
function total(PDO $db, $totales, $invoice, AltoRouter $router)
{
    $as = 0;
    try {
        for ($j = 1; $j <= 7; $j++) {
            for ($i = 1; $i <= 12; $i++) {
                $data = [
                    'id_car' => $_GET['car'],
                    'yea' => $_GET['year']
                ];

                $sql = "SELECT sum(total) as total FROM $invoice[$j] WHERE id_car = :id_car
    and month(date) = $i and year(date)= :yea";
                $request = $db->prepare($sql);
                $request->execute($data);
                $result = $request->fetchAll(PDO::FETCH_ASSOC);
                $as += (int)$result[0]['total'];
                $totales[$i] += (int)$result[0]['total'];
                $request->closeCursor();
            }
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

$totales = total($db, $totales, $invoice, $router);
