<?php

$id_car = getSessionCar($db, $router);



if (!empty($id_car)) {
    $data = [
        ':id_car' => $_SESSION['car']['id_car'],
    ];

    $sql = "SELECT fuel.km, MAX(invfuel.km) AS totalkm, SUM(invfuel.total) AS totalcost FROM fuel, invfuel WHERE invfuel.id_car= :id_car AND fuel.km<=invfuel.km;";

    $request = $db->prepare($sql);
    $request->execute($data);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    // dump($result);

    $kmStart = (int)$result[0]['km'];
    $kmTotal = (int)$result[0]['totalkm'];

    $totalCost = (int)$result[0]['totalcost'];

    $resultKm = $kmTotal - $kmStart;
    $resultCost = round($resultKm / $totalCost, 2);
}
