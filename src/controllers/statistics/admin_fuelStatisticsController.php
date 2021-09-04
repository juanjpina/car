<?php

if (!empty($_SESSION['car']['id_car'])) {
    $data = [
        ':id_car' => $_SESSION['car']['id_car'],
    ];

    $sql = "SELECT fuel.km, MAX(invfuel.km), SUM(invfuel.total) FROM fuel, invfuel WHERE invfuel.id_car= :id_car AND fuel.km<=invfuel.km;";

    $request = $db->prepare($sql);
    $request->execute($data);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    dump($result);
}
