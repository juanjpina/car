<?php

/**
 * Get of user car of the data base
 */
$id_car = $_SESSION['car']['id_car'];
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

    if (!empty($id_car)) {

        $id_car = $id_car;
    }


    // dump('id-car', $id_car);

    /**
     * rellena el select
     */
    // function getCar(PDO $db)
    // {
    //     $data = array(
    //         ':id_user' => $_SESSION['auth']['id_user']
    //     );
    //     $sql = 'SELECT * FROM car where id_user = :id_user ';
    //     $request = $db->prepare($sql);
    //     $request->execute($data);
    //     $result = $request->fetchAll(PDO::FETCH_ASSOC);
    //     return $result;
    // }
    $cars = getCar($db);

    /**
     * rellena el parrafo por defecto con el primeto de los coches
     */
    // function getTrademark(PDO $db)
    // {
    //     if (!empty($_POST['select'])) {
    //         $data = array(
    //             ':id_car' => $_POST['select']
    //         );
    //         $sql = 'SELECT trademark FROM car where id_car = :id_car';
    //         $request = $db->prepare($sql);
    //         $request->execute($data);
    //         $result = $request->fetchAll(PDO::FETCH_ASSOC);
    //         // dump('trad', $result);
    //         return $result;
    //     } else {
    //         // dump($_SESSION['auth']['id_user']);
    //         $data = array(
    //             ':id_user' => $_SESSION['auth']['id_user']
    //         );
    //         $sql = 'SELECT trademark FROM car where id_user = :id_user';
    //         $request = $db->prepare($sql);
    //         $request->execute($data);
    //         $result = $request->fetchAll(PDO::FETCH_ASSOC);
    //         // dump('trad', $result);
    //         return $result;
    //     }
    // }
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
    // function listType(PDO $db)
    // {
    //     $sql      = 'SELECT * FROM type_data';
    //     $request = $db->prepare($sql);
    //     $request->execute();
    //     $result = $request->fetchAll(PDO::FETCH_ASSOC);
    //     return $result;
    // }
    $types = getSelect($db, 'type_data');


    /**
     * Get timing-belt of the data base
     */
    function dbTiming(PDO $db, $id_car)
    {
        if (!empty($_POST['select'])) {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM timingbelt where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            }
        } else {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM timingbelt where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            // dump('timi', $result);
            if ($result) {
                return $result;
            }
        }
    }
    $timing = dbTiming($db, $id_car);

    /**
     * Get buy car of the data base
     */
    function dbBuy(PDO $db, $id_car)
    {
        if (!empty($_POST['select'])) {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM buy where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            }
        } else {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM buy where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            // dump('timi', $result);
            if ($result) {
                return $result;
            }
        }
    }
    // function dbBuy(PDO $db, $id_car)
    // {
    //     if (!empty($global_car)) {
    //         dump('glo', $global_car);
    //         $data = array(
    //             ':id_car' => $global_car
    //         );
    //         $sql = 'SELECT * FROM buy where id_car = :id_car';
    //         $request = $db->prepare($sql);
    //         $request->execute($data);
    //         $result = $request->fetchAll(PDO::FETCH_ASSOC);
    //         if ($result) {
    //             return $result;
    //         } else {
    //             return   array(
    //                 [
    //                     'date' => '',
    //                     'km' => '0'
    //                 ]
    //             );
    //         }
    //     } else {
    //         // dump('se', $_POST['select']);
    //         // dump('as', $_SESSION['auth']['id_user']);
    //         $data = array(
    //             ':id_car' => $id_car //necesito id car 
    //         );
    //         $sql = 'SELECT * FROM buy where id_car = :id_car ';
    //         $request = $db->prepare($sql);
    //         $request->execute($data);
    //         $result = $request->fetchAll(PDO::FETCH_ASSOC);
    //         // dump('x', $result);
    //         return $result;
    //     }
    // }
    $buy = dbBuy($db, $id_car);
    // dump('buy', $buy);
    /**
     * Get firts registration of the base data
     */
    function dbFirst(PDO $db, $id_car)
    {
        if (!empty($_POST['select'])) {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM firstregistration where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            }
        } else {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM firstregistration where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            // dump('timi', $result);
            if ($result) {
                return $result;
            }
        }
    }
    $first = dbFirst($db, $id_car);


    /**
     * Get technical control of the base data
     */
    function dbTechnical(PDO $db, $id_car)
    {
        if (!empty($_POST['select'])) {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM technicalcontrol where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            }
        } else {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM technicalcontrol where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            // dump('timi', $result);
            if ($result) {
                return $result;
            }
        }
    }
    $technical = dbTechnical($db, $id_car);


    /**
     * Get oil changes of the data base
     */
    function dbOil(PDO $db, $id_car)
    {
        if (!empty($id_car)) {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM oilchanges where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            }
        } else {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM oilchanges where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            // dump('timi', $result);
            if ($result) {
                return $result;
            }
        }
    }
    $oil = dbOil($db, $id_car);





    /**
     * guarda en DB los datos del coche
     */
    // function insert_DB(PDO $db, $id_car, $database)
    // {
    //     // dump($id_car);
    //     if (!empty($_POST['km1']) && !empty($_POST['date1'])) {




    //         $data = [

    //             ':date'  => $_POST['date1'],
    //             ':km' =>  (int)$_POST['km1'],
    //             ':id_car' =>  (int)$id_car
    //         ];

    //         $sql = "UPDATE $database SET date= :date, km= :km WHERE id_car= :id_car";

    //         $request = $db->prepare($sql);
    //         $result = $request->execute($data);
    //         // echo '<script> alert("ok") </script>';

    //     }
    // } //fin

    // insert_DB($db, $id_car, 'buy');




    function insert_xx(PDO $db, $date, $km, $dataBase, $id_car)
    {
        // dump((int)$id_car);
        $data = [
            ':date'  => $date,
            ':km' =>  (int)$km,
            ':id_car' => (int)$id_car
        ];
        $sql = "UPDATE $dataBase SET date= :date, km= :km WHERE id_car= :id_car";
        $request = $db->prepare($sql);
        $result = $request->execute($data);
        // echo '<script> alert("ok") </script>';
    } //fin
    if (!empty($_POST['date1']) && !empty($_POST['km1'])) {
        insert_xx($db, $_POST['date1'], $_POST['km1'], 'buy', $id_car);
    }
    if (!empty($_POST['date2']) && !empty($_POST['km2'])) {
        insert_xx($db, $_POST['date2'], $_POST['km2'], 'oilchanges', $id_car);
    }
    if (!empty($_POST['date3']) && !empty($_POST['km3'])) {
        insert_xx($db, $_POST['date3'], $_POST['km3'], 'timingbelt', $id_car);
    }
    if (!empty($_POST['date4']) && !empty($_POST['km4'])) {
        insert_xx($db, $_POST['date4'], $_POST['km4'], 'technicalcontrol', $id_car);
    }
    if (!empty($_POST['date5']) && !empty($_POST['km5'])) {
        insert_xx($db, $_POST['date5'], $_POST['km5'], 'firstregistration', $id_car);
    }
}
