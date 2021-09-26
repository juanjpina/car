<?php

if (!empty($_POST['mail']) && isset($_POST['mail'])) {
    // dump($_POST['mail']);
    $data = [
        ':email' => $_POST['mail'],
    ];
    $sql = "SELECT * FROM user WHERE email= :email";
    $request = $db->prepare($sql);
    $request->execute($data);
    $reponse = $request->fetchAll(PDO::FETCH_ASSOC);
    // dump($reponse);
    if ($reponse) {

        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $password = "";
        //Reconstruimos la contraseña segun la longitud que se quiera
        for ($i = 0; $i < 8; $i++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
            $password .= substr($str, rand(0, 62), 1);
        }
        //Mostramos la contraseña generada
        // echo 'Password generado: ' . $password;

        dump($password);

        $data = [
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':id_user' => $reponse[0]['id_user'],
        ];

        $sql = "UPDATE user SET password= :password WHERE id_user = :id_user";
        $request = $db->prepare($sql);
        $request->execute($data);
        // dump($request);

        $text_mail = '';
        $recipient = 'utilisateur';
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content_type: text/html charset=iso-8859-1\r\n";
        $headers .= "From: rdvoiture <red@rev.com>\r\n";

        if ($reponse) {
            foreach ($reponse as $mail) {
                $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' voici le nouvelle mot de passe' . $password .  'Bien cordialement.';
                $sunjet = 'Mot de passe';
                // $mail = mail($mail['email'], $sunject, $text_mail, $headers);
                $mail = $mail['email'] . $sunjet . $text_mail . $headers;
                // dump($mail);
            }
        }
    }
}
