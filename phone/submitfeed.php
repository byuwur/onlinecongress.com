<?php
include_once 'conectar_bd.php';

if( isset($_POST['correo']) && isset($_POST['feed']) ) {

	if (!empty($_POST['correo'])){
		$correo = trim($_POST['correo']);
		$correo = strip_tags($correo);
		$correo = htmlspecialchars($correo);
	}
	if (!empty($_POST['nombre'])){
		$name = trim($_POST['nombre']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
	}
	if (!empty($_POST['asunto'])){
		$asunto = trim($_POST['asunto']);
		$asunto = strip_tags($asunto);
		$asunto = htmlspecialchars($asunto);
	}
	if (!empty($_POST['feed'])){
		$feed = trim($_POST['feed']);
		$feed = strip_tags($feed);
		$feed = htmlspecialchars($feed);
	}
	if (empty($feed)) {
		$error = true;
		$success = false;
		$mensaje = "Por favor, escriba su mensaje.";
		$res = array('error' => $error, 'mensaje' => $mensaje, 'success' => $success);
		$response[]=$res;
		echo json_encode($response);
		exit;
	}

	$arr_mnm= ["atrujillo66@itfip.edu.co"];
    $mail_mnm = implode(",", $arr_mnm);
    $mail_asunto = $asunto." | OnlineCongressApp, de".$name;

    $mail_header = "From: ".$correo."\r\n"
        ."MIME-Version: 1.0\r\n"
        ."Content-type: text/html; charset=iso-8859-1\r\n";

    $mail_msg=' <html> <head> <title> Contactar a MNM </title> </head> <body>
        <p>Hola: <br><br>Soy <strong>'.$name.'</strong>.</p>
        <p>Pueden contactarme en: <strong>'.$correo.'</strong> o llamarme al: <strong>'.$s_phone.'</strong>.</p>
        Necesito decirles que:<br>
        '.$message.'
        <br><br><br>Gracias.<br><br>Atentamente, '.$name.'.
    </body> </html> ';

    $mail = @mail($mail_mnm, $mail_asunto, $mail_msg, $mail_header);
	
	if ($mail) {
		$error = false;
		$success = true;
		$mensaje = "Gracias por su apoyo. Su mensaje se ha subido.";
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