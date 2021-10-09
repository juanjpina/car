<?php


/**
 * retrieves user information
 */
function searchEmail(PDO $db)
{
    $data = [
        'id_user' => $_SESSION['auth']['id_user']
    ];
    $sql = 'SELECT nickname, email FROM user where id_user= :id_user';
    $request = $db->prepare($sql);
    $request->execute($data);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    $request->closeCursor();

    return $result;
}


/**
 *retrieves the form information and updates it in the database. 
 */
function editUser(PDO $db, AltoRouter $router)
{
    if (isset($_POST['ok'])) {

        if (isset($_POST['password']) && isset($_POST['confirmerPassword'])) {
            $pass = $_POST['password'];
            $cpass = $_POST['confirmerPassword'];
            if (password($pass)) {
                if (strcmp($pass, $cpass) == 0) {
                    try {
                        $data = [
                            'id_user' => $_SESSION['auth']['id_user'],
                            'password' =>  password_hash($_POST['password'], PASSWORD_DEFAULT)
                        ];
                        $sql = 'UPDATE user SET password=:password WHERE id_user=:id_user';
                        $request = $db->prepare($sql);
                        $result = $request->execute($data);
                        $request->closeCursor();
                        if ($result) {
                            header('Location: ' . $router->generate('execution'));
                        }
                    } catch (Exception $e) {
                        header('Location: ' . $router->generate('executionError'));
                        die();
                    } finally {
                        $sql = null;
                    }
                }
            }
        }
        if (isset($_POST['nickname'])) {
            $email = $_SESSION['auth']['email'];
            $id_user = $_SESSION['auth']['id_user'];
            $_SESSION['auth'] = [
                'nickname' => $_POST['nickname'],
                'email' => $email,
                'id_user'    => $id_user,
            ];
            try {
                $data = [
                    'id_user' => $_SESSION['auth']['id_user'],
                    'nickname'  => $_POST['nickname'],
                ];
                $sql = 'UPDATE user SET nickname=:nickname WHERE id_user=:id_user';
                $request = $db->prepare($sql);
                $result = $request->execute($data);
                $request->closeCursor();
                if ($result) {
                    header('Location: ' . $router->generate('execution'));
                }
            } catch (Exception $e) {
                header('Location: ' . $router->generate('executionError'));
                die();
            } finally {
                $sql = null;
            }
        }
        if (isset($_POST['email'])) {
            try {
                $data = [
                    'id_user' => $_SESSION['auth']['id_user'],
                    'email'  => $_POST['email'],
                ];
                $sql = 'UPDATE user SET email=:email WHERE id_user=:id_user';
                $request = $db->prepare($sql);
                $result = $request->execute($data);
                $request->closeCursor();
                if ($result) {
                    header('Location: ' . $router->generate('execution'));
                }
            } catch (Exception $e) {
                header('Location: ' . $router->generate('executionError'));
                die();
            } finally {
                $sql = null;
            }
        }
    }
}
editUser($db, $router);
$result = searchEmail($db);
