<?php
include_once 'conectar_bd.php';

if( isset($_POST['id']) && isset($_POST['pass']) ) {

	if (!empty($_POST['id'])){
		$id = trim($_POST['id']);
		$id = strip_tags($id);
		$id = htmlspecialchars($id);
	}
	if (!empty($_POST['pass'])){
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
	}

	$queryverifpass = $conex->query(" SELECT * FROM asistente WHERE IdAsistente = '$id' AND Password = '$pass' ");
	$count = mysqli_num_rows($queryverifpass);
	if($count!=1){
		$error = true;
		$success = false;
		$mensaje = "Parece que algo salió mal. Intente más tarde";
		$res[] = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		echo json_encode($res);
		exit;
	}
	else {
		$row = mysqli_fetch_array($queryverifpass);
		$usrid=$row['IdAsistente'];
		$usrname=$row['NombresA'];
		$usrape=$row['ApellidosA'];
	    $usremail=$row['Email'];
	    $usrcel=$row['Telefono'];
	    $usrciudad=$row['Ciudad'];
		$usrrol=$row['Tipo'];
		$usrsex=$row['Genero'];
		$usrinst=$row['Institucion'];   
	    $usrpass=$row['Password'];

		$error = false;
		$success = true;
		
		$mensaje = "Continuar.";
		$res[] = array('error'=>$error, 'success' => $success, 'mensaje'=>$mensaje,'usrid'=>$usrid,'usrname'=>$usrname,'usrape'=>$usrape,'usremail'=>$usremail,'usrciudad'=>$usrciudad,'usrcel'=>$usrcel,'usrrol'=>$usrrol,'usrsex'=>$usrsex,'usrinst'=>$usrinst,'usrpass'=>$usrpass);
		echo json_encode($res);
		exit;
	}
}
?>