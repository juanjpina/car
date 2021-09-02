<?php

/**
 * 
 */


$text_mail = '';
$recipient = 'utilisateur';
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content_type: text/html charset=iso-8859-1\r\n";
$headers .= "From: rdvoiture <red@rev.com>\r\n";


$sql = "SELECT user.email, user.nickname, alert.*, car.trademark ,timingdate FROM alert, user, car WHERE alert.id_car=car.id_car AND car.id_user=user.id_user AND DATE_SUB( curdate(), INTERVAL 1 MONTH ) = timingdate ORDER BY timingdate ASC ";
$request = $db->prepare($sql);
$request->execute();
$reponse = $request->fetchAll(PDO::FETCH_ASSOC);
dump($reponse);



/**
 * mail timming-belt (1 month)
 */
foreach ($reponse as $mail) {
    $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je voudrais vous prevenir que dans un mois vous devriez changer la courroie de distribution de votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
    $sunjet = 'Courroie de distribution';
    // $mail = mail($mail['email'], $sunject, $text_mail, $headers);
    $mail = $mail['email'] . $sunject . $text_mail . $headers;
    dump($mail);
}


/**
 * mail technical control
 */
foreach ($reponse as $mail) {
    $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je voudrais vous prevenir que dans un mois vous devriez passer le contrôle technique de votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
    $sunjet = 'Contrôle technique';
    // $mail = mail($mail['email'], $sunject, $text_mail, $headers);
    $mail = $mail['email'] . $sunject . $text_mail . $headers;
    dump($mail);
}
