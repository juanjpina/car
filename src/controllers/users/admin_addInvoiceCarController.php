<?php

$id_car = getSessionCar($db, $router);

/**
 * Get data car of the data base
 * @param PDO, id_car
 * @return array
 */
function getCars(PDO $db, $id_car, AltoRouter $router)
{
    if (!empty($id_car)) {
        try {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT * FROM car where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            header('Location:' . $router->generate('executionError'));
        }
    }
};
$getCars = getCars($db, $id_car, $router);


/**
 * modifies the data in the table car
 */
function updateCar(PDO $db, AltoRouter $router, $id_car)
{
    if (!empty($_POST['ok'])) {
        try {
            if (!empty($_POST['buydate'])) {

                $data = [
                    'id_car' => $id_car,
                    'buyDate' => $_POST['buydate'],
                ];
                $sql = 'UPDATE car SET buyDate=:buyDate WHERE id_car=:id_car';
                $request = $db->prepare($sql);
                $result = $request->execute($data);
            }
            if (!empty($_POST['buykm'])) {
                $data = [
                    'id_car' => $id_car,
                    'buykm'  => $_POST['buykm'],
                ];
                $sql = 'UPDATE car SET buykm=:buykm WHERE id_car=:id_car';
                $request = $db->prepare($sql);
                $result = $request->execute($data);
            }
            if (!empty($_POST['firstdate'])) {
                $data = [
                    'id_car' => $id_car,
                    'firstdate'  => $_POST['firstdate'],
                ];
                $sql = 'UPDATE car SET firstDate=:firstdate WHERE id_car=:id_car';
                $request = $db->prepare($sql);
                $result = $request->execute($data);
            }
            if (!empty($_POST['firstkm'])) {
                $data = [
                    'id_car' => $id_car,
                    'firstkm'  => $_POST['firstkm'],
                ];
                $sql = 'UPDATE car SET firstKm=:firstkm WHERE id_car=:id_car';
                $request = $db->prepare($sql);
                $result = $request->execute($data);
            }
            header('Location: ' . $router->generate('execution'));
        } catch (Exception $e) {
            header('Location: ' . $router->generate('executionError'));
        }
    }
}
updateCar($db,  $router, $id_car);







function insert_xx(PDO $db, $date, $km, $dataBase, $id_car)
{
    $data = [
        ':date'  => $date,
        ':km' =>  (int)$km,
        ':id_car' => (int)$id_car
    ];
    $sql = "UPDATE car SET buyDate= :buyDate, buyKm= :buykm, firstDate= :firstDate, firstKm= :firstKm WHERE id_car= :id_car";
    $request = $db->prepare($sql);
    $result = $request->execute($data);
}
