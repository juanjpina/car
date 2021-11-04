<?php


if ($_POST) {
    echo "ok";
}


function searchEmail(PDO $db, AltoRouter $router)
{
    if (!empty($_POST['email']) && isset($_POST['email'])) {
        try {
            $data = array(
                ':email' => $_POST['email']
            );
            $sql = 'SELECT email FROM user WHERE email LIKE :email LIMIT 1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $response = $request->fetch(PDO::FETCH_ASSOC);
            $request->closeCursor();
            if (strcmp($response['email'], $_POST['email']) === 0) {
                return "L'email existe déjà !!";
            } else {
                addUser($db, $router);
            }
        } catch (Exception $e) {
            header('Location: ' . $router->generate('home'));
            die();
        } catch (PDOException $e) {
            header('Location: ' . $router->generate('home'));
            die();
        } finally {
            $sql = null;
        }
    }
}
// searchEmail($db, $router);
