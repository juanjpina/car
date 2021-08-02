<?php



if (!empty($_POST['trademark'])) {



    $data = [
        ':id_user' => $_SESSION['auth']['id_user'],
        ':trademark' => $_POST['trademark'],

    ];

    $sql = 'INSERT INTO car (id_user, trademark) VALUES (:id_user, :trademark)';

    $request = $db->prepare($sql);
    $result = $request->execute($data);
}
