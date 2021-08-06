<?php

/**
 * Get of user car of the data base
 */
dump($_SESSION['auth']['id_user']);
$data = array(
    ':id_user' => $_SESSION['auth']['id_user']
);
$sql = 'SELECT * FROM car where id_user = :id_user';
$request = $db->prepare($sql);
$request->execute($data);
$result = $request->fetchAll(PDO::FETCH_ASSOC);
if (!$result) {
    header('Location: ' . $router->generate('addnewcar'));
} else {
    // $cars = $result;
    // dump($cars);
    // $select;
    // if (!empty($_POST['select'])) {
    //     $select = $_POST['select'];
    // }

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
        // } else {
        //     $data = array(
        //         ':id_car' => $_POST['select']
        //     );
        //     $sql = 'SELECT trademark FROM car where id_car = :id_car LIMIT 1';
        //     $request = $db->prepare($sql);
        //     $request->execute($data);
        //     $result = $request->fetchAll(PDO::FETCH_ASSOC);
        //     return $result;
        // }

    }
    $cars = getCar($db);

    /**
     * rellena el parrafo por defecto con el primeto de los coches y despues con la eleccion
     */
    function getTrademark(PDO $db)
    {
        if (!empty($_POST['select'])) {
            $data = array(
                ':id_car' => $_POST['select']
            );
            $sql = 'SELECT * FROM car where id_car = :id_car LIMIT 1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);

            // $data = array(
            //     ':id_user' => $_SESSION['auth']['id_user']
            // );
            // $sql = 'SELECT * FROM car where id_user = :id_user LIMIT 1 ';
            // $request = $db->prepare($sql);
            // $request->execute($data);
            // $result = $request->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else {
            $data = array(
                ':id_user' => $_SESSION['auth']['id_user']
            );
            $sql = 'SELECT * FROM car where id_user = :id_user LIMIT 1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    $trademark = getTrademark($db);
    $global_car = getTrademark($db);
    $global_car = $global_car[0]['id_car'];

    dump('result', $result);

    dump('global', $global_car);


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
    function dbTiming(PDO $db)
    {

        if (!empty($_POST['select'])) {
            $data = array(
                ':id_car' => $_POST['select']
            );
            $sql = 'SELECT * FROM timingbelt where id_car = :id_car';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            } else {
                return   array(
                    [
                        'date' => '',
                        'km' => '000'
                    ]
                );
            }
        } else {
            return   array(
                [
                    'date' => '1970/02/01',
                    'km' => '000'
                ]
            );
        }
    }
    $timing = dbTiming($db);

    /**
     * Get buy car of the data base
     */
    function dbBuy(PDO $db, $global_car)
    {
        if (!empty($_POST['select'])) {
            $data = array(
                ':id_car' => $_POST['select']
            );
            $sql = 'SELECT * FROM buy where id_car = :id_car';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            return $result;

            // } else {
            //     return   array(
            //         [
            //             'date' => '',
            //             'km' => '000'
            //         ]
            //     );
            // }
        } else {
            // dump('se', $_POST['select']);
            // dump('as', $_SESSION['auth']['id_user']);
            $data = array(
                ':id_car' => $global_car //necesito id car 
            );
            $sql = 'SELECT * FROM buy where id_car = :id_car ';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            dump('x', $result);
            return $result;
        }
    }
    $buy = dbBuy($db, $global_car);

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
                return   array(
                    [
                        'date' => '',
                        'km' => '000'
                    ]
                );
            }
        } else {
            return   array(
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
                return   array(
                    [
                        'date' => '',
                        'km' => '000'
                    ]
                );
            }
        } else {
            return   array(
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
                return   array(
                    [
                        'date' => '',
                        'km' => '000'
                    ]
                );
            }
        } else {
            return   array(
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
    function insert_DB(PDO $db, $globalCar)
    {
        dump('globalcar', $globalCar);
        // dump('select', $_POST['select']);
        if (!empty($_POST['km1']) && !empty($_POST['date1']) && !empty($globalCar)) {
            // dump('date', $_POST['date1']);
            // dump('km', $_POST['km1']);

            $data = array(
                ':id_car' => $globalCar
            );
            $sql = 'SELECT * FROM buy where id_car = :id_car';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            // dump('id', $result['id_car']);
            if (!$result) {
                $sql = 'INSERT INTO buy (id_car, km, date) VALUES (:id_car, :km, :date)';
                $data = [
                    ':id_car' => $globalCar,
                    ':km'  => $_POST['km1'],
                    ':date' => $_POST['date1'],
                ];
                $request = $db->prepare($sql);
                $request->execute($data);
            } else {
                $data = [
                    ':date'  => $_POST['date1'],
                    ':km' =>  $_POST['km1'],
                    ':id_car' => $globalCar
                ];
                $sql = 'UPDATE buy SET date= :date, km= :km WHERE id_car= :id_car';

                $request = $db->prepare($sql);
                $result = $request->execute($data);
                // echo '<script> alert("ok") </script>';
            }
        }
    } //fin

    insert_DB($db, $globalCar);




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
