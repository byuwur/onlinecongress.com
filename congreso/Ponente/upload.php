<?php 		
			include("conexion.php");
			$Id_Ponencia=$_POST["IDP"];
	

		if( $_FILES['file']['size'] > 50000000 ) {
			  echo "No se pueden subir archivos con pesos mayores a 1MB";
			} else {
			@mkdir("Fotografias/$Id_Ponencia/", 0777 -R, TRUE);
			@chmod("Fotografias/*", 0777);
			$files = glob('Fotografias/$Id_Ponencia/*'); //obtenemos todos los nombres de los ficheros
				foreach($files as $file){
				    if(is_file($file))
				    unlink($file); //elimino el fichero
			}
			
			$nombre_archivo = $_FILES['file']['name'];
			$Ruta = "Fotografias/".$Id_Ponencia; 
			move_uploaded_file($_FILES ['file']['tmp_name'], $Ruta.'/'.$_FILES ['file']['name']);
			list($nombre, $ext) = explode(".", $nombre_archivo);
			$nombre_actual = "$Id_Ponencia"."."."$ext";
			rename($Ruta.'/'.$_FILES ['file']['name'],$Ruta.'/'.$nombre_actual);

			$Ruta2 = "http://covaite.com/Ponente/".$Ruta.'/'.$nombre_actual; 
			$uploadedfileload2="true";
	
			$Registro_Evento = "UPDATE Ponente SET Fotografia='$Ruta2' where IdPonencia='$Id_Ponencia'";
			$conex->query($Registro_Evento);
		}  
?>