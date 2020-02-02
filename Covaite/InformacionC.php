<?php 
include("conexion.php");
include('Head.php');
include('Nav.php'); 
include('Idc.php'); 

$IdPonencia = $_GET['P'];
$sql=$conex->query("SELECT ponente.Fotografia, ponente.Nombres, ponente.Apellidos, ponente.NivelFormacion, ponente.Email, ponencia.Titulo, ponencia.Resumen, ponencia.Idioma, ponencia.InstitucionPatrocinadora, ponencia.SitioWeb,paises.name_pais, programacion.Fecha FROM ponente, ponencia, paises, programacion  WHERE ponencia.IdPonencia='$IdPonencia' AND ponente.IdPonencia='$IdPonencia' AND ponente.Pais=paises.id AND ponencia.Estado=1 AND programacion.IdPonencia=ponencia.IdPonencia AND ponente.Id_Congreso='$Idc'");
$Resultado=mysqli_fetch_assoc($sql);
$FechaHoy=$Resultado['Fecha'];
		$A = substr($FechaHoy, 0, 4); 
		$M = substr($FechaHoy, 5, 2); 
		$D = substr($FechaHoy, 8, 2); 

		  date_default_timezone_set('America/Bogota'); 

		  $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		  $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		  $Fecha=date($D)." de ".$meses[date($M)-1]. " del ".date($A);
echo '
<style type="text/css">
	h4{
		color:#ff5722;
	}
	p{
		font-size: 16px;
	}
</style>
<input type="hidden" id="IdPonencia" value="'.$IdPonencia.'">
<input type="hidden" id="Usuario" value="'.$Usuario.'">
<div class="container">
	<div class="row" style="margin-top:15%">
		<div class="col-xs-12 col-sm-4">';
			echo "
			<div class='row'>
				<div class='col-xs-12 col-sm-12'>
					<img src='".$Resultado['Fotografia']."' class='img-responsive'>
				</div>";
			echo '
				<div class="col-xs-12 col-sm-12">
					<h4>Autor</h4>
					<p>'.$Resultado['Nombres'].' '.$Resultado['Apellidos'].'</p>
				</div>
				<div class="col-xs-12 col-sm-12">
					<h4>Nivel formación</h4>
					<p>'.$Resultado['NivelFormacion'].'</p>
				</div>
				<div class="col-xs-12 col-sm-12">
					<h4>País</h4>
					<p>'.$Resultado['name_pais'].'</p>
				</div>
			</div>
		</div>';
			echo '
		<div class="col-xs-12 col-sm-8">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<h4>Título de la conferencia</h4>
					<p>'.$Resultado['Titulo'].'</p>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<h4>Resumen</h4>
					<p>
					'.$Resultado['Resumen'].'
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<h4>Idioma de la conferencia</h4>
					<p>
					'.$Resultado['Idioma'].'
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<h4>Fecha</h4>
					<p>
					'.$Fecha.'
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-offset-8 col-sm-4">
					<a href="Ponente/index.php?T=2" class="btn btn-raised btn-warning" style="height:40px; color:#fff">Participa como asistente</a>
				</div>
			</div>
			<br>
		</div>
	</div>
</div>';
include('footer.php');?>