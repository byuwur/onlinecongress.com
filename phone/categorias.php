<?php
include_once 'conectar_bd.php';
$pon=array();

if (isset($_GET['congreso']) || isset($_GET['categoria'])){
	$congreso = $_GET['congreso'];
	$categoria = $_GET['categoria'];
}

$res= $conex->query("SELECT * FROM categorias WHERE Id_Congreso = '$congreso' ");

while($row = mysqli_fetch_object($res)){
	$pon[]=$row;
}

echo json_encode($pon);
?>