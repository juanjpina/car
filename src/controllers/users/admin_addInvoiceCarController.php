<?php

/**
 * Get of user car of the data base
 */

$data = array(
    ':id_user' => $_SESSION['auth']['id_user']
);
$sql = 'SELECT id_car FROM car where id_user = :id_user LIMIT 1';
$request = $db->prepare($sql);
$request->execute($data);
$result = $request->fetchAll(PDO::FETCH_ASSOC);
if (!$result) {
    header('Location: ' . $router->generate('addnewcar'));
} else {

    $id_car = $result[0]['id_car'];

    // dump('car', $result[0]['id_car']);




    /**
     * rellena el select
     */
    function getCar(PDO $db)
    {
        $data = array(
            ':id_user' => $_SESSION['auth']['id_user']
        );
        $sql = 'SELECT * FROM car where id_user = :id_user ';
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    $cars = getCar($db);

    /**
     * rellena el parrafo por defecto con el primeto de los coches
     */
    function getTrademark(PDO $db)
    {
        if (!empty($_POST['select']) || isset($_POST['select'])) {
            $data = array(
                ':id_car' => $_POST['select']
            );
            $sql = 'SELECT trademark FROM car where (id_car = :id_car) LIMIT 1,1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else {
            $data = array(
                ':id_user' => $_SESSION['auth']['id_user']
            );
            $sql = 'SELECT trademark FROM car where (id_user = :id_user) LIMIT 1,1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetch(PDO::FETCH_ASSOC);
            dump('trad', $result);
            return $result;
        }
    }
    $trademark = getTrademark($db);

    // function getGlobalCar(PDO $db)
    // {
    //     if (!empty($_POST['select'])) {
    //         $data = array(
    //             ':id_car' => $_POST['select']
    //         );
    //         $sql = 'SELECT  FROM car where id_car = :id_car LIMIT 1';
    //         $request = $db->prepare($sql);
    //         $request->execute($data);
    //         $result = $request->fetchAll(PDO::FETCH_ASSOC);
    //         foreach ($result as $re) {
    //             dump('re', $re['id_car']);
    //             return $re['id_car'];
    //         };
    //         // return $result;
    //     } else {
    //         $data = array(
    //             ':id_user' => $_SESSION['auth']['id_user']
    //         );
    //         $sql = 'SELECT * FROM car where id_user = :id_user LIMIT 1';
    //         $request = $db->prepare($sql);
    //         $request->execute($data);
    //         $result = $request->fetch(PDO::FETCH_ASSOC);
    //         dump('car', $result);

    //         foreach ($result as $re) {
    //             dump('re', $re['id_car']);
    //             return $re['id_car'];
    //         };

    //         // return $result;
    //     }
    // }

    // $global_car = getGlobalCar($db);




    // dump('global', $global_car);


    /**
     * Get the car data select.
     */
    function listType(PDO $db)
    {
        $sql      = 'SELECT * FROM type_data';
        $request = $db->prepare($sql);
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    $types = listType($db);


    /**
     * Get timing-belt of the data base
     */
    function dbTiming(PDO $db, $id_car)
    {
        if (!empty($_POST['select'])) {
            $data = array(
                ':id_car' => $_POST['select']
            );
            $sql = 'SELECT date, km FROM timingbelt where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            } else {
                return array(
                    [
                        'date' => '',
                        'km' => '0'
                    ]
                );
            }
        } else {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM timingbelt where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            dump('timi', $result);
            if ($result) {
                return $result;
            } else {
                return array(
                    [
                        'date' => '',
                        'km' => '0'
                    ]
                );
            }
        }
    }
    $timing = dbTiming($db, $id_car);

    /**
     * Get buy car of the data base
     */
    function dbBuy(PDO $db, $id_car)
    {
        if (!empty($global_car)) {
            dump('glo', $global_car);
            $data = array(
                ':id_car' => $global_car
            );
            $sql = 'SELECT * FROM buy where id_car = :id_car';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            } else {
                return   array(
                    [
                        'date' => '',
                        'km' => '0'
                    ]
                );
            }
        } else {
            // dump('se', $_POST['select']);
            // dump('as', $_SESSION['auth']['id_user']);
            $data = array(
                ':id_car' => $id_car //necesito id car 
            );
            $sql = 'SELECT * FROM buy where id_car = :id_car ';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            dump('x', $result);
            return $result;
        }
    }
    $buy = dbBuy($db, $id_car);
    // dump('buy', $buy);
    /**
     * Get firts registration of the base data
     */
    function dbFirst(PDO $db)
    {
        if (!empty($_POST['select'])) {
            $data = array(
                ':id_car' => $_POST['select']
            );
            $sql = 'SELECT * FROM firstregistration where id_car = :id_car';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            } else {
                return array(
                    [
                        'date' => '',
                        'km' => '000'
                    ]
                );
            }
        } else {
            return array(
                [
                    'date' => '',
                    'km' => '000'
                ]
            );
        }
    }
    $first = dbFirst($db);


    /**
     * Get technical control of the base data
     */
    function dbTechnical(PDO $db)
    {
        if (!empty($_POST['select'])) {
            $data = array(
                ':id_car' => $_POST['select']
            );
            $sql = 'SELECT * FROM technicalcontrol where id_car = :id_car';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            } else {
                return array(
                    [
                        'date' => '',
                        'km' => '000'
                    ]
                );
            }
        } else {
            return array(
                [
                    'date' => '',
                    'km' => '000'
                ]
            );
        }
    }
    $technical = dbTechnical($db);


    /**
     * Get oil changes of the data base
     */
    function dbOil(PDO $db)
    {
        if (!empty($_POST['select'])) {
            $data = array(
                ':id_car' => $_POST['select']
            );
            $sql = 'SELECT * FROM oilchanges where id_car = :id_car';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            } else {
                return array(
                    [
                        'date' => '',
                        'km' => '000'
                    ]
                );
            }
        } else {
            return array(
                [
                    'date' => '',
                    'km' => '000'
                ]
            );
        }
    }
    $oil = dbOil($db);





    /**
     * guarda en DB los datos del coche
     */
    function insert_DB(PDO $db, $id_car)
    {
        dump('globalcar', $id_car);
        // dump('select', $_POST['select']);
        if (!empty($_POST['km1']) && !empty($_POST['date1']) && !empty($id_car)) {
            // dump('date', $_POST['date1']);
            // dump('km', $_POST['km1']);

            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT * FROM buy where id_car = :id_car';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            // dump('id', $result['id_car']);
            if (!$result) {
                $sql = 'INSERT INTO buy (id_car, km, date) VALUES (:id_car, :km, :date)';
                $data = [
                    ':id_car' => $id_car,
                    ':km'  => $_POST['km1'],
                    ':date' => $_POST['date1'],
                ];
                $request = $db->prepare($sql);
                $request->execute($data);
            } else {
                $data = [
                    ':date'  => $_POST['date1'],
                    ':km' =>  $_POST['km1'],
                    ':id_car' => $id_car
                ];
                $sql = 'UPDATE buy SET date= :date, km= :km WHERE id_car= :id_car';

                $request = $db->prepare($sql);
                $result = $request->execute($data);
                // echo '<script> alert("ok") </script>';
            }
        }
    } //fin

    insert_DB($db, $id_car);




    function insert_xx(PDO $db, $date, $km, $dataBase)
    {
        dump("{$dataBase}");
        // dump('select', $_POST['select']);
        if (!empty($km) && !empty($date) && !empty($_POST['select'])) {
            // dump('date', $_POST['date1']);
            // dump('km', $_POST['km1']);

            $data = array(
                ':id_car' => $_POST['select']
            );
            $sql = 'SELECT * FROM "{$dataBase}" where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            // dump('id', $result['id_car']);
            if (!$result) {
                $sql = 'INSERT INTO "{$dataBase}" (id_car, km, date) VALUES (:id_car, :km, :date)';
                $data = [
                    ':id_car' => $_POST['select'],
                    ':km'  => $km,
                    ':date' => $date,
                ];
                $request = $db->prepare($sql);
                $request->execute($data);
            } else {
                $data = [
                    ':date'  => $date,
                    ':km' =>  $km,
                    ':id_car' => $_POST['select']
                ];
                $sql = 'UPDATE "{$dataBase}" SET (date= :date, km= :km) WHERE (id_car= :id_car)';

                $request = $db->prepare($sql);
                $result = $request->execute($data);
                // echo '<script> alert("ok") </script>';
            }
        }
    } //fin
    // insert_xx(PDO $db, $date, $km, $dataBase);
    // insert_xx($db, $_POST['date1'], $_POST['km1'], 'buy');
}
