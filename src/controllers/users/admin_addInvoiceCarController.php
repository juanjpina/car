<?php

/**
 * inyecta en un select los tipos de reparacoin
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
 * inyecta en un select el coche del usuario
 */
function listCar(PDO $db)
{
    dump($_SESSION['auth']['id_user']);
    $data = array(
        ':id_user' => $_SESSION['auth']['id_user']
    );
    $sql = 'SELECT trademark FROM car where id_user = :id_user';
    $request = $db->prepare($sql);
    $request->execute($data);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
$cars = listCar($db);

/**
 * guarda en DB los datos del coche
 */

function insert_DB(PDO $db)
{
    if (!empty($_POST['select'])) {


        switch ($_POST['select']) {

            case '1':
                $data = [
                    ':id_car' => $_SESSION
                    ':date'  => $_POST['date'],
                    ':km' =>  $_POST['km']
                ];

                $sql = 'UPDATE timingbelt SET date=:date, km=:km, id_car = :id_car  WHERE id_user=?';
                $data['id_user'] = $_SESSION['auth']['id_user'];
                $request = $db->prepare($sql);
                $result = $request->execute($data);

                break;
        }
    }
}
