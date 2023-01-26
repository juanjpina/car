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
    if (isset($_SESSION['car']['id_car'])) {
        try {
            $data = [
                'id_car' => $_SESSION['car']['id_car'],
            ];
            $sql = "SELECT (DATE_ADD(MAX(invtechnical.date), INTERVAL 2 year)) as datetechnical FROM car, invtechnical WHERE invtechnical.id_car= :id_car AND curdate() <= DATE_ADD((invtechnical.date), INTERVAL 2 year)";
            // $sql = 'SELECT DATE_ADD(buyDate, INTERVAL 4 year) as datetechnical FROM car WHERE car.id_car = :id_car ORDER BY buyDate DESC LIMIT 1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $resultTechnical = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            if (isset($resultTechnical) && $resultTechnical[0]['datetechnical'] != null && !empty($resultTechnical)) {
                return $resultTechnical;
            } else {
                $sql = "SELECT DATE_ADD(car.firstdate, INTERVAL 4 year) as datetechnical FROM car WHERE curdate() <= DATE_ADD(car.firstdate, INTERVAL 4 year) AND car.id_car = :id_car";
                // $sql = 'SELECT DATE_ADD(date, INTERVAL 4 year) as datetechnical FROM invtechnical WHERE invtechnical.id_car = :id_car ORDER BY date DESC LIMIT 1';
                $request = $db->prepare($sql);
                $request->execute($data);
                $resultCar = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
                return $resultCar;
            }
        } catch (Exception $e) {
            header('Location: ' . $router->generate('executionError'));
            die();
        } finally {
            $sql = null;
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
    if (isset($_SESSION['car']['id_car'])) {
        try {
            $data = [
                'id_car' => $_SESSION['car']['id_car'],
            ];
            $sql = 'SELECT max(invoil.km)+setting.oilchanges as oil FROM invoil,setting WHERE invoil.id_car= :id_car AND setting.id_car = invoil.id_car ORDER by oil DESC limit 1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $resultOil = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            if (isset($resultOil) && $resultOil[0]['oil'] != null && !empty($resultOil)) {
                return $resultOil;
            } else {
                $data = [
                    'id_car' => $_SESSION['car']['id_car'],
                ];
                $sql = 'SELECT car.buykm+setting.oilchanges as oil FROM car,setting WHERE car.id_car=:id_car AND setting.id_car = car.id_car limit 1';
                $request = $db->prepare($sql);
                $request->execute($data);
                $result = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
                return $result;
            }
        } catch (PDOException $e) {
            header('Location: ' . $router->generate('executionError'));
            die();
        } catch (Exception $e) {
            header('Location: ' . $router->generate('executionError'));
            die();
        } finally {
            $sql = null;
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
    if (isset($_SESSION['car']['id_car'])) {
        try {
            $data = [
                'id_car' => $_SESSION['car']['id_car']
            ];
            $sql = 'SELECT invtiming.km+setting.timingbeltKm as km FROM invtiming, setting WHERE invtiming.id_car= :id_car AND setting.id_car= :id_car ORDER by km DESC limit 1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            if (isset($result) && !empty($result)) {
                return $result;
            } else {
                $sql = 'SELECT (car.buykm + setting.timingbeltKm) as km FROM car, setting WHERE car.id_car= :id_car AND setting.id_car=:id_car limit 1
            ';
                $request = $db->prepare($sql);
                $request->execute($data);
                $result = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
                return $result;
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
};
$getTimingKm = getTimingKm($db, $router);


/**
 *this function returns the date of the next distribution belt change
 *@param PDO
 *@return array 
 */
function getTimingDate(PDO $db, AltoRouter $router)
{
    if (isset($_SESSION['car']['id_car'])) {
        try {
            $data = [
                'id_car' => $_SESSION['car']['id_car'],
            ];
            $sql = "SELECT (DATE_ADD( MAX(invtiming.date), INTERVAL 4 YEAR)) as dates FROM invtiming, car, setting WHERE curdate() <= DATE_ADD( invtiming.date, INTERVAL (setting.timingbeltDate) YEAR)
            AND invtiming.id_car = :id_car AND setting.id_car = :id_car ORDER BY date DESC LIMIT 1";
            // $sql = 'SELECT DATE_ADD(date, INTERVAL 4 year) as datetechnical FROM invtechnical WHERE invtechnical.id_car = :id_car ORDER BY date DESC LIMIT 1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $resultTiming = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            if (isset($resultTiming) && !empty($resultTiming) && $resultTiming[0]['dates'] != null) {
                return $resultTiming;
            } else {
                $sql = "SELECT (DATE_ADD( (car.firstdate), INTERVAL (setting.timingbeltDate) YEAR)) as dates FROM car, setting WHERE curdate() <= DATE_ADD( car.firstdate, INTERVAL (setting.timingbeltDate) YEAR)
                AND car.id_car = :id_car AND setting.id_car = :id_car";
                // $sql = 'SELECT DATE_ADD(buyDate, INTERVAL 4 year) as datetechnical FROM car WHERE car.id_car = :id_car ORDER BY buyDate DESC LIMIT 1';
                $request = $db->prepare($sql);
                $request->execute($data);
                $resultCar = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
                if (isset($resultCar) && !empty($resultCar) && $resultCar[0]['dates'] != null) {
                    // dump('as2', $resultCar);
                    return $resultCar;
                } else {
                    $data = [
                        ['dates' => date('Y-m-d')]
                    ];
                    return $data;
                }
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
};
$getTimingDate = getTimingDate($db, $router);
