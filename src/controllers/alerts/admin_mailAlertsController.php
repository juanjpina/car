<?php

/**
 * 
 */


$text_mail = '';
$recipient = 'utilisateur';
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content_type: text/html charset=iso-8859-1\r\n";
$headers .= "From: rdvoiture <red@rev.com>\r\n";




/**
 * send an email to warn of the expiration of timming-belt (1 month)
 */
$sql = "SELECT user.email, user.nickname, alert.*, car.trademark ,timingdate FROM alert, user, car WHERE alert.id_car=car.id_car AND car.id_user=user.id_user AND DATE_SUB( curdate(), INTERVAL 1 MONTH ) = timingdate ORDER BY timingdate ASC ";
$request = $db->prepare($sql);
$request->execute();
$reponse = $request->fetchAll(PDO::FETCH_ASSOC);
dump($reponse);
foreach ($reponse as $mail) {
    $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je voudrais vous prevenir que dans un mois vous devriez changer la courroie de distribution de votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
    $sunjet = 'Courroie de distribution';
    // $mail = mail($mail['email'], $sunject, $text_mail, $headers);
    $mail = $mail['email'] . $sunject . $text_mail . $headers;
    dump($mail);
}


/**
 * send an email to warn of the expiration of technical control
 */
foreach ($reponse as $mail) {
    $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je voudrais vous prevenir que dans un mois vous devriez passer le contrôle technique de votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
    $sunjet = 'Contrôle technique';
    // $mail = mail($mail['email'], $sunject, $text_mail, $headers);
    $mail = $mail['email'] . $sunject . $text_mail . $headers;
    dump($mail);
}







/**
 * send an email to warn of the expiration of km-timing-belt
 */
$km = 1000;
$sql = "SELECT km FROM invfuel WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invtechnical WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invinsurance WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invoil WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invpneu WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invtiming WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invtoll WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km ORDER BY km DESC LIMIT 1";
$data = [
    ':id_car' => $_SESSION['car']['id_car'],
];
$request = $db->prepare($sql);
$request->execute($data);
$timingBelt = $request->fetchAll(PDO::FETCH_ASSOC);
dump($result);
foreach ($timingBelt as $mail) {
    $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je voudrais vous prevenir que dans 1000 km vous devriez change la courrioe de distribution de votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
    $sunjet = 'Courroi de distribution';
    // $mail = mail($mail['email'], $sunject, $text_mail, $headers);
    $mail = $mail['email'] . $sunject . $text_mail . $headers;
    dump($mail);
}





$km = 1000;

$sql = "SELECT km FROM invfuel WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invtechnical WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invinsurance WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invoil WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invpneu WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invtiming WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invtoll WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km ORDER BY km DESC LIMIT 1";

$data = [
    ':id_car' => $_SESSION['car']['id_car'],
];
$request = $db->prepare($sql);
$request->execute($data);
$timingBelt = $request->fetchAll(PDO::FETCH_ASSOC);
