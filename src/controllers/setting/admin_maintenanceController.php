<?php

/**
 * Get of user car of the data base
 */

// $data = array(
//     ':id_user' => $_SESSION['auth']['id_user']
// );
// // dump($data);
// $sql = 'SELECT id_car FROM car where id_user = :id_user';
// $request = $db->prepare($sql);
// $request->execute($data);
// $result = $request->fetchAll(PDO::FETCH_ASSOC);

if (!isset($_SESSION['car']['id_car'])) {
    header('Location: ' . $router->generate('addnewcar'));
} else {
    $id_car = $_SESSION['car']['id_car'];

    $types = getSelect($db, 'type_data');


    /**
     * Get timing-belt of the data base
     */
    function dbTiming(PDO $db, $id_car)
    {
        $data = array(
            ':id_car' => $id_car
        );
        $sql = 'SELECT date, km FROM timingbelt where (id_car = :id_car) ORDER by date DESC LIMIT 1';
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        // if ($result) {
        return $result;
        // }
        // } else {
        //     $data = array(
        //         ':id_car' => $id_car
        //     );
        //     $sql = 'SELECT date, km FROM timingbelt where (id_car = :id_car)';
        //     $request = $db->prepare($sql);
        //     $request->execute($data);
        //     $result = $request->fetchAll(PDO::FETCH_ASSOC);
        //     if ($result) {
        //         return $result;
        //     }

    }
    $timing = dbTiming($db, $id_car);
    /**
     * Get buy car of the data base
     */
    // function dbBuy(PDO $db, $id_car)
    // {
    //     if (!empty($id_car)) {
    //         $data = array(
    //             ':id_car' => $id_car
    //         );
    //         $sql = 'SELECT date, km FROM buy where (id_car = :id_car)';
    //         $request = $db->prepare($sql);
    //         $request->execute($data);
    //         $result = $request->fetchAll(PDO::FETCH_ASSOC);
    //         if ($result) {
    //             return $result;
    //         }
    //     } else {
    //         $data = array(
    //             ':id_car' => $id_car
    //         );
    //         $sql = 'SELECT date, km FROM buy where (id_car = :id_car)';
    //         $request = $db->prepare($sql);
    //         $request->execute($data);
    //         $result = $request->fetchAll(PDO::FETCH_ASSOC);
    //         if ($result) {
    //             return $result;
    //         }
    //     }
    // }
    // $buy = dbBuy($db, $id_car);

    // dump('buy', $buy);
    /**
     * Get firts registration of the base data
     */
    // function dbFirst(PDO $db, $id_car)
    // {
    //     if (!empty($id_car)) {
    //         $data = array(
    //             ':id_car' => $id_car
    //         );
    //         $sql = 'SELECT date, km FROM firstregistration where (id_car = :id_car)';
    //         $request = $db->prepare($sql);
    //         $request->execute($data);
    //         $result = $request->fetchAll(PDO::FETCH_ASSOC);
    //         if ($result) {
    //             return $result;
    //         }
    //     } else {
    //         $data = array(
    //             ':id_car' => $id_car
    //         );
    //         $sql = 'SELECT date, km FROM firstregistration where (id_car = :id_car)';
    //         $request = $db->prepare($sql);
    //         $request->execute($data);
    //         $result = $request->fetchAll(PDO::FETCH_ASSOC);
    //         if ($result) {
    //             return $result;
    //         }
    //     }
    // }
    // $first = dbFirst($db, $id_car);


    /**
     * Get technical control of the base data
     */
    function dbTechnical(PDO $db, $id_car)
    {
        if (!empty($id_car)) {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM technicalcontrol where (id_car = :id_car) ORDER by date DESC LIMIT 1 ';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            }
            // } else {
            //     $data = array(
            //         ':id_car' => $id_car
            //     );
            //     $sql = 'SELECT date, km FROM technicalcontrol where (id_car = :id_car) ORDER by date DESC LIMIT 1';
            //     $request = $db->prepare($sql);
            //     $request->execute($data);
            //     $result = $request->fetchAll(PDO::FETCH_ASSOC);
            //     if ($result) {
            //         return $result;
            //     }
        }
    }
    $technical = dbTechnical($db, $id_car);
    // dump($technical);


    /**
     * Get oil changes of the data base
     */
    function dbOil(PDO $db, $id_car)
    {
        if (!empty($id_car)) {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM oilchanges where (id_car = :id_car) ORDER by date DESC LIMIT 1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            }
            // } else {
            //     $data = array(
            //         ':id_car' => $id_car
            //     );
            //     $sql = 'SELECT date, km FROM oilchanges where (id_car = :id_car)';
            //     $request = $db->prepare($sql);
            //     $request->execute($data);
            //     $result = $request->fetchAll(PDO::FETCH_ASSOC);
            //     if ($result) {
            //         return $result;
            //     }
        }
    }
    $oil = dbOil($db, $id_car);


    //     function insert_xx(PDO $db, $date, $km, $dataBase, $id_car)
    //     {
    //         $data = [
    //             ':date'  => $date,
    //             ':km' =>  (int)$km,
    //             ':id_car' => (int)$id_car
    //         ];
    //         $sql = "UPDATE $dataBase SET date= :date, km= :km WHERE id_car= :id_car";
    //         $request = $db->prepare($sql);
    //         $result = $request->execute($data);
    //         // echo '<script> alert("ok") </script>';
    //     } //fin
    //     if (!empty($_POST['date2']) && !empty($_POST['km2'])) {
    //         insert_xx($db, $_POST['date2'], $_POST['km2'], 'oilchanges', $id_car);
    //     }
    //     if (!empty($_POST['date3']) && !empty($_POST['km3'])) {
    //         insert_xx($db, $_POST['date3'], $_POST['km3'], 'timingbelt', $id_car);
    //     }
    //     if (!empty($_POST['date4']) && !empty($_POST['km4'])) {
    //         insert_xx($db, $_POST['date4'], $_POST['km4'], 'technicalcontrol', $id_car);
    //     }
}
