<?php

/**
 * check if the email exists in the database
 * @param string (post e-mail)
 * @return string
 */


// $mail = $_POST['mail'];
// if (isset($_POST['email']) && !empty($_POST['email'])) {
    // echo 'test';
    
    function searchEmail(PDO $db, AltoRouter $router)
    { 
        dump($_POST);
            if(!empty($_POST)){
                $mail = $_POST['mail'];
                echo $mail;
            
            try {
                $data = array(
                    ':email' => $mail
                );
                $sql = 'SELECT email FROM user WHERE email LIKE $mail';
                $request = $db->prepare($sql);
                $request->execute($data);
                $response = $request->fetch(PDO::FETCH_ASSOC);
                $request->closeCursor();
                // dump($response);
                if ($response['email'] == $_POST['email']) {
                    
                    // return "Votre email il existe déjà !!";
                } else {
                    addUser($db, $router);
                }
            } catch (Exception $e) {
                header('Location: ' . $router->generate('home'));
                die();
            } finally {
                $sql = null;
            }
        }
    }
    searchEmail($db, $router);
    
    // }
    /**
     * checks if passwords are the same
 * checks if passwords are correct
 * insert the new user into the database
 * creates a new user session
 * @param password, confirmerPassword, email, psuedo
 * 
 */
function addUser(PDO $db, AltoRouter $router)
{
    if (isset($_POST['password']) && isset($_POST['confirmerPassword'])) {
        $pass = $_POST['password'];
        $cpass = $_POST['confirmerPassword'];
        if (password($pass)) {
            if (strcmp($pass, $cpass) == 0) {
                if (isset($_POST['email']) && isset($_POST['pseudo'])) {
                    try {
                        $data = [
                            ':email'     => $_POST['email'],
                            ':password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
                            ':nickname'  => $_POST['pseudo'],
                            ':id_car'  => 0,
                            ':date' => date('Y-m-d H:i:s')
                        ];
                        $sql = 'INSERT INTO user (email, password, nickname, id_car, date) VALUES (:email, :password, :nickname, :id_car, date=:date)';
                        $request = $db->prepare($sql);
                        $request->execute($data);
                        $request->closeCursor();
                        
                        if (!empty($request)) {
                            $data      = ['email' => $_POST['email']];
                            $sql      = 'SELECT id_user, email, password, nickname FROM user WHERE email = :email';
                            $request = $db->prepare($sql);
                            $request->execute($data);
                            $result = $request->fetch(PDO::FETCH_ASSOC);
                            $request->closeCursor();
                            $id_user = $result['id_user'];
                            $_SESSION['auth'] = [
                                'nickname' => $_POST['pseudo'],
                                'email' => $_POST['email'],
                                'id_user'    => $id_user,
                            ];
                            header('Location: ' . $router->generate('reception'));
                            die();
                        };
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
        }
    }
}
