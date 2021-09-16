<?php



function searchEmail(PDO $db)
{
    $data = [
        'id_user' => $_SESSION['auth']['id_user']
    ];


    $sql = 'SELECT nickname, email FROM user where id_user= :id_user';
    $request = $db->prepare($sql);
    $request->execute($data);
    $data = $request->fetch(PDO::FETCH_ASSOC);
    // if ($data) {
    //     // echo '<script type="text/javascript">alert("existe");</script>';
    //     // dump('data', $data);
    //     return $data->nickname;
    // }
    return $data;
}

function editUser(PDO $db, AltoRouter $router)
{
    if (!empty($_POST['password']) && !empty($_POST['confirmerPassword'])) {
        $pass = $_POST['password'];
        $cpass = $_POST['confirmerPassword'];
        if (strcmp($pass, $cpass) !== 0) {
            // dump('if1', strcmp($pass, $cpass));

            return $resul = "Les mots de pass sont different";
            header('Location: ' . $router->generate('editUser'));
        } else {
            $data = [
                'nickname'  => $_POST['nickname'],
                'password' =>  password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];
            if (!empty($_SESSION['auth']['id_user'])) {
                $sql = 'UPDATE user SET password=:password, nickname=:nickname  WHERE id_user=:id_user';
                $data['id_user'] = $_SESSION['auth']['id_user'];
                $request = $db->prepare($sql);
                $result = $request->execute($data);
                if ($result) {
                    //pagina de ok

                }
            }
        }
    }

    // $request = prepare($sql);
}
editUser($db, $router);
$result = searchEmail($db);
