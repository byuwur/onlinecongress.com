<?php
include_once 'conectar_bd.php';
$pais=array();

if (isset($_GET['congreso'])){
	$congreso = $_GET['congreso'];
}

$res= $conex->query("SELECT * FROM notificaciones WHERE IdCongreso = '$congreso' ORDER BY FechaNotificacion DESC ");

while($row = mysqli_fetch_object($res)){
	$pais[]=$row;
}

echo json_encode($pais);
?>