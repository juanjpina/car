<?php
function delete(PDO $db, AltoRouter $router)
{
    if (isset($_POST['delete'])) {
        if (!empty($_GET['db']) && !empty($_GET['id'])) {
            try {
                $data = ['id' => (int) $_GET['id']];
                $database = $_GET['db'];
                $sql = "DELETE FROM $database WHERE id = :id";
                $request = $db->prepare($sql);
                $request->execute($data);
            } catch (PDOException $e) {
                header('Location: ' . $router->generate('executionError'));
            }

            header('Location: ' . $router->generate('execution'));
        }
    }
}
delete($db, $router);
