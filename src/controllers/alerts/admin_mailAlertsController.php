<?php
$text_mail = '';
$recipient = 'utilisateur';
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content_type: text/html charset=iso-8859-1\r\n";
$headers .= "From: Agenda voiture <juanjpina@gmail.com>\r\n";



/**
 * send an email to warn of the expiration of technical control
 */
/***** date base car first Date */

$car = getSelect($db, 'car');

foreach ($car as $technical) {
    try {
        $dataTechnical = [
            ':id_car' => $technical['id_car']
        ];

        $sql = "SELECT user.email, car.trademark, user.nickname ,MAX(car.firstDate) FROM user, car WHERE curdate() = DATE_ADD(car.firstDate, INTERVAL 47 MONTH) AND car.id_car = :id_car AND user.id_user = car.id_user";
        $request = $db->prepare($sql);
        $request->execute($dataTechnical);
        $reponseCar = $request->fetchAll(PDO::FETCH_ASSOC);
        if ($reponseCar[0]['email'] != null) {
            emailTechical($reponseCar, $headers);
        } else {
            /****** data base invtechnical date  */
            $sql = "SELECT user.email, car.trademark, user.nickname ,MAX(invtechnical.date) FROM invtechnical, user, car WHERE  curdate() = DATE_ADD(invtechnical.date, INTERVAL 23 MONTH) AND invtechnical.id_car = :id_car AND user.id_user = car.id_user";
            $request = $db->prepare($sql);
            $request->execute($dataTechnical);
            $reponseTechnical = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            emailTechical($reponseTechnical, $headers);
        }
    } catch (Exception $e) {
        header('Location: ' . $router->generate('executionError'));
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
    } finally {
        $sql = null;
    }
}

function emailTechical($emails, $headers)
{
    foreach ($emails as $mail) {
        if ($mail['email'] != null) {
            $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je vous averti que dans un mois vous devrez passer le contrôle technique de votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
            $sunjet = 'Alerte: Contrôle technique';
            $mails = $mail['email'] . $sunjet . $text_mail . $headers;
            dump($text_mail);
        }
    }
}


/**
 * send an email to warn of the expiration of km-timing-belt  ******************************************************
 */
