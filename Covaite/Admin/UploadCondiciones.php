<?php 		
			include("conexion.php");
			$Id_Congreso=$_POST['Id_Congreso'];


			@mkdir("../Pdf/Condiciones/$Id_Congreso/", 0777 -R, TRUE);
			@chmod("../Pdf/Condiciones/*", 0777);
			
			$Ruta = "../Pdf/Condiciones/".$Id_Congreso."/".basename(1).".pdf"; 


			$Sql1=$conex->query("SELECT Subdominio FROM info_congreso WHERE Id_Congreso='$Id_Congreso'");
			$Sub=mysqli_fetch_assoc($Sql1);
			$Subdominio=$Sub[Subdominio];

			$Ruta2 = $Subdominio."/Pdf/Condiciones/".$Id_Congreso."/".basename(1).".pdf";  
			$uploadedfileload2="true";


			move_uploaded_file(@$_FILES['file']['tmp_name'], $Ruta); 

			$file_name2=$_FILES[file][name];
			$NombreImagen2 = $file_name2;

			$Registro_Evento2 = "UPDATE condiciones SET Url_Pdf='$Ruta2' where Id_Congreso='$Id_Congreso'";
			$conex->query($Registro_Evento2);
?>