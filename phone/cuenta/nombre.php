<?php
include_once '../conectar_bd.php';

if( isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido'])) {

	if (!empty($_POST['id'])){
		$id = trim($_POST['id']);
		$id = strip_tags($id);
		$id = htmlspecialchars($id);
	}
	if (!empty($_POST['nombre'])){
		$nombre = trim($_POST['nombre']);
		$nombre = strip_tags($nombre);
		$nombre = htmlspecialchars($nombre);
	}
	if (!empty($_POST['apellido'])){
		$apellido = trim($_POST['apellido']);
		$apellido = strip_tags($apellido);
		$apellido = htmlspecialchars($apellido);
	} 
	if (empty($nombre)) {
		$error = true;
		$success = false;
		$mensaje = "Ingrese su nombre completo.";
		$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		$response[]=$res;
		echo json_encode($response);
		exit;
	} else if (strlen($nombre) < 2) {
		$error = true;
		$success = false;
		$mensaje = "Al menos dos caracteres en su nombre.";
		$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		$response[]=$res;
		echo json_encode($response);
		exit;
	}
	if (empty($apellido)) {
		$error = true;
		$success = false;
		$mensaje = "Ingrese su apellido completo.";
		$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		$response[]=$res;
		echo json_encode($response);
		exit;
	} else if (strlen($apellido) < 2) {
		$error = true;
		$success = false;
		$mensaje = "Al menos dos caracteres en su apellido.";
		$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		$response[]=$res;
		echo json_encode($response);
		exit;
	}
	$query = $conex->query(" UPDATE asistente SET NombresA = '$nombre', ApellidosA = '$apellido' WHERE IdAsistente='$id'; ");
	
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