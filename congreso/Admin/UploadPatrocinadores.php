<?php 		
			include("conexion.php");
			$Id_Congreso=$_POST['Id_Congreso'];


			@mkdir("../Fotografias/Patrocinadores/$Id_Congreso/", 0777 -R, TRUE);
			@chmod("../Fotografias/Patrocinadores/*", 0777);
			$extension = end(explode(".", $_FILES['archivo']['name']));
			$Ruta = "../Fotografias/Patrocinadores/".$Id_Congreso."/".basename(1).$extension; 

			$Ruta2 = "http://www.onlinecongress.com.co/Fotografias/Patrocinadores/".$Id_Congreso."/".basename(1).$extension;  
			$uploadedfileload2="true";


			move_uploaded_file(@$_FILES['file']['tmp_name'], $Ruta); 

			$file_name2=$_FILES[file][name];
			$NombreImagen2 = $file_name2;

			$Registro_Evento2 = "UPDATE patrocinadores SET Img='$Ruta2' where Id_Congreso='$Id_Congreso'";
			$conex->query($Registro_Evento2);
?>