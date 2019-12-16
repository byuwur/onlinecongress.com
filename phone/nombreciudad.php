<?php

include_once 'conectar_bd.php';
$response=array();

if( isset($_GET['ciudad']) ) {
	$ciudad =$_GET['ciudad'];
	$res= $conex -> query("SELECT name_ciu FROM ciudades WHERE id='$ciudad' ");
	while($row = mysqli_fetch_object($res)){
		$response[]=$row;
	}
	echo json_encode($response);
	exit;
}
?>