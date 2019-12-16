<?php
include_once '../conectar_bd.php';

if( isset($_POST['id']) && isset($_POST['sexo']) ) {

	if (!empty($_POST['id'])){
		$id = trim($_POST['id']);
		$id = strip_tags($id);
		$id = htmlspecialchars($id);
	}
	if (!empty($_POST['sexo'])){
		$sexo = trim($_POST['sexo']);
		$sexo = strip_tags($sexo);
		$sexo = htmlspecialchars($sexo);
	}
	if (empty($sexo)) {
		$error = true;
		$success = false;
		$mensaje = "Ingrese sexo.";
		$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		$response[]=$res;
		echo json_encode($response);
		exit;
	}
	$query = $conex->query(" UPDATE asistente SET Genero = '$sexo' WHERE IdAsistente='$id'; ");
	
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