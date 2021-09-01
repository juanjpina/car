<?php

$text_mail = '';
$recipient = 'utilisateur';
$sunject = '';
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content_type: text/html charset=iso-8859-1\r\n";
$headers .= "From: rdvoiture <red@rev.com>\r\n";

$mail = mail($recipient, $sunject, $text_mail, $headers);


$sql = "SELECT * FROM alert WHERE timingdate >= DATE_SUB('2021-09-01', INTERVAL 30 DAY);";
$request = $db->prepare($sql);
$request->execute();
$reponse = $request->fetchAll(PDO::FETCH_ASSOC);
