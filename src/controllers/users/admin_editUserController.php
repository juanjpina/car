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
        try {
            if (!empty($_POST['password']) && !empty($_POST['confirmerPassword'])) {
                $pass = $_POST['password'];
                $cpass = $_POST['confirmerPassword'];



                if (password($pass)) {
                    if (strcmp($pass, $cpass) !== 0) {



                        // return $res = 'les mot de passe sont diferent';



                        $data = [
                            'id_user' => $_SESSION['auth']['id_user'],
                            'password' =>  password_hash($_POST['password'], PASSWORD_DEFAULT)
                        ];
                        $sql = 'UPDATE user SET password=:password WHERE id_user=:id_user';
                        $request = $db->prepare($sql);
                        $result = $request->execute($data);
                    }
                }
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
        } catch (PDOException $e) {
            header('Location: ' . $router->generate('executionError'));
        }
    }
}
editUser($db, $router);
$result = searchEmail($db);


function password($pass)
{
    $value = true;

    if (strlen($pass) < 8) {
        $error_clave = "La clave debe tener al menos 6 caracteres";
        return "La clave debe tener al menos 6 caracteres";
        $value = false;
        // return false;
    }
    if (strlen($pass) > 16) {
        $error_clave = "La clave no puede tener más de 16 caracteres";
        // return "La clave no puede tener más de 16 caracteres";
        $value = false;
        // return false;
    }
    if (!preg_match('`[a-z]`', $pass)) {
        $error_clave = "La clave debe tener al menos una letra minúscula";
        $value = false;
        // return false;
        // return "La clave debe tener al menos una letra minúscula";
    }
    if (!preg_match('`[A-Z]`', $pass)) {
        $error_clave = "La clave debe tener al menos una letra mayúscula";
        $value = false;
        // return false;
        // return "La clave debe tener al menos una letra mayúscula";
    }
    if (!preg_match('`[0-9]`', $pass)) {
        // return "La clave debe tener al menos un caracter numérico";
        $error_clave = "La clave debe tener al menos un caracter numérico";
        $value = false;
        // return false;
    }
    return $value;
}

// if ($pass) {
//     $error_encontrado = "";
//     if (password($pass)) {
//         echo "PASSWORD VÁLIDO";
//     } else {
//         echo "PASSWORD NO VÁLIDO: " . $error_encontrado;
//     }
// }


function messagePassword($pass)
{

    if (strlen($pass) < 8) {
        $error_clave = "La clave debe tener al menos 6 caracteres";
        return "La clave debe tener al menos 6 caracteres";
        // return false;
    }
    if (strlen($pass) > 16) {
        $error_clave = "La clave no puede tener más de 16 caracteres";
        return "La clave no puede tener más de 16 caracteres";
        // return false;
    }
    if (!preg_match('`[a-z]`', $pass)) {
        $error_clave = "La clave debe tener al menos una letra minúscula";
        // return false;
        return "La clave debe tener al menos una letra minúscula";
    }
    if (!preg_match('`[A-Z]`', $pass)) {
        $error_clave = "La clave debe tener al menos una letra mayúscula";
        // return false;
        return "La clave debe tener al menos una letra mayúscula";
    }
    if (!preg_match('`[0-9]`', $pass)) {
        return "La clave debe tener al menos un caracter numérico";
        $error_clave = "La clave debe tener al menos un caracter numérico";
        // return false;
    }
}
