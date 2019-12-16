<?php

include_once 'conectar_bd.php';
$response=array();

if( isset($_GET['pais']) ) {
	$pais =$_GET['pais'];
	$res= $conex -> query("SELECT name_pais FROM paises WHERE id='$pais' ");
	while($row = mysqli_fetch_object($res)){
		$response[]=$row;
	}
	echo json_encode($response);
	exit;
}
?>