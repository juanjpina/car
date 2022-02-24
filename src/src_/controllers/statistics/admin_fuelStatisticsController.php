<?php

$id_car = getSessionCar($db, $router);


/**
 * calculates the fuel costs
 */
if (isset($id_car)) {
    $data = [
        ':id_car' => $_SESSION['car']['id_car'],
    ];
    try {
        $sql = "SELECT fuel.km, MAX(invfuel.km) AS totalkm, SUM(invfuel.total) AS totalcost FROM fuel, invfuel WHERE invfuel.id_car= :id_car AND fuel.id_car= :id_car AND fuel.km<=invfuel.km";

        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
    } catch (Exception $e) {
        header('Location: ' . $router->generate('executionError'));
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
    } finally {
        $sql = null;
    }

    if ($result) {
        $kmStart = (int)$result[0]['km'];
        $kmTotal = (int)$result[0]['totalkm'];
        $totalCost = (int)$result[0]['totalcost'];

        if ($kmStart === 0 || $kmTotal === 0 || $totalCost === 0) {
            $resultKm = 0;
            $resultCost = 0;
        } else {
            $resultKm = $kmTotal - $kmStart;
            $resultCost = round($resultKm / $totalCost, 2);
        };
    } else {
        // header('Location: ' . $router->generate('executionError'));
    }
};
