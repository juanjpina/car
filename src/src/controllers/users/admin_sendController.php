<?php


if ($_POST) {
    echo searchEmail($db, $router);
}
/**
 * this function checks if the email exists in the database
 * @return string
 */
function searchEmail(PDO $db, AltoRouter $router)
{
    try {
        $data = array(
            ':email' => $_POST['email']
        );
        $sql = "SELECT email FROM user WHERE email LIKE :email";
        $request = $db->prepare($sql);
        $request->execute($data);
        $response = $request->fetch(PDO::FETCH_ASSOC);
        $request->closeCursor();
        if (!empty($response)) {
            return 'ok';
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
