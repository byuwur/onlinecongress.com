<?php 
include("Variables.php");
include("conexion.php");
include('Head.php');
$Tipo = $_GET['T'];
date_default_timezone_set('America/Bogota'); 
$Fecha = date("Y-m-d");
$Año = date("Y");
$Hora = date("H:i:s");
if ($Usuario!="") {
	$sql1 = $conex->query("SELECT COUNT(ponencia.IdPonencia) Num_Ponente FROM ponente, ponencia WHERE ponente.Tipo='0' AND ponencia.Tipo='0' AND ponencia.IdPonencia=ponente.IdPonencia AND ponencia.Titulo!='' AND ponente.Año='$Año' AND ponente.Id_Congreso='$Id_Congreso'");
	$NumP = mysqli_fetch_assoc($sql1);
	$sql2 = $conex->query("SELECT COUNT(ponencia.IdPonencia) Num_Confe FROM ponente, ponencia WHERE ponente.Tipo='1' AND ponencia.Tipo='1' AND ponencia.IdPonencia=ponente.IdPonencia AND ponencia.Titulo!='' AND ponente.Año='$Año'AND ponente.Id_Congreso='$Id_Congreso'");
	$NumP2 = mysqli_fetch_assoc($sql2);
	$sql3 = $conex->query("SELECT COUNT(registro_asistencia.Id_Asistente) Num_Asis FROM registro_asistencia, asistente WHERE asistente.AñoA='$Año' AND registro_asistencia.Id_Congreso='$Id_Congreso' AND registro_asistencia.Id_Asistente=asistente.IdAsistente");
	$NumP3 = mysqli_fetch_assoc($sql3);
	echo '
	<input type="hidden" id="IdPonencia" value="">
	<input type="hidden" id="Usuario" value="">
	<div class="container">
		<div class="row" style="margin-top:20px;">
			<div class="col-xs-12 comentarios" style="border-bottom:1px solid #ccc">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<h3 style="font-size:18px;">Participante</h3>
						<p style="font-size:15px;">Ponentes</p>
					</div>
					<div class="col-xs-12 col-sm-4">
						<h3 style="font-size:18px;">Cantidad</h3>
						<p style="font-size:15px;">'.$NumP[Num_Ponente].'</p>
					</div>
					<div class="col-xs-12 col-sm-offset-3 col-sm-1">
						<a target="_blank" class="btn btn-raised btn-info" style="height:50px; color:#fff" href="Exportar_Registros_Excel.php?C='.$NumP[Num_Ponente].'&T=0">Ver</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:20px;">
			<div class="col-xs-12 comentarios" style="border-bottom:1px solid #ccc">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<h3 style="font-size:18px;">Participante</h3>
						<p style="font-size:15px;">Conferencistas</p>
					</div>
					<div class="col-xs-12 col-sm-4">
						<h3 style="font-size:18px;">Cantidad</h3>
						<p style="font-size:15px;">'.$NumP2[Num_Confe].'</p>
					</div>
					<div class="col-xs-12 col-sm-offset-3 col-sm-1">
						<a target="_blank" class="btn btn-raised btn-info" style="height:50px; color:#fff" href="Exportar_Registros_Excel.php?C='.$NumP2[Num_Confe].'&T=1">Ver</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:20px;">
			<div class="col-xs-12 comentarios" style="border-bottom:1px solid #ccc">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<h3 style="font-size:18px;">Participante</h3>
						<p style="font-size:15px;">Asistentes</p>
					</div>
					<div class="col-xs-12 col-sm-4">
						<h3 style="font-size:18px;">Cantidad</h3>
						<p style="font-size:15px;">'.$NumP3[Num_Asis].'</p>
					</div>
					<div class="col-xs-12 col-sm-offset-3 col-sm-1">
						<a target="_blank" class="btn btn-raised btn-info" style="height:50px; color:#fff" href="Exportar_RegistrosA_Excel.php?C='.$NumP3[Num_Asis].'">Ver</a>
					</div>
				</div>
			</div>
		</div>
	</div>';
include('footer.php');
}else{
  echo "
    <script type='text/javascript'>
      document.location = '../index.php';
    </script>
  ";
}
?>
<style type="text/css">
	.comentarios:hover{
		background: #f3f3f3;
	}
</style>