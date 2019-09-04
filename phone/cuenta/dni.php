<?php
include_once '../conectar_bd.php';

if( isset($_POST['id']) && isset($_POST['tipodni']) && isset($_POST['dni'])) {

	if (!empty($_POST['id'])){
		$id = trim($_POST['id']);
		$id = strip_tags($id);
		$id = htmlspecialchars($id);
	}
	if (!empty($_POST['tipodni'])){
		$tipodni = trim($_POST['tipodni']);
		$tipodni = strip_tags($tipodni);
		$tipodni = htmlspecialchars($tipodni);
	}
	if (!empty($_POST['dni'])){
		$dni = trim($_POST['dni']);
		$dni = strip_tags($dni);
		$dni = htmlspecialchars($dni);
	} 
	if (empty($tipodni)) {
		$error = true;
		$success = false;
		$mensaje = "Ingrese su tipodni completo.";
		$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		$response[]=$res;
		echo json_encode($response);
		exit;
	} else if (strlen($tipodni) < 2) {
		$error = true;
		$success = false;
		$mensaje = "Al menos dos caracteres en su tipodni.";
		$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		$response[]=$res;
		echo json_encode($response);
		exit;
	}
	if (empty($dni)) {
		$error = true;
		$success = false;
		$mensaje = "Ingrese su dni completo.";
		$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		$response[]=$res;
		echo json_encode($response);
		exit;
	} else if (strlen($dni) < 2) {
		$error = true;
		$success = false;
		$mensaje = "Al menos dos caracteres en su dni.";
		$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		$response[]=$res;
		echo json_encode($response);
		exit;
	}
	$query = $conex->query(" UPDATE asistente SET TipoDocumentoA = '$tipodni', DocumentoA = '$dni' WHERE IdAsistente='$id'; ");
	
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