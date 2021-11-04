<?php

header('content-type:text/css');

$nombre_variable1 = 'valor_variable1';
$nombre_variable2 = 'valor_variable2';
dump($_POST['auth']);
echo <<<FINCSS
selector {
  propiedad1: $nombre_variable1;
  propiedad2: $nombre_variable2;
}

    .graphic {
    width: 400px;
    height: 400px;
    border-radius: 50%;
    background-image: conic-gradient((#d94625 40%), (#8c641b 50% 70%), (#f3f3f3 50%)),
    }
FINCSS;
