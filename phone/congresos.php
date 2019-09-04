<?php
include_once 'conectar_bd.php';
$pais=array();

$res= $conex->query("SELECT * FROM congreso");

while($row = mysqli_fetch_object($res)){
	$pais[]=$row;
}

echo json_encode($pais);
?>