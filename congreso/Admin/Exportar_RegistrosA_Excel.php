<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=Registros.xls');
	$IDI = $_GET['IDI'];
	include("conexion.php");
	include("Variables.php");

$Cantidad = $_GET['C'];
date_default_timezone_set('America/Bogota'); 
$FechaHoy=date("Y-m-d");
$Año=date("Y");
$sql=$conex->query("SELECT asistente.NombresA, asistente.ApellidosA, asistente.Email, asistente.Pais FROM asistente, registro_asistencia WHERE asistente.AñoA='$Año' AND asistente.IdAsistente=registro_asistencia.Id_Asistente AND registro_asistencia.Id_Congreso='$Id_Congreso'");

	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<table border="1">
	<tr>
		<th colspan="3">
			Listado de asistentes registrados
		</th>
	</tr>
	<tr>
		<th>Nombre Completo</th>
		<th>Email</th>
		<th>País</th>
	</tr>';
	while ($Resultado=mysqli_fetch_assoc($sql)) {
	$sql2 = $conex->query("SELECT name_pais FROM paises WHERE id=$Resultado[Pais]");

		$Pais=mysqli_fetch_assoc($sql2);
		echo "<tr>
				<td>".$Resultado[NombresA]." ".$Resultado[ApellidosA]."</td>
				<td>".$Resultado[Email]."</td>
				<td>".$Pais[name_pais]."</td>
			  </tr>";
	}
	echo "</table>";
?>