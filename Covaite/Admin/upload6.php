<?php 		
			include("conexion.php");
			$Id_Congreso=$_POST['Id_Congreso'];


			@mkdir("../Fotografias/Auspiciantes/$Id_Congreso/", 0777 -R, TRUE);
			@chmod("../Fotografias/Auspiciantes/*", 0777);
			$extension = end(explode(".", $_FILES['archivo']['name']));
			$Ruta = "../Fotografias/Auspiciantes/".$Id_Congreso."/".basename(4).$extension; 

			$Sql1=$conex->query("SELECT Subdominio FROM info_congreso WHERE Id_Congreso='$Id_Congreso'");
			$Sub=mysqli_fetch_assoc($Sql1);
			$Subdominio=$Sub[Subdominio];

			$Ruta2 = $Subdominio."/Fotografias/Auspiciantes/".$Id_Congreso."/".basename(4).$extension;  
			$uploadedfileload2="true";


			move_uploaded_file(@$_FILES['file']['tmp_name'], $Ruta); 

			$file_name2=$_FILES[file][name];
			$NombreImagen2 = $file_name2;

			$Registro_Evento2 = "UPDATE patrocinadores_congreso SET Img_Auspiciantes='$Ruta2' where Id_Congreso='$Id_Congreso'";
			$conex->query($Registro_Evento2);	 
?>