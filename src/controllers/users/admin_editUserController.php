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

    return $result;
}


/**
 *retrieves the form information and updates it in the database. 
 */
function editUser(PDO $db, AltoRouter $router)
{

    if (!empty($_POST['ok'])) {
        if (!empty($_POST['password']) && !empty($_POST['confirmerPassword'])) {
            $pass = $_POST['password'];
            $cpass = $_POST['confirmerPassword'];
            if (strcmp($pass, $cpass) !== 0) {
                return $res = 'les mot de passe sont diferent';
            }
            $data = [
                'id_user' => $_SESSION['auth']['id_user'],
                'password' =>  password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];
            $sql = 'UPDATE user SET password=:password WHERE id_user=:id_user';
            $request = $db->prepare($sql);
            $result = $request->execute($data);
        } else if (!empty($_POST['nickname'])) {
            $email = $_SESSION['auth']['email'];
            $id_user = $_SESSION['auth']['id_user'];
            $_SESSION['auth'] = [
                'nickname' => $_POST['nickname'],
                'email' => $email,
                'id_user'    => $id_user,
            ];
            $data = [
                'id_user' => $_SESSION['auth']['id_user'],
                'nickname'  => $_POST['nickname'],
            ];
            $sql = 'UPDATE user SET nickname=:nickname WHERE id_user=:id_user';
            $request = $db->prepare($sql);
            $result = $request->execute($data);
        } else if (!empty($_POST['email'])) {
            $data = [
                'id_user' => $_SESSION['auth']['id_user'],
                'email'  => $_POST['email'],
            ];
            $sql = 'UPDATE user SET email=:email WHERE id_user=:id_user';
            $request = $db->prepare($sql);
            $result = $request->execute($data);
        }
    }
}
editUser($db, $router);
$result = searchEmail($db);
