<?php
	require_once 'conectar_bd.php';

	$error=false;
	$sesion=false;
	
	if (isset($_POST['email']) && isset($_POST['pass'])) {	
        // clean user inputs to prevent sql injections
        $email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		//
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		//verify field
		if(empty($email)){
			$error = true;
			$mensaje = "Ingrese su correo electrónico.";
			$res = array('error' => $error, 'mensaje' => $mensaje, 'sesion' => $sesion);
			$response[]=$res;
			echo json_encode($response);
			exit;
			//echo json_encode($res);
		}
		//verify field
		if(empty($pass)){
			$error = true;
			$mensaje = "Ingrese su contraseña.";
			$res = array('error' => $error, 'mensaje' => $mensaje, 'sesion' => $sesion);
			$response[]=$res;
			echo json_encode($response);
			exit;
			//echo json_encode($res);
		}
		// if there's no error, continue to login
		if (!$error) {
			$password = hash('md5', $pass); // password hashing using SHA256
			//PARA VERIFICAR EL CORREO ELECTRÓNICO
			$query=$conex->query("SELECT * FROM asistente WHERE Email='$email'");
			$row=mysqli_fetch_array($query);
			$count = mysqli_num_rows($query); // if uname/pass correct it returns must be 1 row

			if( $count == 1 && $row['Password']==$password ) {
            //SI TODO ES CORRECTO PARA QUE VERIFIQUE QUE INGRESE COMO ADMINISTRADOR PARA EVITAR QUE RESERVISTAS INGRESEN AL ENTORNO DE ADMINISTRADOR
                if ($row['Tipo'] != 2){
                   	$error=true;
	               	$mensaje = "Este usuario no es ASISTENTE. Si desea ingresar con otro rol, hágalo desde la página web de Online Congress.";
	                $res = array('error' => $error, 'mensaje' => $mensaje, 'sesion' => $sesion);
	                $response[]=$res;
					echo json_encode($response);
					exit;
					//echo json_encode($res);
                }
                else{
	                   	$mensaje = "Ha ingresado correctamente.";
	                   	$sesion=true;

						$usrid=$row['IdAsistente'];
						$usrtipodni=$row['TipoDocumentoA'];
						$usrdni=$row['DocumentoA'];
						$usrname=$row['NombresA'];
						$usrape=$row['ApellidosA'];
	                   	$usremail=$row['Email'];
	                   	$usrcel=$row['Telefono'];
	                   	$usrpais=$row['Pais'];
						$usrsex=$row['Genero'];
						$usrinst=$row['Institucion'];   
	                   	$usrpass=$row['Password'];
						$usrrol=$row['Tipo'];

						$res = array('error'=>$error,'mensaje'=>$mensaje,'sesion'=>$sesion,'usrid'=>$usrid,'usrtipodni'=>$usrtipodni,'usrdni'=>$usrdni,'usrname'=>$usrname,'usrape'=>$usrape,'usremail'=>$usremail,'usrpais'=>$usrpais,'usrcel'=>$usrcel,'usrrol'=>$usrrol,'usrsex'=>$usrsex,'usrinst'=>$usrinst,'usrpass'=>$usrpass);
						$response[]=$res;
						echo json_encode($response);
						exit;
					//echo json_encode($res);
                }
			}
		
			else {
				$password = hash('md5', $pass);
				//PARA VERIFICAR EL PIN SI NO SE INGRESA EL CORREO
	            $query=$conex->query("SELECT * FROM asistente WHERE IdAsistente='$email'");
				$row=mysqli_fetch_array($query);
				$count = mysqli_num_rows($query); // if uname/pass correct it returns must be 1 row

	            if( $count == 1 && $row['Password']==$password ) {
	            //SI TODO ES CORRECTO PARA QUE VERIFIQUE QUE INGRESE COMO ADMINISTRADOR PARA EVITAR QUE RESERVISTAS INGRESEN AL ENTORNO DE ADMINISTRADOR
	              	if ($row['Tipo']!=2){
	              		$error=true;
	                   	$mensaje = "Este usuario no es ASISTENTE. Si desea ingresar con otro rol, hágalo desde la página web de Online Congress.";
	                    $res = array('error' => $error, 'mensaje' => $mensaje, 'sesion' => $sesion);
	                    $response[]=$res;
						echo json_encode($response);
						exit;
						//echo json_encode($res);
	                }
	                else{
	                   	$mensaje = "Ha ingresado correctamente.";
	                   	$sesion=true;

	                   	$usrid=$row['IdAsistente'];
						$usrtipodni=$row['TipoDocumentoA'];
						$usrdni=$row['DocumentoA'];
						$usrname=$row['NombresA'];
						$usrape=$row['ApellidosA'];
	                   	$usremail=$row['Email'];
	                   	$usrcel=$row['Telefono'];
	                   	$usrpais=$row['Pais'];
						$usrsex=$row['Genero'];
						$usrinst=$row['Institucion'];   
	                   	$usrpass=$row['Password'];
						$usrrol=$row['Tipo'];

						$res = array('error'=>$error,'mensaje'=>$mensaje,'sesion'=>$sesion,'usrid'=>$usrid,'usrtipodni'=>$usrtipodni,'usrdni'=>$usrdni,'usrname'=>$usrname,'usrape'=>$usrape,'usremail'=>$usremail,'usrpais'=>$usrpais,'usrcel'=>$usrcel,'usrrol'=>$usrrol,'usrsex'=>$usrsex,'usrinst'=>$usrinst,'usrpass'=>$usrpass);
						$response[]=$res;
						echo json_encode($response);
						exit;
						//echo json_encode($res);
	                }
	            }
	            else {
	            	$error=true;
	                $mensaje = "Credenciales incorrectas. Intente de nuevo.";
	                $res = array('error' => $error, 'mensaje' => $mensaje, 'sesion' => $sesion);
	                $response[]=$res;
					echo json_encode($response);
					exit;
					//echo json_encode($res);
	            }
			}
		}	
	}		
	else {  
		$error=true;
		$mensaje = "Ingrese datos.";
		$res = array('error' => $error, 'mensaje' => $mensaje, 'sesion' => $sesion);
		$response[]=$res;
		echo json_encode($response);
		exit;
		//echo json_encode($res);
	}
