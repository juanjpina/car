<?php

// if (isset($_POST['mail'])) {
// dump($_POST['mail']);

$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$password = "";
//Reconstruimos la contraseña segun la longitud que se quiera
for ($i = 0; $i < 8; $i++) {
    //obtenemos un caracter aleatorio escogido de la cadena de caracteres
    $password .= substr($str, rand(0, 62), 1);
}
//Mostramos la contraseña generada
// echo 'Password generado: ' . $password;

dump($password);

$data = [
    ':password' => password_hash($password, PASSWORD_DEFAULT),
    ':id_user' => $_SESSION['auth']['id_user'],
];

$sql = "UPDATE user SET password= :password WHERE id_user = :id_user";
$request = $db->prepare($sql);
$request->execute($data);
dump($request);
// }
