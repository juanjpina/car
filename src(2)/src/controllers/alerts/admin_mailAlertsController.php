<?php
$text_mail = '';
$recipient = 'utilisateur';
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content_type: text/html charset=iso-8859-1\r\n";
$headers .= "From: rdvoiture <aaa@gmail.com>\r\n";


/**
 * send an email to warn of the expiration of timming-belt (1 month)
 */

//******* Data base invtiming
try {
    $sql = "SELECT user.email, user.nickname, car.trademark , invtiming.date FROM invtiming, user, car, setting WHERE  curdate()= DATE_ADD( invtiming.date, INTERVAL (((setting.timingbeltDate-1)*12)+11) MONTH)
 AND invtiming.id_car = car.id_car AND car.id_user = user.id_user AND setting.id_car = car.id_car";
    $request = $db->prepare($sql);
    $request->execute();
    $reponseTiming = $request->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($reponseTiming)) {
        emailTiming($reponseTiming, $headers);
    } else {

        //******* Data base car
        $sql = "SELECT user.email, user.nickname, car.trademark, car.buyDate FROM setting, car, user WHERE  car.id_user = user.id_user AND setting.id_car = car.id_car AND curdate()= DATE_ADD( car.buyDate, INTERVAL (((setting.timingbeltDate-1)*12)+11) MONTH)";
        $request = $db->prepare($sql);
        $request->execute();
        $reponseCar = $request->fetchAll(PDO::FETCH_ASSOC);
        emailTiming($reponseCar, $headers);
    }
} catch (Exception $e) {
    header('Location: ' . $router->generate('executionError'));
} catch (PDOException $e) {
    header('Location: ' . $router->generate('executionError'));
} finally {
    $sql = null;
}

function emailTiming($reponse, $headers)
{
    foreach ($reponse as $mail) {
        $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je voudrais vous prevenir que dans un mois vous devriez changer la courroie de distribution de votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
        $sunjet = 'Courroie de distribution';
        $mails = $mail['email'] . $sunjet . $text_mail . $headers;
        dump('c', $mails);
    }
}
/***************************************************************************************************************************** */

/**
 * send an email to warn of the expiration of technical control
 */
/***** date base car first Date */
try {
    $sql = "SELECT user.email, car.trademark, user.nickname ,car.firstDate FROM user, car WHERE curdate() = DATE_ADD(car.firstDate, INTERVAL 47 MONTH) AND car.id_user = user.id_user";
    $request = $db->prepare($sql);
    $request->execute();
    $reponseCar = $request->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($reponseCar)) {
        emailTechical($reponseCar, $headers);
    } else {
        /****** data base invtechnical date  */
        $sql = "SELECT user.email, car.trademark,user.nickname ,invtechnical.date FROM invtechnical, user, car WHERE  curdate() = DATE_ADD(invtechnical.date, INTERVAL 23 MONTH) AND invtechnical.id_car = car.id_car AND car.id_user = user.id_user";
        $request = $db->prepare($sql);
        $request->execute();
        $reponseTechnical = $request->fetchAll(PDO::FETCH_ASSOC);
        emailTechical($reponseTechnical, $headers);
    }
} catch (Exception $e) {
    header('Location: ' . $router->generate('executionError'));
} catch (PDOException $e) {
    header('Location: ' . $router->generate('executionError'));
} finally {
    $sql = null;
}


function emailTechical($emails, $headers)
{
    foreach ($emails as $mail) {
        $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je voudrais vous prevenir que dans un mois vous devriez passer le contrôle technique de votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
        $sunjet = 'Contrôle technique';
        $mails = $mail['email'] . $sunjet . $text_mail . $headers;
    }
}


/**
 * send an email to warn of the expiration of km-timing-belt
 */
$car = getSelect($db, 'car');
foreach ($car as $c) {
    $c['id_car'];
    $km = 1000;
    try {
        $sql = "SELECT max(km) as km FROM invfuel WHERE id_car=:id_car AND km >=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km)  FROM invtiming, setting WHERE setting.id_car=:id_car AND invfuel.id_car=:id_car) UNION SELECT max(km) as km FROM invtechnical WHERE id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming, setting WHERE setting.id_car=:id_car ) UNION SELECT max(km) as km FROM invinsurance WHERE id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming, setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invoil WHERE id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming,setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invpneu WHERE id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming,setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invtiming WHERE id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming,setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invtoll WHERE id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming,setting WHERE setting.id_car=:id_car) ORDER BY km DESC LIMIT 1";
        $data = [
            ':id_car' => $c['id_car'],
        ];
        $request = $db->prepare($sql);
        $request->execute($data);
        $reponseC = $request->fetchAll(PDO::FETCH_ASSOC);
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
                $mails = $mail['email'] . $sunjet . $text_mail . $headers;
            }
        }
    } catch (Exception $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } finally {
        $sql = null;
    }

    /**
     * send an email to warn of the expiration of oil change
     */
    $km = 1000;
    try {
        $sql = "SELECT max(km) as km FROM invfuel WHERE id_car=:id_car AND km >=(SELECT (setting.oilchanges+max(invoil.km)-$km)  FROM invoil, setting WHERE setting.id_car=:id_car AND invfuel.id_car=:id_car) UNION SELECT max(km) as km FROM invtechnical WHERE id_car=:id_car AND km>=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car= :id_car ) UNION SELECT max(km) as km FROM invinsurance WHERE id_car=:id_car AND km>=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invoil WHERE id_car=:id_car AND km>=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invpneu WHERE id_car=:id_car AND km>=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invtiming WHERE id_car=:id_car AND km>=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car) UNION SELECT max(km) as km FROM invtoll WHERE id_car=:id_car AND km>=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car) ORDER BY km DESC LIMIT 1";

        $data = [
            ':id_car' => $c['id_car'],
        ];
        $request = $db->prepare($sql);
        $request->execute($data);
        $reponseD = $request->fetchAll(PDO::FETCH_ASSOC);
        if ($reponseD[0]['km'] != null) {
            $data = [
                ':id_car' => $c['id_car'],
            ];
            $sql = "SELECT user.email, user.nickname, car.trademark FROM user, car WHERE car.id_car = :id_car AND user.id_user=car.id_user";
            $request = $db->prepare($sql);
            $request->execute($data);
            $reponseD = $request->fetchAll(PDO::FETCH_ASSOC);
            foreach ($reponseD as $mail) {
                $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je voudrais vous prevenir que dans 1000 km vous devriez faire la vidange à votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
                $sunjet = 'Vidange';
                $mails = $mail['email'] . $sunjet . $text_mail . $headers;
            }
        }
    } catch (Exception $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
        die();
    } finally {
        $sql = null;
    }
}
