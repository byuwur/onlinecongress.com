<?php 
include("conexion.php");
include('Head.php');
include('Nav.php'); 
include('Idc.php'); 
$IdPonencia = $_GET['P'];
$sql=$conex->query("SELECT ponencia.Categoria, ponente.Nombres, ponente.Apellidos, ponente.NivelFormacion, ponente.Email, ponencia.Titulo, ponencia.Resumen, ponencia.Idioma, ponencia.InstitucionPatrocinadora, ponencia.SitioWeb,paises.name_pais, programacion.Fecha FROM ponente, ponencia, paises, programacion  WHERE ponencia.IdPonencia='$IdPonencia' AND ponente.IdPonencia='$IdPonencia' AND ponente.Pais=paises.id AND ponencia.Estado=1 AND programacion.IdPonencia=ponencia.IdPonencia AND ponente.Id_Congreso='$Idc'");
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
	<div class=""';
		echo "
		<div class='row'>
			<div class='col-xs-12 col-sm-12' style='margin-top:140px;'>
				<img src='ImgCategorias/Ponente.svg' class='img-responsive'>
			</div>
		</div>";
		echo '
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h4>Título de la ponencia</h4>
				<p>'.$Resultado['Titulo'].'</p>
			</div>
			<div class="col-xs-12 col-sm-4">
				<h4>Ponente</h4>
				<p>'.$Resultado['Nombres'].' '.$Resultado['Apellidos'].'</p>
			</div>
			<div class="col-xs-12 col-sm-2">
				<h4>Nivel formación</h4>
				<p>'.$Resultado['NivelFormacion'].'</p>
			</div>
			<div class="col-xs-12 col-sm-2">
				<h4>País</h4>
				<p>'.$Resultado['name_pais'].'</p>
			</div>
		</div>';
			$SqlAutores=$conex->query("SELECT autores.NombresA, autores.ApellidosA, autores.NivelFormacion,autores.EmailA, paises.name_pais FROM autores, ponencia, paises WHERE autores.IdPonencia=ponente.IdPonencia AND autores.IdPonencia='$IdPonencia' AND ponente.IdPonencia='$IdPonencia' AND autores.PaisA=paises.id AND ponente.Estado=1 AND autores.Id_Congreso='$Idc'");
			if (mysqli_num_rows($SqlAutores)>0) {
				echo '<div class="row">
					<div class="col-sm-12">
						<h4>Autor(es)</h4>
					</div>
				</div>
				';
			}
		
			while ($ResultadoAutores=mysqli_fetch_assoc($SqlAutores)) {
				echo '

			<div class="row">
				<div class="col-xs-12 col-sm-4">
				<p>'.$ResultadoAutores['NombresA'].' '.$ResultadoAutores['ApellidosA'].'</p>
					</div>
				<div class="col-xs-12 col-sm-2">
						<p>'.$ResultadoAutores['NivelFormacion'].'</p>
				</div>
				<div class="col-xs-12 col-sm-2">
						<p>'.$ResultadoAutores['name_pais'].'</p>
				</div>
			</div>';
				}
			echo'
		<div class="row">
			<div class="col-xs-12 col-sm-4">
				<h4>Idioma de la ponencia</h4>
				<p>
				'.$Resultado['Idioma'].'
				</p>
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
</div>';
include('footer.php');?>