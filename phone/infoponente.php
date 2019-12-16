<?php

include_once 'conectar_bd.php';
$response=array();

if( isset($_GET['id']) ) {
	$id =$_GET['id'];
	$res= $conex -> query("SELECT Nombres, Apellidos, Telefono, Pais, ResumenPonente, Institucion, NivelFormacion FROM ponente WHERE IdPonencia='$id' ");
    $i = 0;
    while($row = mysqli_fetch_object($res)){
        $response[$i]=$row;
        $idcat = $row -> Pais;
        $sqlarray = mysqli_fetch_array( $conex -> query("SELECT * FROM paises WHERE id='$idcat' "));
        $nomcat = $sqlarray['name_pais'] . " (" . $sqlarray['sortname'] . ")";
        $response[$i] -> NombrePais = $nomcat;
        $i++;
	}
	echo json_encode($response);
	exit;
}
?>