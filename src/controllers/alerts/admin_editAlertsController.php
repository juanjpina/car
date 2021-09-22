<?php

/**
 * select car
 */
// $cars = getCar($db);

$id_car = getSessionCar($db, $router);

/**
 * get information database.
 * update database alert. 
 */
// function gettimmingBelt(PDO $db, $id_car)
// {
//     if (isset($id_car)) {
//         $data = array(
//             ':id_car' => $id_car
//         );
//         $sql = 'SELECT date, km FROM timingbelt where id_car = :id_car';
//         $request = $db->prepare($sql);
//         $request->execute($data);
//         $timingbelt = $request->fetchAll(PDO::FETCH_ASSOC);

//         $data = array(
//             ':id_car' => $id_car
//         );
//         $sql = 'SELECT timingbeltDate, timingbeltKm, oilchanges FROM setting where id_car = :id_car';
//         $request = $db->prepare($sql);
//         $request->execute($data);
//         $setting = $request->fetchAll(PDO::FETCH_ASSOC);

//         $data = array(
//             ':id_car' => $id_car
//         );
//         $sql = 'SELECT date FROM technicalcontrol where id_car = :id_car';
//         $request = $db->prepare($sql);
//         $request->execute($data);
//         $technical = $request->fetchAll(PDO::FETCH_ASSOC);

//         $data = array(
//             ':id_car' => $id_car
//         );
//         $sql = 'SELECT km FROM oilchanges where id_car = :id_car ORDER BY date DESC LIMIT 1';
//         $request = $db->prepare($sql);
//         $request->execute($data);
//         $oilchangeskm = $request->fetchAll(PDO::FETCH_ASSOC);


//         foreach ($technical as $tech) {
//             foreach ($timingbelt as $timing) {
//                 foreach ($setting as $set) {
//                     $kmSet = (int)$set['timingbeltKm'];
//                     $km = (int)$timing['km'];
//                     $total = $km + $kmSet;
//                     $dateSet = (int)$set['timingbeltDate'];
//                     $date = $timing['date'];
//                     $dateControl = $tech['date'];
//                     $data = [
//                         ':id_car' => (int)$id_car,
//                         ':timingKm' => $total,
//                         ':date' => $date,
//                         ':dateSet' => $dateSet,
//                         ':dateControl' => $dateControl,
//                         ':oilchangeskm' => (int)$oilchangeskm[0]['km'] + (int)$setting[0]['oilchanges'],
//                     ];
//                     $sql = "UPDATE alert SET timingKm = :timingKm, timingdate = DATE_ADD( :date, INTERVAL :dateSet YEAR), controldate= DATE_ADD( :dateControl, INTERVAL 4 YEAR), oilchangeskm= :oilchangeskm  WHERE id_car = :id_car";
//                     $request = $db->prepare($sql);
//                     $result = $request->execute($data);
//                     if (!$result) {
//                         //error
//                         die();
//                     }
//                 }
//             }
//         }
//     }
// };
// gettimmingBelt($db, $id_car);


/**
 * takes the data to present in the view. 
 */
// function getAlerts(PDO $db, $id_car)
// {
//     if (!empty($id_car)) {
//         $data = array(
//             ':id_car' => $id_car,
//         );
//         $sql = "SELECT * FROM alert where id_car = :id_car";
//         $request = $db->prepare($sql);
//         $request->execute($data);
//         $result = $request->fetchAll(PDO::FETCH_ASSOC);
//         return $result;
//     }
// };
// $alerts = getAlerts($db, $id_car);


/**
 * this function returns the date of the next technical control
 * @param PDO
 * @return array
 * 
 */
function getControl(PDO $db)
{
    if (!empty($_SESSION['car']['id_car'])) {

        $data = [
            'id_car' => $_SESSION['car']['id_car'],
        ];
        $sql = 'SELECT DATE_ADD(date, INTERVAL 4 year) as datetechnical FROM invtechnical WHERE invtechnical.id_car = :id_car ORDER BY date DESC LIMIT 1';
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            $varDate = array(array());
            $varDate[0]["datetechnical"] = "2000-01-01";
            return $varDate;
            // return array("datetechnical" => "0000-00-00");
        }
    };
};
$getControl = getControl($db);

/**
 * this function returns the mileage of the next oil change.
 * @param PDO
 * @return array
 */
function getOil(PDO $db)
{
    if (!empty($_SESSION['car']['id_car'])) {
        $data = [
            'id_car' => $_SESSION['car']['id_car'],
        ];
        $sql = 'SELECT invoil.km+setting.oilchanges as oil FROM `invoil`,`setting` WHERE invoil.id_car= :id_car ORDER by date DESC limit 1';
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            $varOil = array(array());
            $varOil[0]["oil"] = "0";
            return $varOil;
            // return array("oil" => "0");
        }
    }
};
$getOil = getOil($db);

/**
 * this function returns the mileage of the next distribution belt change
 * @param PDO
 * @return array
 */
function getTimingKm(PDO $db)
{
    if (!empty($_SESSION['car']['id_car'])) {
        $data = [
            'id_car' => $_SESSION['car']['id_car']
        ];
        $sql = 'SELECT invtiming.km+setting.timingbeltKm as km FROM `invtiming`,`setting` WHERE invtiming.id_car= :id_car ORDER by date DESC limit 1
';

        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            $varKm = array(array());
            $varKm[0]["km"] = "0";
            return $varKm;
            // return array("km" => "0");
        }
    }
};
$getTimingKm = getTimingKm($db);

/**
 *this function returns the date of the next distribution belt change
 *@param PDO
 *@return array 
 */
function getTimingDate(PDO $db)
{
    if (!empty($_SESSION['car']['id_car'])) {
        $data = [
            'id_car' => $_SESSION['car']['id_car']
        ];
        $sql = 'SELECT DATE_ADD(date, INTERVAL setting.timingbeltDate year) as dates FROM invtiming, setting WHERE invtiming.id_car = :id_car ORDER BY date DESC LIMIT 1
';
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            $varDate = array(array());
            $varDate[0]["dates"] = "2000-01-01";
            return $varDate;
        }
    }
};
$getTimingDate = getTimingDate($db);
