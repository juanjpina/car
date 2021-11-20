<?php

$id_car = getSessionCar($db, $router);

/**
 * returns the name of the expenses
 */
$typeInvoice = getSelect($db, 'type_invoice');

/**
 * return the list of expenses
 */
function selectInvoice(PDO $db, $database, $id_car, AltoRouter $router)
{
    if (isset($_POST['submit']) && !empty($_POST['submit'])) {
        if (isset($id_car) && isset($_POST['typeInvoice'])) {
            try {
                $data = array(
                    'id_car' => (int)$id_car,
                );
                $sql = "SELECT * FROM $database WHERE id_car= :id_car";
                $request = $db->prepare($sql);
                $request->execute($data);
                $result = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
                if ($result) {
                    return $result;
                } else {
                    return 'null';
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
    }
}


if (isset($_POST['typeInvoice']) && !empty($_POST['typeInvoice'])) {
    $selectInvoice = selectInvoice($db, $_POST['typeInvoice'], $id_car, $router);
} 
