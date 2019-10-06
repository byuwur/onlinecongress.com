<?php

include_once 'conectar_bd.php';
$response=array();

if( isset($_GET['id']) ) {
	$id =$_GET['id'];
    $res = $conex -> query("SELECT * FROM ponencia WHERE IdPonencia='$id' ");
    $i = 0;
	while($row = mysqli_fetch_object($res)){
        $response[$i]=$row;
        $idcat = $row -> Categoria;
        $sqlarray = mysqli_fetch_array( $conex -> query("SELECT * FROM categorias WHERE Id='$idcat' "));
        $nomcat = $sqlarray['Categoria'];
        $response[$i] -> NombreCategoria = $nomcat;
        $i++;
	}
	echo json_encode($response);
	exit;
}
?>