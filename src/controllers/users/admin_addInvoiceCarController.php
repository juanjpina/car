<?php


function listType(PDO $db)
{

    $sql      = 'SELECT * FROM type_data';
    $request = $db->prepare($sql);
    $request->execute();
    $result = $request->fetchAll(PDO::FETCH_ASSOC);


    return $result;
}
$types = listType($db);
