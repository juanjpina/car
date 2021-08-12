<?php

// dump($_GET['invoice']);
$fecha = date("Y-m-d");
// dump($_GET['dateEnd']);
// dump($_GET['dateStart']);
// dump($fecha);


/**
 * @param PDO
 * @return array data base 
 */
function get(PDO $db, $database)
{
    $database = $_GET['invoice'];
    $data = [
        'dateStart' => $_GET['dateStart'],
        'dateEnd' => $_GET['dateEnd']
    ];
    $sql = "SELECT * FROM $database WHERE date BETWEEN :dateEnd AND :dateStart ORDER BY date DESC";
    $request = $db->prepare($sql);
    $request->execute($data);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
};

// SELECT * FROM `invtoll` WHERE date BETWEEN '2020-03-11' AND '2021-08-11' 
// dump(get($db, $_GET['invoice']));
$invoice = get($db, $_GET['invoice']);
