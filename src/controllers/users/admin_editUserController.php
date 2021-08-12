<?php

// function addUser(PDO $db)
// {

//     if (!empty($_POST['password']) && !empty($_POST['confirmerPassword'])) {
//         $pass = $_POST['password'];
//         $cpass = $_POST['confirmerPassword'];

//         if (strcmp($pass, $cpass) !== 0) {

//             //return $resul = "Les mots de pass sont different";
//             header('Location: /newLoginView.php');
//         } else {

//             if (!empty($_POST['email']) && !empty($_POST['pseudo'])) {
//                 $sql = 'INSERT INTO user (email, password, nickname) VALUES (:email, :password, :nickname)';
//                 $data = [
//                     'email' => $_POST['email'],
//                     'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
//                     'nickname' => $_POST['pseudo']
//                 ];
//                 $request = $db->prepare($sql);
//                 $result = $request->execute($data);

//                 dump($result);
//             }
//         }
//     }
// }
// addUser($db);
//dump('hola');

function searchEmail(PDO $db)
{
    $sql = 'SELECT nickname FROM user where id_user= ?';
    $request = $db->prepare($sql);
    $request->execute([$_SESSION['auth']['id_user']]);
    $data = $request->fetch();
    if ($data) {
        // echo '<script type="text/javascript">alert("existe");</script>';
        // dump('data', $data);
        return $data->nickname;
    }
}

function editUser(PDO $db)
{
    if (!empty($_POST['password']) && !empty($_POST['confirmerPassword'])) {
        $pass = $_POST['password'];
        $cpass = $_POST['confirmerPassword'];
        if (strcmp($pass, $cpass) !== 0) {
            //return $resul = "Les mots de pass sont different";
            header('Location: /newLoginView.php');
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
            }

            // $request = prepare($sql);
            // if ($request->execute($data)) {
            // 	$idRedirect = (empty($_POST['id'])) ? db->lastInsertId() : $_POST['id'];

            // 	alert('Le film a bien été sauvegardé.', 'success');
            // 	header('Location: ' . $this->router->generate('updateCategories', ['id' => $idRedirect]));
            // 	die;
            // }
            // else {
            // 	alert('Erreur lors de la sauvegarde du catégorie.', 'danger');
            // 	header('Location: ' . $this->router->generate('indexCategories'));
            // 	die;
            // }
        }
    }
}
editUser($db);
