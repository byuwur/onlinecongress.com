<?php
    $s="localhost";
    $u="User_Covaite";
    $p="eD@241FLO?4R3";
    $b="covaite";

    $conex = new mysqli($s, $u, $p, $b) or die('No se pudo conectar a la Base de Datos');
    mysqli_set_charset($conex, "utf8");
    if ($conex->connect_errno) {
        printf("Conncect failed: %s\n", $conex->connect_error);
        exit();
    }
?>