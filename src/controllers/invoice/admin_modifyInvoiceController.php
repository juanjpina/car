<?php

/**
 * update form a data base
 */
function invoiceUpdate(PDO $db, AltoRouter $router)
{
    if (!empty($_POST['date']) && !empty($_POST['total']) && !empty($_POST['km'])) {

        $dataBase = $_GET['db'];
        $data = [
            ':id' => $_GET['id'],
            ':date'  => $_POST['date'],
            ':km' =>  (int)$_POST['km'],
            ':total' =>  (int)$_POST['total'],
            ':comment' => !empty($_POST['comment']) ? $_POST['comment'] : ' ',
        ];
        $sql = "UPDATE $dataBase SET date= :date, km= :km, total = :total, comment = :comment 
          WHERE id= :id";
        $request = $db->prepare($sql);
        $result = $request->execute($data);
        if ($result) {
            header('Location: ' . $router->generate('execution'));
        }
    }
}
invoiceUpdate($db, $router);

/**
 * filled with a select
 */
if (!empty($_GET['id']) && !empty($_GET['db'])) {

    $getInvoice = getInvoice($db, $_GET['id'], $_GET['db']);
}
