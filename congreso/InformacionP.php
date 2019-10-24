<?php 
include("conexion.php");
include('Head.php');
include('Nav.php'); 
$IdPonencia = $_GET['P'];
$sql=$conex->query("SELECT Ponencia.Categoria, Ponente.Nombres, Ponente.Apellidos, Ponente.NivelFormacion, Ponente.Email, Ponencia.Titulo, Ponencia.Resumen, Ponencia.Idioma, Ponencia.InstitucionPatrocinadora, Ponencia.SitioWeb,Paises.name_pais, Programacion.Hora, Programacion.Fecha FROM Ponente, Ponencia, Paises, Programacion  WHERE Ponencia.IdPonencia='$IdPonencia' AND Ponente.IdPonencia='$IdPonencia' AND Ponente.Pais=Paises.id AND Ponencia.Estado=1 AND Programacion.IdPonencia=Ponencia.IdPonencia ");
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
				<img src='http://covaite.com/ImgCategorias/".$Resultado['Categoria'].".png' class='img-responsive'>
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
			$SqlAutores=$conex->query("SELECT Autores.NombresA, Autores.ApellidosA, Autores.NivelFormacion,Autores.EmailA, Paises.name_pais FROM Autores, Ponencia, Paises WHERE Autores.IdPonencia=Ponencia.IdPonencia AND Autores.IdPonencia='$IdPonencia' AND Ponencia.IdPonencia='$IdPonencia' AND Autores.PaisA=Paises.id AND Ponencia.Estado=1");
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
			<div class="col-xs-12 col-sm-2">
				<h4>Fecha</h4>
				<p>
				'.$Fecha.'
				</p>
			</div>
			<div class="col-xs-12 col-sm-2">
				<h4>Hora</h4>
				<p>
				'.date("g:i a",strtotime($Resultado['Hora'])).'
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