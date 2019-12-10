<?php 
	include("conexion.php");

	$Comentario = $_POST['NComentario'];
	$IdPonencia = $_POST['IdP'];
	$IdUsuario = $_POST['IdU'];
	date_default_timezone_set('America/Bogota'); 
	$Fecha=date("Y-m-d");
	$Consulta = $conex->query("INSERT INTO Comentarios VALUES('','$IdPonencia','$IdUsuario','$Comentario','$Fecha')");
	$Res = array('Guardo' => '1');
	echo json_encode($Res);
?>