<?php
$id_car;
$data = array(
    ':id_user' => $_SESSION['auth']['id_user']
);
$sql = 'SELECT id_car FROM car where id_user = :id_user LIMIT 1';
$request = $db->prepare($sql);
$request->execute($data);
$result = $request->fetchAll(PDO::FETCH_ASSOC);
if (!$result) {
    header('Location: ' . $router->generate('addnewcar'));
} else {
    $id_car = $result[0]['id_car'];
    if (!empty($_POST['select'])) {
        $id_car = $_POST['select'];
    }
    //functions ------------------------
    $cars = getCar($db);
    $trademark = getTrademark($db);
    $setting = dbSelect($db, $id_car, "setting");

    /**
     * in:$_POST['dateTiming'], $_POST['kmTiming'], $_POST['kmOil'], 'setting', $id_car
     * 
     * return: update data base.
     * 
     */
    function dbUpdate(PDO $db, $dateTiming, $kmTiming, $kmOil, $dataBase, $id_car)
    {
        $data = [
            ':timingbeltDate'  => (int)$dateTiming,
            ':timingbeltKm' =>  (int)$kmTiming,
            ':oilchanges' =>  (int)$kmOil,
            ':id_car' => (int)$id_car
        ];
        $sql = "UPDATE $dataBase SET timingbeltDate= :timingbeltDate, timingbeltKm= :timingbeltKm, oilchanges = :oilchanges
          WHERE id_car= :id_car";
        $request = $db->prepare($sql);
        $result = $request->execute($data);
        // echo '<script> alert("ok") </script>';
    } //fin
    if (!empty($_POST['dateTiming']) && !empty($_POST['kmTiming']) && !empty($_POST['kmOil'])) {
        dbUpdate($db, $_POST['dateTiming'], $_POST['kmTiming'], $_POST['kmOil'], 'setting', $id_car);
    }
}
