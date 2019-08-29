<?php

include_once 'conectar_bd.php';
$provincias=array();

//$pais=8;
$error=false;

if( isset($_GET['pais']) ) {

	$pais =$_GET['pais'];

	$res= $conex -> query("SELECT * FROM provincias WHERE country_id='$pais' ");

	while($row = mysqli_fetch_object($res)){
		$provincias[]=$row;
	}

	echo json_encode($provincias);

}
else{
	$error = true;
	$mensaje = "Seleccione un pais.";
	$res = array('error' => $error, 'mensaje' => $mensaje);
	echo json_encode($res);
}

?>