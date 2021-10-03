<?php

if (!empty(getSessionCar($db, $router))) {
    $fuel =  getFuel($db, $_SESSION['car']['id_car'],  $router);
    if (!empty($_SESSION['car']['id_car']) && !empty($_POST['km'])) {

        $id_car = $_SESSION['car']['id_car'];
        try {
            $data = [
                ':id_car' => $id_car,
                ':km' => (int)$_POST['km'],
                ':date' =>  date('Y-m-d H:i:s'),
            ];
            $sql = "UPDATE fuel SET  km = :km, date= :date WHERE id_car = :id_car";
            $request = $db->prepare($sql);
            $request->execute($data);
            header('Location: ' . $router->generate('execution'));
            die();
        } catch (PDOException $e) {
            header('Location: ' . $router->generate('executionError'));
            die();
        }
        // header('Refresh:' . 0.2);
    };
}
