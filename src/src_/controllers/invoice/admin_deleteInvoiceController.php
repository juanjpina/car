<?php


/**
 * this function erases the elements from the database
 */
function delete(PDO $db, AltoRouter $router)
{
    if (isset($_POST['delete'])) {
        if (isset($_GET['db']) && isset($_GET['id'])) {
            try {
                $data = ['id' => (int) $_GET['id']];
                $database = $_GET['db'];
                $sql = "DELETE FROM $database WHERE id = :id";
                $request = $db->prepare($sql);
                $request->execute($data);
                $request->closeCursor();
            } catch (PDOException $e) {
                header('Location: ' . $router->generate('executionError'));
                die();
            } catch (PDOException $e) {
                header('Location: ' . $router->generate('executionError'));
                die();
            } finally {
                $sql = null;
            }
            header('Location: ' . $router->generate('executionDelete'));
        }
    }
}
delete($db, $router);
