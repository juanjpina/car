<?php

/**
 * session verification
 */
redirectAdmin($router);
// dump(0);

/**
 * check if the email exists
 * @param String
 * @return string 
 */
function passwordNew(PDO $db, AltoRouter $router)
{
    if (!empty($_POST['mail']) && isset($_POST['mail'])) {
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

            // $length = 8;
            // $count = 1;
            // $characters = "lower_case,upper_case,numbers,special_symbols";
            // // $length - the length of the generated password
            // // $count - number of passwords to be generated
            // // $characters - types of characters to be used in the password

            // // Define variables used within the function
            // $symbols = array();
            // $used_symbols = '';
            // $pass = '';

            // // An array of different character types
            // $symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
            // $symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            // $symbols["numbers"] = '1234567890';
            // $symbols["special_symbols"] = '!?~@#-_+<>[]{}';

            // // Get characters types to be used for the passsword
            // $characters = explode(",", $characters);
            // foreach ($characters as $value) {
            //     // Build a string with all characters
            //     $used_symbols .= $symbols[$value];
            // }
            // // strlen starts from 0 so to get number of characters deduct 1
            // $symbols_length = strlen($used_symbols) - 1;

            // for ($p = 0; $p < $count; $p++) {
            //     $pass = '';
            //     for ($i = 0; $i < $length; $i++) {
            //         // Get a random character from the string with all characters
            //         $n = rand(0, $symbols_length);
            //         // Add the character to the password string
            //         $pass .= $used_symbols[$n];
            //     }
            // }
            $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!#$%&'()*+,\-./:;<=>?@[\]^_`{|}~";
            $pass = "";

            for ($i = 0; $i < 10; $i++) {

                $pass .= substr($str, rand(0, 94), 1);
            }
            dump($pass);

            $data = [
                ':password' => password_hash($pass, PASSWORD_DEFAULT),
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
                    $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' voici le nouvelle mot de passe ' . $pass .  ' .Bien cordialement.';
                    $sunjet = 'Mot de passe';
                    $mails = $mail['email'] . $sunjet . $text_mail . $headers;
                }
            }
            return "Vous avez reçu un email avec un nouveau mot de passe.";
        } else {
            return "L'adress email n'existe pas";
        }
    }
};


$value = passwordNew($db, $router);

// // if ($_SERVER['SERVER_NAME'] == 'localhost') {
// // Create the Transport
// $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 25))
//     ->setUsername('977cb15ffca4bc')
//     ->setPassword('b9f6e16b8f78c');
// // } else {
// // $transport = new Swift_SendmailTransport('/usr/sbin/sendmail -bs');
// // $transport =( Swift_MailTransport::newInstance();
// // };


// // Create the Mailer using your created Transport
// $mailer = new Swift_Mailer($transport);

// // Create a message
// $message = (new Swift_Message('Wonderful Subject'))
//     ->setFrom(['juanjpina@gmail.com' => 'John'])
//     ->setTo(['mail@contac.com'])
//     ->setBody('Here is the message itself');

// // Send the message
// $result = $mailer->send($message);
// dump($result);
