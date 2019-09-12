<?php
include_once 'conectar_bd.php';
$pais=array();

if (isset($_GET['congreso']) || isset($_GET['categoria'])){
	$congreso = $_GET['congreso'];
	$categoria = $_GET['categoria'];
}

$res= $conex->query("SELECT * FROM ponencia WHERE IdCongreso = '$congreso' AND Categoria = '$categoria' ");

while($row = mysqli_fetch_object($res)){
	$pais[]=$row;
}

echo json_encode($pais);
?>