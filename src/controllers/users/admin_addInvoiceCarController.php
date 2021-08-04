<?php

/**
 * Get of user car of the data base
 */
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
    $cars = $result;
    // if (empty($_POST['select'])) {
    //     $_POST['select'] = 1;
    // }
    dump($_POST['select']);


    function getTrademark(PDO $db)
    {

        $data = array(
            ':id_user' => $_SESSION['auth']['id_user']
        );
        $sql = 'SELECT trademark FROM car where id_user = :id_user LIMIT 1';
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    $trademark = getTrademark($db);
    dump($trademark);




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
        // dump('tim', $_POST['select']);
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
                        'date' => '01/01/1970',
                        'km' => '000'
                    ]
                );
            }
        }
    }
    $timing = dbTiming($db);

    /**
     * Get buy car of the data base
     */
    function dbBuy(PDO $db)
    {
        if (!empty($_POST['select'])) {
            $data = array(
                ':id_car' => $_POST['select']
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
                        'date' => '01/01/1970',
                        'km' => '000'
                    ]
                );
            }
        }
    }
    $buy = dbBuy($db);

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
                        'date' => '01/01/1970',
                        'km' => '000'
                    ]
                );
            }
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
                        'date' => '01/01/1970',
                        'km' => '000'
                    ]
                );
            }
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
                        'date' => '01/01/1970',
                        'km' => '000'
                    ]
                );
            }
        }
    }
    $oil = dbOil($db);
    // dump($_POST['select']);

    /**
     * guarda en DB los datos del coche
     */
    function insert_DB(PDO $db)
    {
        if (!empty($_POST['km1']) && !empty($_POST['date1'])) {
            $data = array(
                ':id_car' => $_POST['select']
            );
            $sql = 'SELECT * FROM buy where id_car = :id_car';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result['id_car'] != 0) {
                $data = [
                    ':date'  => $_POST['date1'],
                    ':km' =>  $_POST['km1']
                ];
                $sql = 'UPDATE by SET date=:date, km=:km WHERE id_car=?';
                $data['id_car'] = $_SESSION['select'];
                $request = $db->prepare($sql);
                $result = $request->execute($data);
            } else {
                //insert
                $sql = 'INSERT INTO buy (id_car, km, date) VALUES (:email, :password, :nickname, :id_car)';
                $data = [
                    ':id_car' => $_POST['select'],
                    ':km'  => $_POST['km1'],
                    ':date' => $_POST['date1'],

                ];
                $request = $db->prepare($sql);
                $request->execute($data);
            }
        }
    } //fin

}
