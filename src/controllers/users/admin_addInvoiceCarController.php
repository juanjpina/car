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
    $data = array(
        ':id_user' => $_SESSION['auth']['id_user']
    );
    $sql = 'SELECT * FROM car where id_user = :id_user';
    $request = $db->prepare($sql);
    $request->execute($data);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        return $result;
    } else {
        return   array(
            ['trademark' => 'Ajouter un véhicule']
        );
    }
}
$cars = listCar($db);


/**
 * si existe datos en la base de datos los inyecta. y si no cero.
 */
function xxx()
{
}











/**
 * guarda en DB los datos del coche
 */

function insert_DB(PDO $db)
{
    if (!empty($_POST['select'])) {


        switch ($_POST['select']) {

            case '1':
                $data = [
                    ':id_user' => $_SESSION['auth']['id_user'],
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
