<?php

$id_car = getSessionCar($db, $router);

if (isset($id_car)) {


    /**
     * Get timing-belt of the data base
     */
    function dbTiming(PDO $db, $id_car, AltoRouter $router)
    {
        try {
            $data = [
                ':id_car' => $id_car
            ];
            $sql = 'SELECT date, km FROM invtiming where (id_car = :id_car) ORDER by date DESC LIMIT 1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            if ($result) {
                return $result;
            } else {
                $data = [
                    ':id_car' => $id_car
                ];
                $sql = 'SELECT buyDate as date, buykm as km  FROM car where (id_car = :id_car)';
                $request = $db->prepare($sql);
                $request->execute($data);
                $result = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
                if ($result) {
                    return $result;
                } else {
                    header('Location: ' . $router->generate('executionError'));
                    die();
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
    $timing = dbTiming($db, $id_car, $router);


    /**
     * Get technical control of the base data
     */
    function dbTechnical(PDO $db, $id_car, AltoRouter $router)
    {
        if (isset($id_car)) {
            try {
                $data = array(
                    ':id_car' => $id_car
                );
                $sql = 'SELECT date, km FROM invtechnical where (id_car = :id_car) ORDER BY date DESC LIMIT 1 ';
                $request = $db->prepare($sql);
                $request->execute($data);
                $result = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
                if ($result) {
                    return $result;
                } else {
                    $sql = 'SELECT buyDate as date, buykm as km FROM car where (id_car = :id_car) ';
                    $request = $db->prepare($sql);
                    $request->execute($data);
                    $result = $request->fetchAll(PDO::FETCH_ASSOC);
                    $request->closeCursor();
                    if ($result) {
                        return $result;
                    } else {
                        header('Location: ' . $router->generate('executionError'));
                        die();
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
    }
    $technical = dbTechnical($db, $id_car, $router);


    /**
     * Get oil changes of the data base
     */
    function dbOil(PDO $db, $id_car, AltoRouter $router)
    {
        if (isset($id_car)) {
            try {
                $data = array(
                    ':id_car' => $id_car
                );
                $sql = 'SELECT date, km FROM invoil where (id_car = :id_car) ORDER by date DESC LIMIT 1';
                $request = $db->prepare($sql);
                $request->execute($data);
                $result = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
                if ($result) {
                    return $result;
                } else {
                    $sql = 'SELECT buyDate as date, buykm as km FROM car where (id_car = :id_car) ';
                    $request = $db->prepare($sql);
                    $request->execute($data);
                    $result = $request->fetchAll(PDO::FETCH_ASSOC);
                    $request->closeCursor();
                    if ($result) {
                        return $result;
                    } else {
                        header('Location: ' . $router->generate('executionError'));
                        die();
                    }
                    // return ([
                    //     'date' => '2021-01-01',
                    //     'km' => '0'
                    // ]);
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
    }
    $oil = dbOil($db, $id_car, $router);
}
