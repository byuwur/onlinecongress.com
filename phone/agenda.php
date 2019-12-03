<?php
include_once 'conectar_bd.php';
$pon=array();

if (isset($_GET['congreso']) || isset($_GET['categoria'])){
	$congreso = $_GET['congreso'];
	$categoria = $_GET['categoria'];
}

$sql = $conex->query("SELECT IdPonencia FROM ponente WHERE Id_Congreso='$congreso' ");
$i = 0;
while($row = mysqli_fetch_assoc($sql)){
	$res= $conex->query("SELECT * FROM ponencia WHERE IdPonencia = '$row[IdPonencia]' AND Estado = '1' ORDER BY `Fecha` ASC ");
	$rowres = mysqli_fetch_object($res);
	$pon[$i]=$rowres;
	$idcat = $pon[$i] -> Categoria;
    $sqlarray = mysqli_fetch_assoc( $conex -> query("SELECT * FROM categorias WHERE Id='$idcat' ") );
    $nomcat = $sqlarray['Categoria'];
	$pon[$i] -> NombreCategoria = $nomcat;
	$i++;
}

echo json_encode($pon);
?>