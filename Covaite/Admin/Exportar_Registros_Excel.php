<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=Registros.xls');
	$IDI = $_GET['IDI'];
	include("conexion.php");
	include("Variables.php");
$Cantidad = $_GET['C'];
$Tipo = $_GET['T'];		
date_default_timezone_set('America/Bogota'); 
$FechaHoy=date("Y-m-d");
$Año=date("Y");
if ($Tipo==1) {
	$Participante="CONFERENCISTAS";
	$TipoE = "Conferencia";
}else{
	$Participante="PONENTES";
	$TipoE = "Ponencia";
}
$sql=$conex->query("SELECT ponente.Nombres, ponente.Apellidos, ponente.Email, ponencia.Titulo, ponente.Pais FROM ponente, ponencia WHERE ponente.Tipo='$Tipo' AND ponencia.Tipo='$Tipo' AND ponencia.IdPonencia=ponente.IdPonencia AND ponencia.Titulo!='' AND ponente.Año='$Año' AND ponente.Id_Congreso='$Id_Congreso'");

	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<table border="1">
	<tr>
		<th colspan="4">
			Listado de '.$Participante.' registrados
		</th>
	</tr>
	<tr>
		<th>Nombre Completo</th>
		<th>Email</th>
		<th>País</th>
		<th>Título '.$TipoE.'</th>
	</tr>';
	while ($Resultado=mysqli_fetch_assoc($sql)) {
		$sql2 = $conex->query("SELECT name_pais FROM paises WHERE id=$Resultado[Pais]");

		$Pais=mysqli_fetch_assoc($sql2);
		echo "<tr>
				<td>".$Resultado[Nombres]." ".$Resultado[Apellidos]."</td>
				<td>".$Resultado[Email]."</td>
				<td>".$Pais[name_pais]."</td>
				<td>".$Resultado[Titulo]."</td>
			  </tr>";
	}
	echo "</table>";
?>