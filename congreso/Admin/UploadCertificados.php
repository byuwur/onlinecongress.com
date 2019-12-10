<?php 		
			include("conexion.php");
			$Id_Congreso=$_POST['Id_Congreso'];


			@mkdir("../Fotografias/Certificados/$Id_Congreso/", 0777 -R, TRUE);
			@chmod("../Fotografias/Certificados/*", 0777);
			
			$Ruta = "../Fotografias/Certificados/".$Id_Congreso."/".basename(1).".jpg"; 

			$Ruta2 = "http://experienciamotera.com/onlinecongress-web/congreso/Fotografias/Certificados/".$Id_Congreso."/".basename(1).".jpg";  
			$uploadedfileload2="true";


			move_uploaded_file(@$_FILES['file']['tmp_name'], $Ruta); 

			$file_name2=$_FILES[file][name];
			$NombreImagen2 = $file_name2;

			$Registro_Evento2 = "UPDATE certificados SET Img='$Ruta2' where Id_Congreso='$Id_Congreso'";
			$conex->query($Registro_Evento2);
?>