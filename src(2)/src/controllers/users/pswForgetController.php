<?php

/**
 * check if the email exists
 * @param String
 * @return string 
 */
function passwordNew(PDO $db, AltoRouter $router)
{
    if (isset($_POST['mail']) && isset($_POST['mail'])) {
        try {
            $data = [
                ':email' => $_POST['mail'],
            ];
            $sql = "SELECT * FROM user WHERE email= :email";
            $request = $db->prepare($sql);
            $request->execute($data);
            $reponse = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
        } catch (Exception $e) {
            header('Location: ' . $router->generate('home'));
            die();
        } catch (PDOException $e) {
            header('Location: ' . $router->generate('home'));
            die();
        } finally {
            $sql = null;
        }


        /**
         * generates one password
         */
        if ($reponse) {

            $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
            $password = "";

            for ($i = 0; $i < 8; $i++) {

                $password .= substr($str, rand(0, 62), 1);
            }
            dump($password);

            $data = [
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':id_user' => $reponse[0]['id_user'],
            ];

            /**
             * change the password in the database
             */
            try {
                $sql = "UPDATE user SET password= :password WHERE id_user = :id_user";
                $request = $db->prepare($sql);
                $request->execute($data);
                $request->closeCursor();
                $text_mail = '';
                $recipient = 'utilisateur';
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content_type: text/html charset=iso-8859-1\r\n";
                $headers .= "From: rdvoiture <juanjpina@gmail.com>\r\n";
            } catch (Exception $e) {
                header('Location: ' . $router->generate('home'));
                die();
            } catch (PDOException $e) {
                header('Location: ' . $router->generate('home'));
                die();
            } finally {
                $sql = null;
            }
            /**
             * send an email with the password
             */

            $newReponse = getUser($db, $reponse[0]['id_user']);
            if ($newReponse) {
                dump('re', $newReponse);
                foreach ($newReponse as $mail) {
                    $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' voici le nouvelle mot de passe ' . $password .  ' .Bien cordialement.';
                    $sunjet = 'Mot de passe';
                    // $mail = mail($mail['email'], $sunjet, $text_mail, $headers);
                    $mails = $mail['email'] . $sunjet . $text_mail . $headers;
                    dump($mails);
                }
            }
            return "Vous avez reçu un email avec un nouveau mot de passe.";
        } else {
            return "L'adress email n'existe pas";
        }
    }
}
$value = passwordNew($db, $router);
