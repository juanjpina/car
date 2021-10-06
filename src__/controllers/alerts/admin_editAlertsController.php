<?php

/**
 * there is a car session?
 */

$id_car = getSessionCar($db, $router);

/**
 * this function returns the date of the next technical control
 * @param PDO
 * @return array
 * 
 */
function getControl(PDO $db, AltoRouter $router)
{
    if (!empty($_SESSION['car']['id_car'])) {




        $data = [
            'id_car' => $_SESSION['car']['id_car'],
        ];
        $sql = 'SELECT DATE_ADD(date, INTERVAL 4 year) as datetechnical FROM invtechnical WHERE invtechnical.id_car = :id_car ORDER BY date DESC LIMIT 1';
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        if ($result) {
            return $result;
        } else {
            $data = [
                'id_car' => $_SESSION['car']['id_car'],
            ];
            $sql = 'SELECT DATE_ADD(buyDate, INTERVAL 4 year) as datetechnical FROM car WHERE car.id_car = :id_car ORDER BY buyDate DESC LIMIT 1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            if ($result) {
                return $result;
            } else {
                header('Location: ' . $router->generate('executionError'));
            }
        }
    };
};
$getControl = getControl($db, $router);


/**
 * this function returns the mileage of the next oil change.
 * @param PDO
 * @return array
 */
function getOil(PDO $db, AltoRouter $router)
{
    if (!empty($_SESSION['car']['id_car'])) {
        $data = [
            'id_car' => $_SESSION['car']['id_car'],
        ];
        $sql = 'SELECT invoil.km+setting.oilchanges as oil FROM invoil,setting WHERE invoil.id_car= :id_car ORDER by date DESC limit 1';
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        if ($result) {
            return $result;
        } else {
            $data = [
                'id_car' => $_SESSION['car']['id_car'],
            ];
            $sql = 'SELECT car.buyKm+setting.oilchanges as oil FROM car,setting WHERE car.id_car= :id_car limit 1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            if ($result) {
                return $result;
            } else {
                // header('Location: ' . $router->generate('executionError'));
            }
        }
    }
};
$getOil = getOil($db, $router);

/**
 * this function returns the mileage of the next distribution belt change
 * @param PDO
 * @return array
 */
function getTimingKm(PDO $db, AltoRouter $router)
{
    if (!empty($_SESSION['car']['id_car'])) {
        $data = [
            'id_car' => $_SESSION['car']['id_car']
        ];
        $sql = 'SELECT invtiming.km+setting.timingbeltKm as km FROM invtiming, setting WHERE invtiming.id_car= :id_car ORDER by date DESC limit 1
';

        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        if ($result) {
            return $result;
        } else {
            $data = [
                'id_car' => $_SESSION['car']['id_car']
            ];
            $sql = 'SELECT car.buykm+setting.timingbeltKm as km FROM car, setting WHERE car.id_car= :id_car limit 1
';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            if ($result) {
                return $result;
            } else {
                // header('Location: ' . $router->generate('executionError'));
            }
        }
    }
};
$getTimingKm = getTimingKm($db, $router);

/**
 *this function returns the date of the next distribution belt change
 *@param PDO
 *@return array 
 */
function getTimingDate(PDO $db, AltoRouter $router)
{
    if (!empty($_SESSION['car']['id_car'])) {
        $data = [
            'id_car' => $_SESSION['car']['id_car']
        ];
        $sql = 'SELECT DATE_ADD(date, INTERVAL setting.timingbeltDate year) as dates FROM invtiming, setting WHERE invtiming.id_car = :id_car ORDER BY date DESC LIMIT 1
';
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        if ($result) {
            return $result;
        } else {
            $data = [
                'id_car' => $_SESSION['car']['id_car']
            ];
            $sql = 'SELECT DATE_ADD(buyDate, INTERVAL setting.timingbeltDate year) as dates FROM car, setting WHERE car.id_car = :id_car ORDER BY buyDate DESC LIMIT 1
';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            if ($result) {
                return $result;
            } else {
                // header('Location: ' . $router->generate('executionError'));
            }
        }
    }
};
$getTimingDate = getTimingDate($db, $router);
