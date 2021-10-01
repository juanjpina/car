<?php

/**
 * check if the email exists
 */
if (!empty($_POST['mail']) && isset($_POST['mail'])) {

    $data = [
        ':email' => $_POST['mail'],
    ];
    $sql = "SELECT * FROM user WHERE email= :email";
    $request = $db->prepare($sql);
    $request->execute($data);
    $reponse = $request->fetchAll(PDO::FETCH_ASSOC);


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
        $sql = "UPDATE user SET password= :password WHERE id_user = :id_user";
        $request = $db->prepare($sql);
        $request->execute($data);

        $text_mail = '';
        $recipient = 'utilisateur';
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content_type: text/html charset=iso-8859-1\r\n";
        $headers .= "From: rdvoiture <red@rev.com>\r\n";
        /**
         * send an email with the password
         */
        $newReponse = getUser($db, $reponse[0]['id_user']);
        if ($newReponse) {
            dump($newReponse);
            foreach ($newReponse as $mail) {
                $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' voici le nouvelle mot de passe ' . $password .  ' .Bien cordialement.';
                $sunjet = 'Mot de passe';
                // $mail = mail($mail['email'], $sunjet, $text_mail, $headers);
                $mail = $mail['email'] . $sunjet . $text_mail . $headers;
                dump($mail);
            }
        }
    }
}
