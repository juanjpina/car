<?php


/**
 * compares the value of select. and if there is an operational period enters the if.
 */
$string = strcmp($_GET['period'], '0');



if ($string != 0) {
    $invtoll = getTotalPeriodCar($db, 'invtoll', $router);
    $invfuel = getTotalPeriodCar($db, 'invfuel', $router);
    $invinsurance =  getTotalPeriodCar($db, 'invinsurance', $router);
    $invoil =  getTotalPeriodCar($db, 'invoil', $router);
    $invpneu = getTotalPeriodCar($db, 'invpneu', $router);
    $invtechnical = getTotalPeriodCar($db, 'invtechnical', $router);
    $invtiming =  getTotalPeriodCar($db, 'invtiming', $router);
}

$total =  (int)$invtoll[0]['SUM(total)'] + (int) $invfuel[0]['SUM(total)'] + (int) $invinsurance[0]['SUM(total)'] + (int) $invoil[0]['SUM(total)'] + (int) $invpneu[0]['SUM(total)'] + (int) $invtechnical[0]['SUM(total)'] +
    (int)$invtiming[0]['SUM(total)'];


/**
 * sum the total of the table by periods
 * @return array 
 */
function getTotalPeriodCar(PDO $db, $database, AltoRouter $router)
{
    // $database = $_GET['invoice'];
    $period = $_GET['period'];
    $data = [
        'id_car' => $_GET['id']
    ];
    try {
        $sql = "SELECT SUM(total) FROM $database WHERE id_car = :id_car AND date BETWEEN  DATE_SUB( curdate(), INTERVAL $period MONTH ) AND curdate()
ORDER BY date ASC";
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        if ($result) {
            return $result;
        } else {
            // header('Location: ' . $router->generate('executionError'));
        }
    } catch (Exception $e) {
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
 * sum the total of the table by periods
 * @return array 
 */
function getTotalPeriod(PDO $db, $database, AltoRouter $router)
{
    // $database = $_GET['invoice'];
    $period = $_GET['period'];
    $data = [
        'id_car' => $_GET['id']
    ];

    try {
        $sql = "SELECT SUM(total) FROM $database WHERE date BETWEEN  DATE_SUB( curdate(), INTERVAL $period MONTH ) AND curdate()
AND id_car=:id_car ORDER BY date ASC";
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        return $result;
    } catch (Exception $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } finally {
        $sql = null;
    }
    if ($result) {
    } else {
    }
}
