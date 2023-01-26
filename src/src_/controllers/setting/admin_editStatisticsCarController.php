<?php

$id_car = getSessionCar($db, $router);
if (isset($id_car)) {
    //recovers the data from the setting table 
    $setting = dbSelect($db, $id_car, "setting");

    /**
     * modifies the data in the setting table
     * @param string
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
            $request->closeCursor();
            header('Location: ' . $router->generate('executionPseudo'));
            die();
        } catch (PDOException $e) {
            header('Location: ' . $router->generate('executionError'));
            die();
        } catch (PDOException $e) {
            header('Location: ' . $router->generate('executionError'));
            die();
        } finally {
            $sql = null;
        }
    } //fin

}

if (isset($_POST['dateTiming']) && isset($_POST['kmTiming']) && isset($_POST['kmOil'])) {
    dbUpdate($db, $_POST['dateTiming'], $_POST['kmTiming'], $_POST['kmOil'], 'setting', $id_car, $router);

}
