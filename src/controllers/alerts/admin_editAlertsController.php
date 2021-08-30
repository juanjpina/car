<?php

/**
 * select car
 */
$cars = getCar($db);

$id_car = (int)$_SESSION['car']['id_car'];

function gettimmingBelt(PDO $db, $id_car)
{
    if (isset($id_car)) {
        $data = array(
            ':id_car' => $id_car
        );
        $sql = 'SELECT date, km FROM timingbelt where id_car = :id_car';
        $request = $db->prepare($sql);
        $request->execute($data);
        $timingbelt = $request->fetchAll(PDO::FETCH_ASSOC);

        $data = array(
            ':id_car' => $id_car
        );
        $sql = 'SELECT timingbeltDate, timingbeltKm FROM setting where id_car = :id_car';
        $request = $db->prepare($sql);
        $request->execute($data);
        $setting = $request->fetchAll(PDO::FETCH_ASSOC);

        $data = array(
            ':id_car' => $id_car
        );
        $sql = 'SELECT date FROM technicalcontrol where id_car = :id_car';
        $request = $db->prepare($sql);
        $request->execute($data);
        $technical = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach ($technical as $tech) {
            foreach ($timingbelt as $timing) {
                foreach ($setting as $set) {
                    $kmSet = (int)$set['timingbeltKm'];
                    $km = (int)$timing['km'];
                    $total = $km + $kmSet;
                    $dateSet = (int)$set['timingbeltDate'];
                    $date = $timing['date'];
                    $dateControl = $tech['date'];
                    $data = [
                        ':id_car' => (int)$id_car,
                        ':timingKm' => $total,
                        ':date' => $date,
                        ':dateSet' => $dateSet,
                        ':dateControl' => $dateControl,
                    ];
                    $sql = "UPDATE alert SET timingKm = :timingKm, timingdate = DATE_ADD( :date, INTERVAL :dateSet YEAR), controldate= DATE_ADD( :dateControl, INTERVAL 4 YEAR)  WHERE id_car = :id_car";
                    $request = $db->prepare($sql);
                    $result = $request->execute($data);
                    if (!$result) {
                        //error
                        die();
                    }
                }
            }
        }
    }
};
gettimmingBelt($db, $id_car);
function getAlerts(PDO $db, $id_car)
{
    if (!empty($id_car)) {

        $data = array(
            ':id_car' => $id_car,
        );
        $sql = "SELECT * FROM alert where id_car = :id_car";
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
};
$alerts = getAlerts($db, $id_car);
