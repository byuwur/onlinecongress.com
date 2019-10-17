<?php 		
			include("conexion.php");
			$IDI=$_POST['IDI'];

			@mkdir("../../Header/$IDI/", 0777 -R, TRUE);
			@chmod("../../Header/*", 0777);
			$extension = end(explode(".", $_FILES['archivo']['name']));
			$Ruta = "../../Header/".$IDI."/".basename(2).$extension; 

			$Ruta2 = "http://sara.com.co/Header/".$IDI."/".basename(2).$extension;  
			$uploadedfileload2="true";


			move_uploaded_file(@$_FILES['file']['tmp_name'], $Ruta); 

			$file_name2=$_FILES[file][name];
			$NombreImagen2 = $file_name2;

			$Registro_Evento2 = "UPDATE slider SET Imagen2='$Ruta2' where IDI='$IDI'";
			$conex->query($Registro_Evento2);	 
?>