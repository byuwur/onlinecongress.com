<?php
include_once 'conectar_bd.php';
$pon=array();

$res= $conex->query("SELECT * FROM congreso");

while($row = mysqli_fetch_object($res)){
	$pon[]=$row;
}

echo json_encode($pon);
?>