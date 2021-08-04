<?php
//redirectAdmin($router);

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

function searchEmail(PDO $db, AltoRouter $router)
{

    if (!empty($_POST['email'])) {
        dump(11);

        $data = array(

            ':email' => $_POST['email']
        );


        $sql = 'SELECT email FROM user where email= :email ';
        $request = $db->prepare($sql);
        $request->execute($data);
        // $request->execute(array($_POST['email']));
        // $request->execute(array_values($data));
        $data = $request->fetch(PDO::FETCH_ASSOC);

        if ($data['email'] == $_POST['email']) {
            return "Votre email il existe déjà !!";
        } else {
            addUser($db, $router);
        }
        // echo '<script type="text/javascript">alert("existe");</script>';
        // dump('data', $data);
        $request->closeCursor();
    }
}

function addUser(PDO $db, AltoRouter $router)
{



    if (!empty($_POST['password']) && !empty($_POST['confirmerPassword'])) {
        $pass = $_POST['password'];
        $cpass = $_POST['confirmerPassword'];

        if (strcmp($pass, $cpass) !== 0) {
            echo '<script type="text/javascript">alert("hola");</script>';
            //return $resul = "Les mots de pass sont different";
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

                // dump($result);
                header('Location: ' . $router->generate('homeadmin'));
            }
        }
    }
}
// searchEmail($db, $router);
AddUser($db, $router);
