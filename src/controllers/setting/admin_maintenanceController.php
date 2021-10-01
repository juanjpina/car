<?php

$id_car = getSessionCar($db, $router);

if (!empty($id_car)) {


    /**
     * Get timing-belt of the data base
     */
    function dbTiming(PDO $db, $id_car)
    {
        $data = [
            ':id_car' => $id_car
        ];
        $sql = 'SELECT date, km FROM invtiming where (id_car = :id_car) ORDER by date DESC LIMIT 1';
        $request = $db->prepare($sql);
        $request->execute($data);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            $data = [
                ':id_car' => $id_car
            ];
            $sql = 'SELECT buyDate as date, buykm as km  FROM car where (id_car = :id_car)';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            return $result;
            dump($result);
        }
    }
    $timing = dbTiming($db, $id_car);


    /**
     * Get technical control of the base data
     */
    function dbTechnical(PDO $db, $id_car)
    {
        if (!empty($id_car)) {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM invtechnical where (id_car = :id_car) ORDER BY date DESC LIMIT 1 ';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            } else {
                $sql = 'SELECT buyDate as date, buykm as km FROM car where (id_car = :id_car) ';
                $request = $db->prepare($sql);
                $request->execute($data);
                $result = $request->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        }
    }
    $technical = dbTechnical($db, $id_car);


    /**
     * Get oil changes of the data base
     */
    function dbOil(PDO $db, $id_car)
    {
        if (!empty($id_car)) {
            $data = array(
                ':id_car' => $id_car
            );
            $sql = 'SELECT date, km FROM invoil where (id_car = :id_car) ORDER by date DESC LIMIT 1';
            $request = $db->prepare($sql);
            $request->execute($data);
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            } else {
                return ([
                    'date' => '2021-01-01',
                    'km' => '0'
                ]);
            }
        }
    }
    $oil = dbOil($db, $id_car);
}
