<?php

/**
 * update form a data base
 */
function invoiceUpdate(PDO $db)
{
    if (!empty($_POST['date']) && !empty($_POST['total']) && !empty($_POST['km'])) {

        $dataBase = $_GET['db'];
        $data = [
            ':id' => $_GET['id'],
            ':date'  => $_POST['date'],
            ':km' =>  (int)$_POST['km'],
            ':total' =>  (int)$_POST['total'],
            ':comment' => !empty($_POST['COMMENT']) ? $_POST['COMMENT'] : ' ',
        ];
        $sql = "UPDATE $dataBase SET date= :date, km= :km, total = :total, comment = :comment 
          WHERE id= :id";
        $request = $db->prepare($sql);
        $result = $request->execute($data);
    }
}
invoiceUpdate($db);

/**
 * filled with a select
 */
if (!empty($_GET['id']) && !empty($_GET['db'])) {

    $getInvoice = getInvoice($db, $_GET['id'], $_GET['db']);
}
