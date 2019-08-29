<?php

include_once 'conectar_bd.php';
$ciudad=array();

//$provincia=8;
$error=false;

if( isset($_GET['provincia']) ) {

	$provincia =$_GET['provincia'];

	$res= $conex -> query("SELECT * FROM ciudades WHERE state_id='$provincia' ");

	while($row = mysqli_fetch_object($res)){
		$ciudad[]=$row;
	}

	echo json_encode($ciudad);

}
else{
	$error = true;
	$mensaje = "Seleccione una provincia.";
	$res = array('error' => $error, 'mensaje' => $mensaje);
	echo json_encode($res);
}

?>