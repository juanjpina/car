<?php


/**
 * returns a list of cars
 */
$cars = getCarSelect($db, $router);

/**
 *creates a car session with the new car selection
 * 
 */
if (isset($_POST['cars-ok'])) {
    $car = $_POST['car'];
    $listCar = getCarId($db, $car, 'car', $router);
    $_SESSION['car'] = [
        'id_car' => $car,
        'trademark' => $listCar[0]['trademark'],
    ];
    header('Location: ' . $router->generate('editalerts'));
    die();
};


/**
 * returns the id of the car
 * @return id_car
 */
function favoriteSelect(PDO $db, AltoRouter $router)
{
    $result = [];
    try {
        $data = array(
            ':id_user' => $_SESSION['auth']['id_user']
        );
        $sql = "SELECT id_car FROM favorite where id_user=:id_user";
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        // dump($result);
        if (empty($result)) {
            $result[0]['id_car']['null'];
        } else {
            $result[0]['id_car'];
        }

        return $result;
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
    } finally {
        $sql = null;
    }
}


$id_car = favoriteSelect($db, $router);

/**
 * voiture favorite.
 */
$trademark =  (returnFavorite($db));
