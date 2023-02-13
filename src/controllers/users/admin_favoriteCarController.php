<?php
$id_car = getSessionCar($db, $router);

if (isset($id_car)) {
    $car = getCarSelect($db, $router);
    if (isset($_POST['ok'])) {
        verification($db, $router);
    }
}


/**
 * checks if there is a record in the database
 * @param
 * @return
 */
function verification(PDO $db, AltoRouter $router)
{
    try {
        $data = array(
            ':id_user' => $_SESSION['auth']['id_user']
        );
        $sql = 'SELECT id_user FROM favorite where id_user = :id_user LIMIT 1';
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        if ($result[0]['id_user'] == $_SESSION['auth']['id_user']) {
            modifyFavorite($db, $router);
        } else {
            insertFavorite($db, $router);
        }
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


/**
 * Modify the database, for a favorite car 
 * @param
 * @return
 * 
 */
function modifyFavorite(PDO $db, AltoRouter $router)
{
    try {

        $data = [
            ':id_user' => $_SESSION['auth']['id_user'],
            ':id_car' => $_POST['car']
        ];
        $sql = "UPDATE favorite SET id_car=:id_car WHERE id_user= :id_user";
        $request = $db->prepare($sql);
        $result = $request->execute($data);
        $request->closeCursor();
        newSesion($db, $router);
        if ($result) {
            header('Location: ' . $router->generate('executionModified'));
        } else {
            header('Location: ' . $router->generate('executionError'));
        }
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

/**
 * 
 * @param
 * @return
 */
function insertFavorite(PDO $db, AltoRouter $router)
{

    try {
        $data = [
            ':id_car' => $_POST['car'],
            ':id_user' => $_SESSION['auth']['id_user'],
        ];
        $sql = "INSERT INTO favorite (id_car, id_user) VALUES (:id_car, :id_user)";
        $request = $db->prepare($sql);
        $result = $request->execute($data);
        $request->closeCursor();
        newSesion($db, $router);
        // header('Location: ' . $router->generate('executionInvoice'));
        // die();
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } finally {
        $sql = null;
    }
}


/**
 * 
 * new car session.
 */
function newSesion(PDO $db, AltoRouter $router)
{
    $datas = getCarId($db, $_POST['car'], 'car', $router);
    $_SESSION['car'] = [
        'id_car' => $datas[0]['id_car'],
        'trademark' => $datas[0]['trademark'],
    ];
}

/**
 * voiture favorite.
 */
$trademark =  (returnFavorite($db));
