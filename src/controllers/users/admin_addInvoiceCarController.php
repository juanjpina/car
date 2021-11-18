<?php

$id_car = getSessionCar($db, $router);

/**
 * Get data car of the data base
 * @param PDO, id_car
 * @return array
 */
function getCars(PDO $db, $id_car, AltoRouter $router)
{
    if (isset($id_car)) {
        try {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT * FROM car where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            return $result;
        } catch (Exception $e) {
            header('Location:' . $router->generate('executionError'));
            die();
        } catch (PDOException $e) {
            header('Location:' . $router->generate('executionError'));
            die();
        } finally {
            $sql = null;
        }
    }
};
$getCars = getCars($db, $id_car, $router);


/**
 * modifies the data in the table car
 */
function updateCar(PDO $db, AltoRouter $router, $id_car)
{
    if (isset($_POST['ok'])) {
        try {
            if (isset($_POST['buydate'])) {
                $data = [
                    'id_car' => $id_car,
                    'buyDate' => $_POST['buydate'],
                ];
                $sql = 'UPDATE car SET buyDate=:buyDate WHERE id_car=:id_car';
                $request = $db->prepare($sql);
                $request->execute($data);
                $request->closeCursor();
            }
            if (isset($_POST['buykm'])) {
                $data = [
                    'id_car' => $id_car,
                    'buykm'  => (int) $_POST['buykm'],
                ];
                $sql = 'UPDATE car SET buykm=:buykm WHERE id_car=:id_car';
                $request = $db->prepare($sql);
                $request->execute($data);
                $request->closeCursor();
            }
            if (isset($_POST['firstdate'])) {
                $data = [
                    'id_car' => $id_car,
                    'firstDate'  => $_POST['firstdate'],
                ];
                $sql = 'UPDATE car SET firstDate = :firstDate WHERE id_car=:id_car';
                $request = $db->prepare($sql);
                $request->execute($data);
                $request->closeCursor();
            }
            if (isset($_POST['firstkm'])) {
                $data = [
                    'id_car' => $id_car,
                    'firstKm'  => (int) $_POST['firstkm'],
                ];
                $sql = 'UPDATE car SET firstKm= :firstKm WHERE id_car=:id_car';
                $request = $db->prepare($sql);
                $request->execute($data);
                $request->closeCursor();
            }
            header('Location: ' . $router->generate('execution'));
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
}
updateCar($db,  $router, $id_car);







// function insert_xx(PDO $db, $date, $km, $dataBase, $id_car)
// {
//     $data = [
//         ':date'  => $date,
//         ':km' =>  (int)$km,
//         ':id_car' => (int)$id_car
//     ];
//     $sql = "UPDATE car SET buyDate= :buyDate, buyKm= :buykm, firstDate= :firstDate, firstKm= :firstKm WHERE id_car= :id_car";
//     $request = $db->prepare($sql);
//     $result = $request->execute($data);
//     $request->closeCursor();
// }
