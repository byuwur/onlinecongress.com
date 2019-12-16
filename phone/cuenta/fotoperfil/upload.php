<?php 		
	include("../../conectar_bd.php");
	$Id_Cancha=$_POST["IDI"];
	
	@mkdir("Imagenes_Usuario/$Id_Cancha/");
	@chmod("Imagenes_Usuario/*", 777);
			
	$randon = 1;
			
	$cmdBorrarDir = "rm -R Imagenes_Usuario/$Id_Cancha/*";
	shell_exec($cmdBorrarDir);
			
	$extension = end(explode(".", $_FILES['archivo']['name']));
	$Ruta = "Imagenes_Usuario/".$Id_Cancha."/".basename($randon).$extension.".jpg"; 

	$Ruta2 = "Imagenes_Usuario/".$Id_Cancha."/".basename($randon).$extension; 
	$uploadedfileload2="true";

	move_uploaded_file(@$_FILES['file']['tmp_name'], $Ruta); 

	$file_name2=$_FILES[file][name];
	$NombreImagen2 = $file_name2;
	
	$Registro_Evento = "UPDATE asistente SET Foto='$Ruta2' WHERE IdAsistente='$Id_Cancha'";
	$conex->query($Registro_Evento);
?>