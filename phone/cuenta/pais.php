<?php
include_once '../conectar_bd.php';

if( isset($_POST['id']) && isset($_POST['pais']) ) {

	if (!empty($_POST['id'])){
		$id = trim($_POST['id']);
		$id = strip_tags($id);
		$id = htmlspecialchars($id);
	}
	if (!empty($_POST['pais'])){
		$pais = trim($_POST['pais']);
		$pais = strip_tags($pais);
		$pais = htmlspecialchars($pais);
	}
	if (empty($pais)) {
		$error = true;
		$success = false;
		$mensaje = "Ingrese una pais.";
		$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		$response[]=$res;
		echo json_encode($response);
		exit;
	}
	$query = $conex->query(" UPDATE asistente SET Pais = '$pais' WHERE IdAsistente='$id'; ");
	
	if ($query) {
		$error = false;
		$success = true;
		$mensaje = "Registro actualizado.";
		$res[] = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		echo json_encode($res);
		exit;
	}
	else {
		$error=true;
		$success = false;
	    $mensaje = "Algo salió mal. Intente más tarde.";
	    $res[] = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		echo json_encode($res);
		exit;
	}
}
?>