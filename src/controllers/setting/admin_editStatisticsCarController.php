<?php

$id_car = getSessionCar($db, $router);
if (!empty($id_car)) {
    $setting = dbSelect($db, $id_car, "setting");

    /**
     * in:$_POST['dateTiming'], $_POST['kmTiming'], $_POST['kmOil'], 'setting', $id_car
     * 
     * return: update data base.
     * 
     */
    function dbUpdate(PDO $db, $dateTiming, $kmTiming, $kmOil, $dataBase, $id_car, AltoRouter $router)
    {
        try {
            $data = [
                ':timingbeltDate'  => (int)$dateTiming,
                ':timingbeltKm' =>  (int)$kmTiming,
                ':oilchanges' =>  (int)$kmOil,
                ':id_car' => (int)$id_car
            ];
            $sql = "UPDATE $dataBase SET timingbeltDate= :timingbeltDate, timingbeltKm= :timingbeltKm, oilchanges = :oilchanges
          WHERE id_car= :id_car";
            $request = $db->prepare($sql);
            $request->execute($data);
            header('Location: ' . $router->generate('execution'));
        } catch (PDOException $e) {
            header('Location: ' . $router->generate('executionError'));
        }
    } //fin

}

if (!empty($_POST['dateTiming']) && !empty($_POST['kmTiming']) && !empty($_POST['kmOil'])) {
    dbUpdate($db, $_POST['dateTiming'], $_POST['kmTiming'], $_POST['kmOil'], 'setting', $id_car, $router);
    // header("Refresh: 0.2");
}
