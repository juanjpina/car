<?php
if (!empty($_POST['trademark'])) {

    $data = [
        ':id_user' => $_SESSION['auth']['id_user'],
        ':trademark' => $_POST['trademark'],

    ];
    $sql = 'INSERT INTO car (id_user, trademark) VALUES (:id_user, :trademark)';
    $request1 = $db->prepare($sql);
    $result1 = $request1->execute($data);

    $data = array(
        ':id_user' =>
        $_SESSION['auth']['id_user']
    );
    $sql = 'SELECT id_car FROM car where id_user = :id_user';
    $request2 = $db->prepare($sql);
    $request2->execute($data);
    $result2 = $request2->fetchAll(PDO::FETCH_ASSOC);
    for ($i = count($result2) - 1; $i < count($result2); $i++) {
        $id_car = $result2[$i]['id_car'];
    }


    $data = [
        ':id_car' => (int)$id_car,
        ':date' => '2000-05-01',
        ':km' => 0
    ];
    $sql = 'INSERT INTO buy (id_car, date, km) VALUES (:id_car, :date, :km)';
    $request = $db->prepare($sql);
    $result = $request->execute($data);

    $sql = 'INSERT INTO firstregistration (id_car, date, km) VALUES (:id_car, :date, :km)';
    $request = $db->prepare($sql);
    $result = $request->execute($data);

    $sql = 'INSERT INTO oilchanges (id_car, date, km) VALUES (:id_car, :date, :km)';
    $request = $db->prepare($sql);
    $result = $request->execute($data);

    $sql = 'INSERT INTO technicalcontrol (id_car, date, km) VALUES (:id_car, :date, :km)';
    $request = $db->prepare($sql);
    $result = $request->execute($data);

    $sql = 'INSERT INTO timingbelt (id_car, date, km) VALUES (:id_car, :date, :km)';
    $request = $db->prepare($sql);
    $result = $request->execute($data);
}
