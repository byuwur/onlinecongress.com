<?php 
include("conexion.php");
include('Head.php');
include("../Idc.php");
$IdPonencia = $_GET['P'];
$Usuario = $_GET['U'];
$TipoU = $_GET['TipoU'];
$sql=$conex->query("SELECT archivosponentes.Ruta, archivosponentes.Tipo, ponente.Nombres, ponente.Apellidos, ponente.NivelFormacion, ponente.Email, ponencia.Titulo, ponencia.Resumen, ponencia.Idioma, ponencia.InstitucionPatrocinadora, ponencia.SitioWeb,paises.name_pais, programacion.Fecha FROM archivosponentes, ponente, ponencia, paises, programacion WHERE archivosponentes.IdPonencia='$IdPonencia' AND ponencia.IdPonencia='$IdPonencia' AND ponente.IdPonencia='$IdPonencia' AND ponente.Pais=paises.id AND programacion.IdPonencia=ponencia.IdPonencia AND archivosponentes.Id_Congreso='$Idc' AND ponente.IdPonencia=ponencia.IdPonencia AND ponente.Id_Congreso='$Idc'");
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
	p{
		font-size: 16px;
	}
</style>
<input type="hidden" id="IdPonencia" value="'.$IdPonencia.'">
<input type="hidden" id="Usuario" value="'.$Usuario.'">
<input type="hidden" id="TipoU" value="'.$TipoU.'">
<div class="container">
	<div class="">';
		echo "<h2>".$Resultado['Titulo']."</h2>";
		$Url = $Resultado['Ruta'];
		if ($Resultado['Tipo']=="Video") {
			$ResultadoUrl = str_replace("watch?v=", "embed/", $Url);
			echo '
			<br>
			<br>
			<iframe width="560" height="515" style="height:515px" src="'.$ResultadoUrl.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			';
		}else {
			echo '<iframe src="'.$Resultado['Ruta'].'" style="width:100%; height:500px; margin-top:30px;" frameborder="0"> </iframe>';
		}
		echo '
		<div class="row">
			<div class="col-xs-12 col-sm-4">
				<h4>Autor(es)</h4>
				<p>'.$Resultado['Nombres'].' '.$Resultado['Apellidos'].'</p>
			</div>
			<div class="col-xs-12 col-sm-2">
				<h4>Nivel Formación</h4>
				<p>'.$Resultado['NivelFormacion'].'</p>
			</div>
			<div class="col-xs-12 col-sm-2">
				<h4>Pais</h4>
				<p>'.$Resultado['name_pais'].'</p>
			</div>
			<div class="col-xs-12 col-sm-2">
				<h4>Email</h4>
				<p>'.$Resultado['Email'].'</p>
			</div>';
			$SqlAutores=$conex->query("SELECT autores.NombresA, autores.ApellidosA, autores.NivelFormacion,autores.EmailA, paises.name_pais FROM autores, ponencia, paises WHERE autores.IdPonencia=ponencia.IdPonencia AND autores.IdPonencia='$IdPonencia' AND ponencia.IdPonencia='$IdPonencia' AND autores.PaisA=paises.id AND autores.Id_Congreso='$Idc'");
			while ($ResultadoAutores=mysqli_fetch_assoc($SqlAutores)) {
				echo '
				<div class="col-xs-12 col-sm-4">
				<p>'.$ResultadoAutores['NombresA'].' '.$ResultadoAutores['ApellidosA'].'</p>
				</div>
				<div class="col-xs-12 col-sm-2">
					<p>'.$ResultadoAutores['NivelFormacion'].'</p>
				</div>
				<div class="col-xs-12 col-sm-2">
					<p>'.$ResultadoAutores['name_pais'].'</p>
				</div>
				<div class="col-xs-12 col-sm-2">
					<p>'.$ResultadoAutores['EmailA'].'</p>
				</div>';
			}
		echo'
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-2">
				<h4>Idioma</h4>
				<p>
				'.$Resultado['Idioma'].'
				</p>
			</div>
			<div class="col-xs-12 col-sm-5">
				<h4>Institución patrocinadora</h4>
				<p>
				'.$Resultado['InstitucionPatrocinadora'].'
				</p>
			</div>
			<div class="col-xs-12 col-sm-5">
				<h4>Sitio web</h4>
				<p>
				'.$Resultado['SitioWeb'].'
				</p>
			</div>
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
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-2">
			<a class="btn btn-raised btn-danger" style="height:50px; color:#fff" href="Ponencia.php?U='.$Usuario.'&P='.$IdPonencia.'&TU='.$TipoU.'">Volver</a>
		</div>
	</div>
</div>';
include('footer.php');?>