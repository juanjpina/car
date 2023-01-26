<?php

/**
 * update form a data base
 */
function invoiceUpdate(PDO $db, AltoRouter $router)
{
    $test = false;
    if (!empty($_POST['date']) && !empty($_POST['total']) && !empty($_POST['km'])) {
        if (is_numeric($_POST['km'])) {
            if (is_numeric($_POST['total'])) {
                if (validateDate($_POST['date'], $format = 'Y-m-d')) {
                    $test = true;
                }
            }
        }
        if ($test) {
            try {
                $dataBase = $_GET['db'];
                $data = [
                    ':id' => $_GET['id'],
                    ':date'  => $_POST['date'],
                    ':km' =>  (int)$_POST['km'],
                    ':total' =>  (int)$_POST['total'],
                    ':comment' => !empty(htmlspecialchars($_POST['comment'], ENT_QUOTES, "UTF-8")) ? htmlspecialchars($_POST['comment'], ENT_QUOTES, "UTF-8") : ' ',
                ];
                $sql = "UPDATE $dataBase SET date= :date, km= :km, total= :total, comment= :comment WHERE id= :id";
                $request = $db->prepare($sql);
                $result = $request->execute($data);
                $request->closeCursor();
                if ($result) {
                    header('Location: ' . $router->generate('executionModified'));
                } else {
                    header('Location: ' . $router->generate('executionError'));
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
        } else {
            header('Location: ' . $router->generate('executionError'));
        }
    }
}
invoiceUpdate($db, $router);

/**
 * filled with a select
 */
if (isset($_GET['id']) && isset($_GET['db'])) {
    $getInvoice = getInvoice($db, $_GET['id'], $_GET['db']);
}
