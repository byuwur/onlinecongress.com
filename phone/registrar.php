<?php
	ob_start();
	session_start();
	require_once 'conectar_bd.php';

	$error=false;
	$success=false;
	$mensaje="";

	if (( isset($_POST['tipodni']) && isset($_POST['dni']) && isset($_POST['name']) && isset($_POST['last']) && isset($_POST['sexo']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['ciudad']) ) && isset($_POST['inst']) || isset($_POST['phone'])) {
		//
		$tipodni = trim($_POST['tipodni']);
		$tipodni = strip_tags($tipodni);
		$tipodni = htmlspecialchars($tipodni);
		//
		$dni = trim($_POST['dni']);
		$dni = strip_tags($dni);
		$dni = htmlspecialchars($dni);
		// clean user inputs to prevent sql injections
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		//
		$last = trim($_POST['last']);
		$last = strip_tags($last);
		$last = htmlspecialchars($last);
		//
		$sexo = trim($_POST['sexo']);
		$sexo = strip_tags($sexo);
		$sexo = htmlspecialchars($sexo);
		//
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		//
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		//
		$ciudad = trim($_POST['ciudad']);
		$ciudad = strip_tags($ciudad);
		$ciudad = htmlspecialchars($ciudad);
		//
		$inst = trim($_POST['inst']);
		$inst = strip_tags($inst);
		$inst = htmlspecialchars($inst);
		//ciudad validation
		if (!empty($_POST['phone'])){
			$phone = trim($_POST['phone']);
			$phone = strip_tags($phone);
			$phone = htmlspecialchars($phone);
		}
		$_anio=date("Y");
		//random unique 6 char id
		$count = 1;
		while ($count!=0) {
			$chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
   			$randomString = '';
    		for ($i = 0; $i < 6; $i++) {
        		$randomString .= $chars[rand(0, strlen($chars) - 1)];
    		}
    		//id verification
			$query = $conex->query("SELECT IdAsistente FROM asistente WHERE IdAsistente='$randomString'");
			$count = mysqli_num_rows($query);
		}
		// basic name validation
		if (empty($name)) {
			$error = true;
			$mensaje = "Ingrese su nombre completo.";
			$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
			$response[]=$res;
			echo json_encode($response);
			exit;
		} else if (strlen($name) < 2) {
			$error = true;
			$mensaje = "Al menos dos caracteres en su nombre.";
			$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
			$response[]=$res;
			echo json_encode($response);
			exit;
		} /*else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$mensaje = "El nombre puede tener letras y espacios.";
			$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
			$response[]=$res;
			echo json_encode($response);
			exit;
		}*/
		// basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$mensaje = "Ingrese una dirección de correo electrónico válida.";
			$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
			$response[]=$res;
			echo json_encode($response);
			exit;
		} else {
			// check email exist or not
			$query = $conex->query("SELECT Email FROM asistente WHERE Email = '$email'");
			$count = mysqli_num_rows($query);
			if($count!=0){
				$error = true;
				$mensaje = "Este correo electrónico ya está registrado.";
				$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
				$response[]=$res;
				echo json_encode($response);
				exit;
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$mensaje = "Ingrese una contraseña.";
			$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
			$response[]=$res;
			echo json_encode($response);
			exit;
		} else if(strlen($pass) < 8) {
			$error = true;
			$mensaje = "La contraseña debe tener mínimo 8 caracteres.";
			$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
			$response[]=$res;
			echo json_encode($response);
			exit;
		}
 		//set reserver role
		$rol=2;
		// password encrypt using SHA256();
		$password = hash('md5', $pass);
		// if there's no error, continue to signup
		if( !$error ) {
			//ciudad validation
 			if (!empty($_POST['phone'])) {
				$query = $conex->query("INSERT INTO `asistente` (`IdAsistente`, `TipoDocumentoA`, `DocumentoA`, `NombresA`, `ApellidosA`, `Institucion`, `Genero`, `Email`, `Ciudad`, `Password`, `AñoA`, `Tipo`, `Telefono`)
				VALUES ('$randomString', '$tipodni', '$dni', '$name', '$last', '$inst', '$sexo', '$email', '$ciudad', '$password', '$_anio', '2', '$phone');");
 			}
			else{
				$query = $conex->query("INSERT INTO `asistente` (`IdAsistente`, `TipoDocumentoA`, `DocumentoA`, `NombresA`, `ApellidosA`, `Institucion`, `Genero`, `Email`, `Ciudad`, `Password`, `AñoA`, `Tipo`, `Telefono`)
				VALUES ('$randomString', '$tipodni', '$dni', '$name', '$last', '$inst', '$sexo', '$email', '$ciudad', '$password', '$_anio', '2', NULL);");
			}
			//register if it's all ok
			if ($query) {
				$error = false;
				$success = true;
				if(!empty($_POST['phone'])){
					$mensaje = "Registrado satisfactoriamente. Revise su correo electrónico para verificar su cuenta.\n\nSu ID es $randomString";
				}
				else{
					$mensaje = "Registrado satisfactoriamente. Revise su correo electrónico para verificar su cuenta.\n\nSu ID es $randomString\n\nConsidere modificar su ciudad para presentarle canchas cercanas.";
				}
				$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
				$response[]=$res;
				echo json_encode($response);
				exit;
			}
			else {
				$error=true;
	            $mensaje = "Algo salió mal. Intente más tarde.";
	            $res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
	            $response[]=$res;
				echo json_encode($response);
				exit;
			}	
		}
	}
	else {  
		$error=true;
		$mensaje = "Ingrese datos.";
		$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		$response[]=$res;
		echo json_encode($response);
		exit;
	}
?>