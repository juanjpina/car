<?php
setlocale(LC_TIME, "spanish");
$test = false;
$string = strcmp($_GET['period'], '0');

if ($string == 0) {
    $invoice = get($db, $_GET['invoice'], $router);
    $totalPeriod = getTotalDate($db, $_GET['invoice'], $router);
} else {
    $invoice = getPeriod($db, $_GET['invoice'], $router);
    $totalPeriod = getTotalPeriod($db, $_GET['invoice'], $router);
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
function get(PDO $db, $database, AltoRouter $router)
{
    try {
        $data = [
            'dateStart' => $_GET['dateStart'],
            'dateEnd' => $_GET['dateEnd'],
            'id_car' => $_GET['id']
        ];
        $sql = "SELECT * FROM $database WHERE id_car = :id_car AND date BETWEEN :dateEnd AND :dateStart ORDER BY date DESC";
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        if ($result) {
            return $result;
        } else {
            $values = [
                [
                    'date' => '11-11-1111',
                    'km' => '0',
                    'total' => '0',
                    'comment' => '0'
                ]
            ];
            // return $values;
        }
    } catch (Exception $e) {
        header('Location: ' . $router->generate('executionError'));
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } finally {
        $sql = null;
    }
};


/**
 * table list by periods
 * 
 * @param PDO
 * 
 * @return array data base from period
 */
function getPeriod(PDO $db, $database, $router)
{
    try {
        $period = $_GET['period'];
        $data = [
            'id_car' => $_GET['id']
        ];
        $sql = "SELECT * FROM $database WHERE id_car= :id_car AND date BETWEEN  DATE_SUB( curdate(), INTERVAL $period MONTH ) AND curdate()
ORDER BY date ASC";
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        if ($result) {
            return $result;
        } else {
            $values = [
                [
                    'date' => '11-11-1111',
                    'km' => '0',
                    'total' => '0',
                    'comment' => '0'
                ]
            ];
            // return $values;
        }
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } finally {
        $sql = null;
    }
};


/**
 * sum the total of the table by periods
 * @return array 
 */
function getTotalPeriod(PDO $db, $database, AltoRouter $router)
{
    try {
        $period = $_GET['period'];
        $data = [
            'id_car' => $_GET['id']
        ];

        $sql = "SELECT SUM(total) FROM $database WHERE id_car = :id_car AND date BETWEEN  DATE_SUB( curdate(), INTERVAL $period MONTH ) AND curdate()
ORDER BY date ASC";
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        if ($result) {
            return $result;
        } else {
            $values = [
                'SUM(total)' => '0'
            ];
            return $values;
        }
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } finally {
        $sql = null;
    }
}

/**
 * sum the total of the table by dates
 * @return array 
 */
function getTotalDate(PDO $db, $database, AltoRouter $router)
{
    try {
        $data = [
            'dateStart' => $_GET['dateStart'],
            'dateEnd' => $_GET['dateEnd'],
            'id_car' => $_GET['id']
        ];
        $sql = "SELECT SUM(total) FROM $database WHERE id_car=:id_car AND date BETWEEN :dateEnd AND :dateStart ORDER BY date DESC";
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        if ($result) {
            return $result;
        } else {
            $values = [
                'SUM(total)' => '0'
            ];
            return $values;
        }
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } finally {
        $sql = null;
    }
}
