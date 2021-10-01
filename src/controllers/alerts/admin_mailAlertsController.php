<?php
$text_mail = '';
$recipient = 'utilisateur';
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content_type: text/html charset=iso-8859-1\r\n";
$headers .= "From: rdvoiture <red@rev.com>\r\n";


/**
 * send an email to warn of the expiration of timming-belt (1 month)
 */
$sql = "SELECT user.email, user.nickname, car.trademark ,invtiming.date FROM invtiming, user, car WHERE  DATE_SUB( curdate(), INTERVAL 1 MONTH ) = invtiming.date AND invtiming.id_car = car.id_car AND car.id_user = user.id_user ";
$request = $db->prepare($sql);
$request->execute();
$reponseA = $request->fetchAll(PDO::FETCH_ASSOC);
// dump($reponseA);

if ($reponseA) {
    foreach ($reponseA as $mail) {
        $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je voudrais vous prevenir que dans un mois vous devriez changer la courroie de distribution de votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
        $sunjet = 'Courroie de distribution';
        // $mail = mail($mail['email'], $sunject, $text_mail, $headers);
        $mail = $mail['email'] . $sunjet . $text_mail . $headers;
        // dump($mail);
    }
}


/**
 * send an email to warn of the expiration of technical control
 */
$sql = "SELECT user.email, car.trademark,user.nickname ,invtechnical.date FROM invtechnical, user, car WHERE  DATE_SUB( curdate(), INTERVAL 1 MONTH ) = invtechnical.date AND invtechnical.id_car = car.id_car AND car.id_user = user.id_user";
$request = $db->prepare($sql);
$request->execute();
$reponseB = $request->fetchAll(PDO::FETCH_ASSOC);
if ($reponseB) {
    foreach ($reponseB as $mail) {
        $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je voudrais vous prevenir que dans un mois vous devriez passer le contrôle technique de votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
        $sunjet = 'Contrôle technique';
        // $mail = mail($mail['email'], $sunject, $text_mail, $headers);
        $mail = $mail['email'] . $sunjet . $text_mail . $headers;
        // dump($mail);
    }
}


/**
 * send an email to warn of the expiration of km-timing-belt
 */
$car = getSelect($db, 'car');
foreach ($car as $c) {
    $c['id_car'];
    dump($c['id_car']);
    $km = 1000;
    // $sql = "SELECT km FROM invfuel WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invtechnical WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invinsurance WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invoil WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invpneu WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invtiming WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invtoll WHERE id_car=:id_car AND km>(SELECT alert.timingkm FROM alert WHERE alert.id_car=:id_car)-$km ORDER BY km DESC LIMIT 1";
    $sql = "SELECT max(km) as km FROM invfuel WHERE id_car=:id_car AND km >=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km)  FROM invtiming, setting WHERE setting.id_car=:id_car AND invfuel.id_car=:id_car) UNION SELECT max(km) as km FROM invtechnical WHERE id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming, setting WHERE setting.id_car=:id_car ) UNION SELECT max(km) as km FROM invinsurance WHERE id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming, setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invoil WHERE id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming,setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invpneu WHERE id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming,setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invtiming WHERE id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming,setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invtoll WHERE id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming,setting WHERE setting.id_car=:id_car) ORDER BY km DESC LIMIT 1";

    $data = [
        ':id_car' => $c['id_car'],
    ];
    $request = $db->prepare($sql);
    $request->execute($data);
    $reponseC = $request->fetchAll(PDO::FETCH_ASSOC);
    dump($reponseC);
    if ($reponseC[0]['km'] != null) {
        $data = [
            ':id_car' => $c['id_car'],
        ];
        $sql = "SELECT user.email, user.nickname, car.trademark FROM user, car WHERE car.id_car = :id_car AND user.id_user=car.id_user";
        $request = $db->prepare($sql);
        $request->execute($data);
        $reponseC = $request->fetchAll(PDO::FETCH_ASSOC);
        foreach ($reponseC as $mail) {
            $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je voudrais vous prevenir que dans 1000 km vous devriez change la courrioe de distribution de votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
            $sunjet = 'Courroie de distribution';
            // $mail = mail($mail['email'], $sunject, $text_mail, $headers);
            $mail = $mail['email'] . $sunjet . $text_mail . $headers;
            dump($mail);
        }
    }


    /**
     * send an email to warn of the expiration of oil change
     */
    $km = 1000;
    $sql = "SELECT max(km) as km FROM invfuel WHERE id_car=:id_car AND km >=(SELECT (setting.oilchanges+max(invoil.km)-$km)  FROM invoil, setting WHERE setting.id_car=:id_car AND invfuel.id_car=:id_car) UNION SELECT max(km) as km FROM invtechnical WHERE id_car=:id_car AND km>=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car= :id_car ) UNION SELECT max(km) as km FROM invinsurance WHERE id_car=:id_car AND km>=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invoil WHERE id_car=:id_car AND km>=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invpneu WHERE id_car=:id_car AND km>=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invtiming WHERE id_car=:id_car AND km>=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invtoll WHERE id_car=:id_car AND km>=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car) ORDER BY km DESC LIMIT 1";

    // $sql = "SELECT km FROM invfuel WHERE id_car=:id_car AND km>(SELECT alert.oilchangeskm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invtechnical WHERE id_car=:id_car AND km>(SELECT alert.oilchangeskm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invinsurance WHERE id_car=:id_car AND km>(SELECT alert.oilchangeskm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invoil WHERE id_car=:id_car AND km>(SELECT alert.oilchangeskm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invpneu WHERE id_car=:id_car AND km>(SELECT alert.oilchangeskm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invtiming WHERE id_car=:id_car AND km>(SELECT alert.oilchangeskm FROM alert WHERE alert.id_car=:id_car)-$km UNION SELECT km FROM invtoll WHERE id_car=:id_car AND km>(SELECT alert.oilchangeskm FROM alert WHERE alert.id_car=:id_car)-$km ORDER BY km DESC LIMIT 1";

    $data = [
        ':id_car' => $c['id_car'],
    ];
    $request = $db->prepare($sql);
    $request->execute($data);
    $reponseD = $request->fetchAll(PDO::FETCH_ASSOC);
    dump($reponseD);
    if ($reponseD[0]['km'] != null) {
        $data = [
            ':id_car' => $c['id_car'],
        ];
        $sql = "SELECT user.email, user.nickname, car.trademark FROM user, car WHERE car.id_car = :id_car AND user.id_user=car.id_user";
        $request = $db->prepare($sql);
        $request->execute($data);
        $reponseD = $request->fetchAll(PDO::FETCH_ASSOC);
        // dump($reponseC);
        foreach ($reponseD as $mail) {
            $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je voudrais vous prevenir que dans 1000 km vous devriez faire la vidange à votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
            $sunjet = 'Vidange';
            // $mail = mail($mail['email'], $sunject, $text_mail, $headers);
            $mail = $mail['email'] . $sunjet . $text_mail . $headers;
            dump($mail);
        }
    }
}
