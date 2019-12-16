<?php
include_once 'conectar_bd.php';
$pais=array();

if (isset($_GET['congreso']) || isset($_GET['categoria'])){
	$congreso = $_GET['congreso'];
	$categoria = $_GET['categoria'];
}

$res= $conex->query("SELECT * FROM ponencia WHERE Tipo = 0 AND IdCongreso = '$congreso' AND Estado = '1' ");
$i = 0;
while($row = mysqli_fetch_object($res)){
	$pais[$i]=$row;
	$idcat = $row -> Categoria;
    $sqlarray = mysqli_fetch_array( $conex -> query("SELECT * FROM categorias WHERE Id='$idcat' "));
    $nomcat = $sqlarray['Categoria'];
	$pais[$i] -> NombreCategoria = $nomcat;
	$i++;
}

echo json_encode($pais);
?>