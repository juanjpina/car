<?php


/**
 * retrieves user information
 */
function searchEmail(PDO $db, AltoRouter $router)
{
    try {
        $data = [
            'id_user' => $_SESSION['auth']['id_user']
        ];
        $sql = 'SELECT nickname, email FROM user where id_user= :id_user';
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
}


/**
 *retrieves the form information and updates it in the database. 
 */
function editUser(PDO $db, AltoRouter $router)
{
    if (isset($_POST['ok'])) {
        if (isset($_POST['nickname']) && !empty($_POST['nickname'])) {
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
};

editUser($db, $router);
$result = searchEmail($db, $router);

function checkModifEmail(PDO $db, AltoRouter $router)
{
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        try {
            $data = array(
                ':email' => $_POST['email'],
            );
            $sql = 'SELECT email FROM user WHERE email LIKE :email LIMIT 1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $response = $request->fetch(PDO::FETCH_ASSOC);
            $request->closeCursor();
            // dump($response);
            if (($response)) {
                return "L'email existe déjà !!";
            } else {
                emailUpdate($db, $router);
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

$check =  checkModifEmail($db, $router);
function emailUpdate(PDO $db, AltoRouter $router)
{
    $data = [
        'id_user' => $_SESSION['auth']['id_user'],
        'email'  => $_POST['email'],
    ];
    $sql = 'UPDATE user SET email=:email WHERE id_user=:id_user';
    $request = $db->prepare($sql);
    $result = $request->execute($data);
    $request->closeCursor();
    // dump($result);
    header('Location: '  . $router->generate('executionPseudo'));
    exit;
    if ($result) {
    }
}
