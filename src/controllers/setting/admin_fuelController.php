<?php

if (!empty(getSessionCar($db, $router))) {
    $fuel =  getFuel($db, $_SESSION['car']['id_car'],  $router);
    if (isset($_SESSION['car']['id_car']) && isset($_POST['km'])) {

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
        // header('Refresh:' . 0.2);
    };
}
