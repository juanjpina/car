<?php

AddUser($db, $router);
function searchEmail(PDO $db, AltoRouter $router)
{
    if (!empty($_POST['email'])) {
        $data = array(
            ':email' => $_POST['email']
        );
        $sql = 'SELECT email FROM user where email= :email ';
        $request = $db->prepare($sql);
        $request->execute($data);
        $data = $request->fetch(PDO::FETCH_ASSOC);
        if ($data['email'] == $_POST['email']) {
            return "Votre email il existe déjà !!";
        } else {
            addUser($db, $router);
        }
        $request->closeCursor();
    }
}

function addUser(PDO $db, AltoRouter $router)
{
    if (!empty($_POST['password']) && !empty($_POST['confirmerPassword'])) {
        $pass = $_POST['password'];
        $cpass = $_POST['confirmerPassword'];

        if (strcmp($pass, $cpass) !== 0) {
            header('Location: /newLoginView.php');
        } else {
            if (!empty($_POST['email']) && !empty($_POST['pseudo'])) {
                $sql = 'INSERT INTO user (email, password, nickname, id_car) VALUES (:email, :password, :nickname, :id_car)';
                $data = [
                    ':email'     => $_POST['email'],
                    ':password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    ':nickname'  => $_POST['pseudo'],
                    ':id_car'  => 0
                ];
                $request = $db->prepare($sql);
                $request->execute($data);
                if (isset($request)) {
                    $data      = ['email' => $_POST['email']];
                    $sql      = 'SELECT id_user, email, password, nickname FROM user WHERE email = :email';
                    $request = $db->prepare($sql);
                    $request->execute($data);
                    $result = $request->fetch(PDO::FETCH_ASSOC);
                    $id_user = $result['id_user'];
                    $_SESSION['auth'] = [
                        'nickname' => $_POST['pseudo'],
                        'email' => $_POST['email'],
                        'id_user'    => $id_user,
                    ];
                    header('Location: ' . $router->generate('reception'));
                    die();
                };
            }
        }
    }
}
