<?php

/**
 * a new car is created in the database
 */
if (isset($_POST['trademark']) && !empty($_POST['trademark'])) {

    $data = [
        ':id_user' => $_SESSION['auth']['id_user'],
        ':trademark' => $_POST['trademark'],
        ':buyDate' => date('Y-m-d H:i:s'),
        ':buyKm' => '0',
        ':firstDate' => date('Y-m-d H:i:s'),
        ':firstKm' => '0'
    ];

    try {
        $sql = 'INSERT INTO car (id_user, trademark, buyDate, buyKm, firstDate, firstKm ) VALUES (:id_user, :trademark, :buyDate, :buyKm, :firstDate, :firstKm)';
        $request1 = $db->prepare($sql);
        $result1 = $request1->execute($data);
        $request1->closeCursor();

        /**
         * retourne l’identifiant de la nouvelle voiture créée de la table
         */
        $data = array(
            ':id_user' => $_SESSION['auth']['id_user']
        );
        $sql = 'SELECT id_car FROM car where id_user = :id_user';
        $request2 = $db->prepare($sql);
        $request2->execute($data);
        $result2 = $request2->fetchAll(PDO::FETCH_ASSOC);
        $request2->closeCursor();
        for ($i = count($result2) - 1; $i < count($result2); $i++) {
            $id_car = $result2[$i]['id_car'];
        }

        $data = [
            ':id_car' => (int)$id_car
        ];
        $sql = 'INSERT INTO setting (id_car, oilchanges, timingbeltDate, timingbeltKm) VALUES (:id_car, 15000 , 4,  80000)';
        $request = $db->prepare($sql);
        $result = $request->execute($data);
        $request->closeCursor();

        $data = [
            ':id_car' => (int)$id_car,
            ':date' => date('Y-m-d H:i:s')
        ];
        $sql = 'INSERT INTO fuel (id_car, km, date) VALUES (:id_car, 0, :date)';
        $request = $db->prepare($sql);
        $result = $request->execute($data);



        /**
         * a car session is created
         */
        $result = getLastCar($db);
        $_SESSION['car'] = [
            'id_car' => (int)$result[0]['id_car'],
            'trademark' => $result[0]['trademark'],
        ];
        header('Location: ' . $router->generate('executionCar'));
        die();
    } catch (Exception $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } finally {
        $sql = null;
    }
}
