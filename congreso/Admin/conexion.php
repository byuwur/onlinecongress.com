<?php
    $s="localhost";
    $u="root";
    $p="IaPRsxmKE7ok";
    $b="onlinecongress";

    $conex = new mysqli($s, $u, $p, $b) or die('No se pudo conectar a la Base de Datos');
    mysqli_set_charset($conex, "utf8");
    if ($conex->connect_errno) {
        printf("Conncect failed: %s\n", $conex->connect_error);
        exit();
    }
?>