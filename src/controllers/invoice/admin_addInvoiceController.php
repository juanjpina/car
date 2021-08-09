<?php

$trademark = getTrademark($db);

$invoice = getSelect($db, 'type_invoice');




function insert(PDO $db)
{

    if (
        !empty($_POST['trademark']) && !empty($_POST['invoice']) && !empty($_POST['date']) && !empty($_POST['km']) && !empty($_POST['montant'])
        && !empty($_POST['total']) && !empty($_POST['text'])
    ) {

        $data = [
            ':id_car' => (int)$id_car,
            ':date' => '2000-05-01',
            ':km' => 0
        ];
        $sql = 'INSERT INTO buy (id_car, date, km) VALUES (:id_car, :date, :km)';
        $request = $db->prepare($sql);
        $result = $request->execute($data);
    }
}
