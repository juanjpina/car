<?php

use App\Validate;



//$validate = new Validate();

// function egalPass(PDO $db)
// {
//     $pass = $_POST['password'];
//     $cpass = $_POST['confirmerPassword'];
//     $resul = "";

//     if (!empty($pass) && !empty($cpass)) {

//         if (strcmp($pass, $cpass) !== 0) {
//             return $resul = "Les mots de pass sont different";
//         } else {
//             addUser($db);
//         }
//     }
// }




function addUser(PDO $db)
{


    if (!empty($_POST['password']) && !empty($_POST['confirmerPassword'])) {
        $pass = $_POST['password'];
        $cpass = $_POST['confirmerPassword'];

        if (strcmp($pass, $cpass) !== 0) {

            //return $resul = "Les mots de pass sont different";
            header('Location: /newLoginView.php');
        } else {

            if (!empty($_POST['email']) && !empty($_POST['pseudo'])) {
                $sql = 'INSERT INTO user (email, password, nickname) VALUES (:email, :password, :nickname)';
                $data = [
                    'email'     => $_POST['email'],
                    'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'nickname'  => $_POST['pseudo']
                ];
                $request = $db->prepare($sql);
                $result = $request->execute($data);

                dump($result);
            }
        }
    }
}
addUser($db);
//egalpass($db);