$car = getSelect($db, 'car');
foreach ($car as $c) {
    $c['id_car'];
    $km = 1000;
    try {
        $sql = "SELECT max(km) as km FROM invfuel WHERE invfuel.id_car=:id_car AND km >=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km)  FROM invtiming, setting WHERE setting.id_car=:id_car AND invtiming.id_car=:id_car) UNION 
        SELECT max(km) as km FROM invtechnical WHERE invtechnical.id_car=:id_car AND km<=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming, setting WHERE setting.id_car=:id_car AND invtiming.id_car= :id_car) UNION 
        SELECT max(km) as km FROM invinsurance WHERE invinsurance.id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming, setting WHERE setting.id_car=:id_car AND invtiming.id_car=:id_car) UNION 
        SELECT max(km) as km FROM invoil WHERE invoil.id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming,setting WHERE setting.id_car=:id_car AND invtiming.id_car=:id_car) UNION 
        SELECT max(km) as km FROM invpneu WHERE invpneu.id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming,setting WHERE setting.id_car=:id_car AND invtiming.id_car=:id_car) UNION 
        SELECT max(km) as km FROM invtiming WHERE invtiming.id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming,setting WHERE setting.id_car=:id_car AND invtiming.id_car = :id_car) UNION 
        SELECT max(km) as km FROM invtoll WHERE invtoll.id_car=:id_car AND km>=(SELECT (setting.timingbeltKm+max(invtiming.km)-$km) FROM invtiming,setting WHERE setting.id_car=:id_car AND invtiming.id_car = :id_car)
         ORDER BY km DESC LIMIT 1";
        $dataKm = [
            ':id_car' => $c['id_car'],
        ];
        $request = $db->prepare($sql);
        $request->execute($dataKm);
        $reponseC = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        if (($reponseC)[0]['km'] != null) {
            $data = [
                ':id_car' => $c['id_car'],
            ];
            $sql = "SELECT user.email, user.nickname, car.trademark FROM user, car WHERE car.id_car = :id_car AND user.id_user=car.id_user";
            $request = $db->prepare($sql);
            $request->execute($data);
            $reponseC = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            foreach ($reponseC as $mail) {
                $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je vous alerte que dans 1000 km vous devrez changer la courroie de distribution de votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
                $sunjet = 'Alerte : Courroie de distribution';
                // $mails = $mail['email'] . $sunjet . $text_mail . $headers;
                dump($text_mail);
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
     * send an email to warn of the expiration of oil change   ******************************************************
     */
    $km = 1000;
    try {
        $sql = "SELECT max(km) as km FROM invfuel WHERE id_car=:id_car AND km >=(SELECT (setting.oilchanges+max(invoil.km)-$km)  FROM invoil, setting WHERE setting.id_car=:id_car AND invoil.id_car=:id_car) UNION 
        SELECT max(km) as km FROM invtechnical WHERE id_car=:id_car AND km >=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car= :id_car AND invoil.id_car=:id_car) UNION 
        SELECT max(km) as km FROM invinsurance WHERE id_car=:id_car AND km >=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car AND invoil.id_car=:id_car) UNION 
        SELECT max(km) as km FROM invoil WHERE id_car=:id_car AND km >=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car AND invoil.id_car=:id_car) UNION 
        SELECT max(km) as km FROM invpneu WHERE id_car=:id_car AND km >=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car AND invoil.id_car=:id_car) UNION 
        SELECT max(km) as km FROM invtiming WHERE id_car=:id_car AND km >=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car AND invoil.id_car=:id_car) UNION 
        SELECT max(km) as km FROM invtoll WHERE id_car=:id_car AND km >=(SELECT (setting.oilchanges+max(invoil.km)-$km) FROM invoil, setting WHERE setting.id_car=:id_car AND invoil.id_car=:id_car) ORDER BY km DESC LIMIT 1";


        $data = [
            ':id_car' => $c['id_car'],
        ];
        $request = $db->prepare($sql);
        $request->execute($data);
        $reponseD = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();

        // dump($reponseD);
        if ($reponseD[0]['km'] != null) {
            $data = [
                ':id_car' => $c['id_car'],
            ];
            $sql = "SELECT user.email, user.nickname, car.trademark FROM user, car WHERE car.id_car = :id_car AND user.id_user=car.id_user";
            $request = $db->prepare($sql);
            $request->execute($data);
            $reponseD = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            foreach ($reponseD as $mail) {
                $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je vous alerte que dans 1000 km vous devrez faire la vidange à votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
                $sunjet = 'Vidange';
                // $mails = $mail['email'] . $sunjet . $text_mail . $headers;
                dump('vidange km', $text_mail);
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






/**
 * send an email to warn of the expiration of timming-belt (1 month)  **************************************************
 */
//******* Select->car.
$car = getSelect($db, 'car');
foreach ($car as $carId) {
    try {
        //******* Data base invtiming
        $dataTiming = [
            ':id_car' => (int)$carId['id_car'],
        ];
        // dump((int)$carId['id_car']);
        // $sql = "SELECT  car.id_user, car.trademark  MAX(invtiming.date) FROM invtiming, car, setting WHERE  curdate() = DATE_ADD( MAX(invtiming.date), INTERVAL (((setting.timingbeltDate-1)*12)+11) MONTH) AND (invtiming.id_car = :id_car) AND (setting.id_car = :id_car) ";

        // $sql = "SELECT  invtiming.id_car, invtiming.date FROM invtiming  WHERE invtiming.date=(SELECT MAX(invtiming.date) FROM invtiming WHERE invtiming.id_car = :id_car)";
        $sql = "SELECT invtiming.id_car, invtiming.date FROM invtiming, setting  WHERE curdate()=DATE_ADD( (invtiming.date), INTERVAL (((setting.timingbeltDate-1)*12)+11) MONTH) AND invtiming.id_car=:id_car AND setting.id_car= :id_car";

        $request = $db->prepare($sql);
        $request->execute($dataTiming);
        $reponseTiming = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();

        if (!empty(($reponseTiming))) {
            // dump('1', $reponseTiming);
            emailTiming($db, $reponseTiming, $headers);
        } else {

            //************ Data base car
            // $sql = "SELECT user.email, user.nickname, car.id_user, car.trademark, car.buyDate FROM setting, car, user WHERE (setting.id_car = car.id_car) AND (user.id_user=car.id_user) AND curdate() = DATE_ADD( car.buyDate, INTERVAL (((setting.timingbeltDate-1)*12)+11) MONTH)";
            // $sql = "SELECT invtiming.id_car FROM invtiming, setting, car  WHERE curdate()=DATE_ADD( car.buyDate, INTERVAL (((setting.timingbeltDate-1)*12)+11) MONTH) AND invtiming.id_car=:id_car AND setting.id_car= :id_car";
            $sql = "SELECT car.id_car FROM invtiming, setting, car  WHERE curdate()=DATE_ADD( car.buyDate, INTERVAL (((setting.timingbeltDate-1)*12)+11) MONTH) AND car.id_car=:id_car AND setting.id_car= :id_car";
            $request = $db->prepare($sql);
            $request->execute($dataTiming);

            $reponseCar = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            // dump('2', $reponseCar);
            if (!empty($reponseCar)) {
                emailTiming($db, $reponseCar, $headers);
            }
        }
    } catch (Exception $e) {
        header('Location: ' . $router->generate('executionError'));
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
    } finally {
        $sql = null;
    }
}


function emailTiming(PDO $db, $reponse, $headers, AltoRouter $router)
{
    try {
        $dataUser = [
            ':id_car' => $reponse[0]['id_car']
        ];
        $sql = "SELECT car.id_user, user.email, user.nickname, car.trademark FROM user, car WHERE car.id_car =:id_car AND car.id_user=user.id_user";
        $request = $db->prepare($sql);
        $request->execute($dataUser);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        // dump($result);
        foreach ($result as $mail) {
            $text_mail = 'Bonjour, M. Mme. ' . $mail['nickname'] . ' je vous averti que dans un mois vous devrez changer la courroie de distribution de votre véhicule ' . $mail['trademark'] . ' Bien cordialement.';
            $sunjet = 'Alerte : Courroie de distribution';
            $mails = $mail['email'] . $sunjet . $text_mail . $headers;
            dump('curroie', $text_mail);
        }
    } catch (Exception $e) {
        header('Location: ' . $router->generate('executionError'));
    } catch (PDOException $e) {
        header('Location: ' . $router->generate('executionError'));
    } finally {
        $sql = null;
    }
}
