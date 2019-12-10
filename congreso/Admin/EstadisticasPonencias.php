<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=Registros.xls');
	$Tipo = $_GET['T'];
	include("conexion.php");
	include("Variables.php");
date_default_timezone_set('America/Bogota'); 
$FechaHoy=date("Y-m-d");
$Año=date("Y");

$Sql3=$conex->query("SELECT payload.*, ponencia.Titulo, ponente.Nombres, ponente.Apellidos from (
    SELECT COUNT(IdComentario) AS comentarios, IdPonencia FROM `comentarios` 
    GROUP BY `IdPonencia`
) as payload
inner join ponencia on ponencia.IdPonencia = payload.IdPonencia
inner join ponente on ponente.IdPonencia = payload.IdPonencia  WHERE ponencia.Tipo='$Tipo' AND ponente.Id_Congreso='$Id_Congreso' order by comentarios desc");

	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<table border="1">
	<tr>
		<th colspan="4">';
			if ($Tipo==0) {
				echo '
				Listado de ponencias, ponentes y participaciones en cada una de las ponencias';
			}else{
					echo '
				Listado de conferencistas, conferencias y participaciones en cada una de las conferencias';
			}
	echo'</th>
	</tr>
	<tr>
		<th scope="col">#</th>';
		if ($Tipo==0) {
			echo '
		<th scope="col">Título ponencia</th>
        <th scope="col">Ponente</th>
        <th scope="col">Participaciones</th>';
		}else{
			echo '
		<th scope="col">Título conferencia</th>
        <th scope="col">Conferencista</th>
        <th scope="col">Participaciones</th>';
		}
        
    echo '
	</tr>';
$Contador=1;
	
while ($Resultado=mysqli_fetch_assoc($Sql3)) {
  echo '
    <tr>
      <th style="text-align:center" scope="row">'.$Tipo.'</th>
      <td>'.$Resultado[Titulo].'</td>
      <td>'.$Resultado[Nombres].' '.$Resultado[Apellidos].'</td>
      <td style="text-align:center">'.$Resultado[comentarios].'</td>
    </tr>
  ';
  $Contador=$Contador+1;
}
	echo "</table>";
?>