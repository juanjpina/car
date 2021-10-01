<?php
setlocale(LC_TIME, "spanish");
$string = strcmp($_GET['period'], '0');
if ($string == 0) {
    $invoice = get($db, $_GET['invoice']);
    $totalPeriod = getTotalDate($db, $_GET['invoice']);
} else {
    $invoice = getPeriod($db, $_GET['invoice']);
    $totalPeriod = getTotalPeriod($db, $_GET['invoice']);
}

/**
 * @return invoice title
 */
$typeInvoice = getInvoiceTitel($db, $_GET['invoice'], 'type_invoice');


/**
 *table list by dates
 * @param PDO
 * @return array data base from between date 
 */
function get(PDO $db, $database)
{
    $data = [
        'dateStart' => $_GET['dateStart'],
        'dateEnd' => $_GET['dateEnd'],
        'id_car' => $_GET['id']
    ];
    $sql = "SELECT * FROM $database WHERE id_car = :id_car AND date BETWEEN :dateEnd AND :dateStart ORDER BY date DESC";
    $request = $db->prepare($sql);
    $request->execute($data);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
};



/**
 * table list by periods
 * 
 * @param PDO
 * 
 * @return array data base from period
 */
function getPeriod(PDO $db, $database)
{
    $period = $_GET['period'];
    $data = [
        'id_car' => $_GET['id']
    ];
    $sql = "SELECT * FROM $database WHERE id_car= :id_car AND date BETWEEN  DATE_SUB( curdate(), INTERVAL $period MONTH ) AND curdate()
ORDER BY date ASC";
    $request = $db->prepare($sql);
    $request->execute($data);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
};


/**
 * sum the total of the table by periods
 * @return array 
 */
function getTotalPeriod(PDO $db, $database)
{
    $period = $_GET['period'];
    $data = [
        'id_car' => $_GET['id']
    ];

    $sql = "SELECT SUM(total) FROM $database WHERE id_car = :id_car AND date BETWEEN  DATE_SUB( curdate(), INTERVAL $period MONTH ) AND curdate()
ORDER BY date ASC";
    $request = $db->prepare($sql);
    $request->execute($data);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * sum the total of the table by dates
 * @return array 
 */
function getTotalDate(PDO $db, $database)
{
    $data = [
        'dateStart' => $_GET['dateStart'],
        'dateEnd' => $_GET['dateEnd'],
        'id_car' => $_GET['id']
    ];
    $sql = "SELECT SUM(total) FROM $database WHERE id_car=:id_car AND date BETWEEN :dateEnd AND :dateStart ORDER BY date DESC";
    $request = $db->prepare($sql);
    $request->execute($data);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
