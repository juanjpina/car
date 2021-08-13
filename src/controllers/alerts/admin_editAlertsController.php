<?php

/**
 * select car
 */
$cars = getCar($db);

// $_POST['car'];


function gettimmingBelt(PDO $db)
{
    if (!empty($_POST['car'])) {


        $data = array(
            ':id_car' => $_POST['car']
        );
        $sql = 'SELECT date, km FROM timingbelt where id_car = :id_car';
        $request = $db->prepare($sql);
        $request->execute($data);
        $timingbelt = $request->fetchAll(PDO::FETCH_ASSOC);
        //recupero la ultima fecha del cambio

        // dump('timing', $timingbelt);




        $data = array(
            ':id_car' => $_POST['car']
        );
        $sql = 'SELECT timingbeltDate, timingbeltKm FROM setting where id_car = :id_car';
        $request = $db->prepare($sql);
        $request->execute($data);
        $setting = $request->fetchAll(PDO::FETCH_ASSOC);
        //recupero el settting
        dump('setting', $setting);

        $data = array(
            ':id_car' => $_POST['car']
        );
        $sql = 'SELECT date FROM technicalcontrol where id_car = :id_car';
        $request = $db->prepare($sql);
        $request->execute($data);
        $technical = $request->fetchAll(PDO::FETCH_ASSOC);
        //recupero el settting
        // dump('technical', $technical);





        foreach ($technical as $tech) {
            foreach ($timingbelt as $timing) {
                foreach ($setting as $set) {

                    $kmSet = (int)$set['timingbeltKm'];
                    $km = (int)$timing['km'];
                    $total = $km + $kmSet;
                    //tendremos que hacer aqui un insert
                    //crear una tabla de alert cuando de creent todas las tablas

                    $dateSet = (int)$set['timingbeltDate'];
                    $date = $timing['date'];
                    dump('dateset', $dateSet);
                    dump('date', $date);

                    $dateControl = $tech['date'];

                    // dump('datecontrol', $dateControl);
                    // dump($_POST['car']);
                    $car = (int)$_POST['car'];
                    $data = [
                        ':id_car' => (int)$_POST['car'],
                        ':timingKm' => $total,
                        ':date' => $date,
                        ':dateSet' => $dateSet,
                        ':dateControl' => $dateControl,


                    ];
                    // $sql = "UPDATE alert SET timingKm = :timingKm, timingdate = :timingdate, controldate= :controldate WHERE id_car = :id_car";
                    // $sql = "UPDATE alert SET timingKm = $total, timingdate = DATE_ADD( $date, INTERVAL $dateSet YEAR), controldate=DATE_ADD( $dateControl, INTERVAL 4 YEAR) WHERE id_car = $car";
                    $sql = "UPDATE alert SET timingKm = :timingKm, timingdate = DATE_ADD( :date, INTERVAL :dateSet YEAR), controldate= DATE_ADD( :dateControl, INTERVAL 4 YEAR)  WHERE id_car = :id_car";
                    $request = $db->prepare($sql);
                    $result = $request->execute($data);

                    // DATE_ADD( curdate(), INTERVAL $period MONTH )
                }
            }
        }
        // dump('kmtotal', $total);
    }

    //hago la suma y los meto en la data base








};
gettimmingBelt($db);
