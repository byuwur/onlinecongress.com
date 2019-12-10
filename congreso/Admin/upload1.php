<?php 		
			include("conexion.php");
			$Id_Congreso=$_POST['Id_Congreso'];


			@mkdir("../Fotografias/Logos_Congresos/$Id_Congreso/", 0777 -R, TRUE);
			@chmod("../Fotografias/Logos_Congresos/*", 0777);
			$extension = end(explode(".", $_FILES['archivo']['name']));
			$Ruta = "../Fotografias/Logos_Congresos/".$Id_Congreso."/".basename(1).$extension; 

			$Ruta2 = "http://experienciamotera.com/onlinecongress-web/congreso/Fotografias/Logos_Congresos/".$Id_Congreso."/".basename(1).$extension;  
			$uploadedfileload2="true";


			move_uploaded_file(@$_FILES['file']['tmp_name'], $Ruta); 

			$file_name2=$_FILES[file][name];
			$NombreImagen2 = $file_name2;

			$Registro_Evento2 = "UPDATE congreso SET Logo='$Ruta2' where Id_Congreso='$Id_Congreso'";
			$conex->query($Registro_Evento2);
?>