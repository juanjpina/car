<?php

/**
 * retrieves user information
 */
// function searchEmail(PDO $db, AltoRouter $router)
// {
//     try {
//         $data = [
//             'id_user' => $_SESSION['auth']['id_user']
//         ];
//         $sql = 'SELECT nickname, email FROM user where id_user= :id_user';
//         $request = $db->prepare($sql);
//         $request->execute($data);
//         $result = $request->fetchAll(PDO::FETCH_ASSOC);
//         $request->closeCursor();
//         return $result;
//     } catch (Exception $e) {
//         header('Location: ' . $router->generate('executionError'));
//         die();
//     } catch (PDOException $e) {
//         header('Location: ' . $router->generate('executionError'));
//         die();
//     } finally {
//         $sql = null;
//     }
// }


/**
 *retrieves the form information and updates it in the database.
 */
function editUser(PDO $db, AltoRouter $router)
{
    if (isset($_POST['ok'])) {
        if (!empty($_POST['password']) && !empty($_POST['confirmerPassword'])) {
            $pass = $_POST['password'];
            $cpass = $_POST['confirmerPassword'];
            if (password($pass)) {
                if (strcmp($pass, $cpass) == 0) {
                    try {
                        $data = [
                            'id_user' => $_SESSION['auth']['id_user'],
                            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                        ];
                        $sql = 'UPDATE user SET password=:password WHERE id_user=:id_user';
                        $request = $db->prepare($sql);
                        $result = $request->execute($data);
                        $request->closeCursor();
                        if ($result) {
                            header('Location: ' . $router->generate('executionPseudo'));
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
    }
}

editUser($db, $router);
//  $result = searchEmail($db,$router);
//  dump($result);
