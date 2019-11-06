<?php 
include("Variables.php");
include("conexion.php");
include('Head.php');
$IdPonencia = $_GET['P'];
if ($Usuario!="") {
	$sql=$conex->query("SELECT archivosponentes.Ruta, archivosponentes.Tipo, ponente.Nombres, ponente.Apellidos, ponente.NivelFormacion, ponente.Email, ponencia.Titulo, ponencia.Resumen, ponencia.Idioma, ponencia.InstitucionPatrocinadora, ponencia.SitioWeb, paises.name_pais FROM archivosponentes, ponente, ponencia, paises, congreso WHERE archivosponentes.IdPonencia='$IdPonencia' AND ponencia.IdPonencia='$IdPonencia' AND ponente.IdPonencia='$IdPonencia' AND ponente.Pais=paises.id AND archivosponentes.Id_Congreso='$Id_Congreso' AND ponente.Id_Congreso='$Id_Congreso' AND archivosponentes.Id_Congreso=congreso.Id_Congreso AND ponente.Id_Congreso=congreso.Id_Congreso");
	$Resultado=mysqli_fetch_assoc($sql);
	echo '
	<style type="text/css">
		p{
			color:#818181;
			font-size: 16px;
		}
	</style>
	<input type="hidden" id="IdPonencia" value="'.$IdPonencia.'">
	<input type="hidden" id="Usuario" value="'.$Usuario.'">
	<div class="container">
		<div class="">';
			echo "<h2>".$Resultado['Titulo']."</h2>";
			$Url = $Resultado['Ruta'];
			if ($Resultado['Tipo']=="Video") {
				echo '
				<br>
				<br>
				<iframe width="560" height="515" style="height:515px" src="'.$Url.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
					<h4>País</h4>
					<p>'.$Resultado['name_pais'].'</p>
				</div>
				<div class="col-xs-12 col-sm-2">
					<h4>Email</h4>
					<p>'.$Resultado['Email'].'</p>
				</div>';
				$SqlAutores=$conex->query("SELECT autores.NombresA, autores.ApellidosA, autores.NivelFormacion, autores.EmailA, paises.name_pais FROM autores, ponencia, paises WHERE autores.IdPonencia=ponencia.IdPonencia AND autores.IdPonencia='$IdPonencia' AND ponencia.IdPonencia='$IdPonencia' AND autores.PaisA=paises.id AND autores.Id_Congreso='$Id_Congreso'");
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
		</div>
	</div>
	<br>
	<br>
	<div class="container">
		<div class="well">
			<form action="" method="POST">
				<input type="hidden" name="IdP" value="'.$IdPonencia.'">
				<input type="hidden" name="Id_Congreso" value="'.$Id_Congreso.'">
				<div class="row">
					<h2>Programar ponencia<h2/>
					<hr style="color:#ff5722; background:#ff5722; width:20%; margin-left:1px;">';

$Habilitada=$conex->query("SELECT programacion.Fecha, ponencia.Categoria FROM programacion, ponencia WHERE programacion.IdPonencia=ponencia.IdPonencia AND programacion.IdPonencia='$IdPonencia' AND ponencia.IdPonencia='$IdPonencia'");
$RH=mysqli_fetch_assoc($Habilitada);
$RC=$RH['Categoria'];
				if ($RH!="") {
					$CategoriaSql=$conex->query("SELECT Categoria FROM categorias WHERE Id='$RC' AND Id_Congreso='$Id_Congreso'");
					$NombreCategoria=mysqli_fetch_assoc($CategoriaSql);
					echo '
					<input type="hidden" name="Validador" value="1">
					<div class="col-xs-12 col-sm-4">
						<h3>Fecha</h3>	
						<input type="date" name="Fecha" value="'.$RH[Fecha].'" required>
					</div>
					<!--div class="col-xs-12 col-sm-2">
						<h3>Hora</h3>
						<input type="time" min="00:01" max=24:00" name="Hora" value="'.$RH[Hora].'" required>
					</div-->
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<h3>Asignar categoría de la ponencia</h3>	
					    <select class="form-control" name="Categoria">
					    	<option value="'.$RH[Categoria].'">'.$NombreCategoria[Categoria].'</option>
					    ';
					    $Categoria=$conex->query("SELECT Id, Categoria FROM categorias WHERE Id_Congreso='$Id_Congreso'");
						while ($RCategorias=mysqli_fetch_assoc($Categoria)) {
							if ($RCategorias[Id]!=$RH[Categoria]) {
								echo'<option value="'.$RCategorias[Id].'">'.$RCategorias[Categoria].'</option>';
							}
						}
						echo '
					    </select>
					</div>';
				}else{
					echo '
					<input type="hidden" name="Validador" value="0">
					<div class="col-xs-12 col-sm-4">
						<h3>Fecha</h3>	
						<input type="date" name="Fecha" required>
					</div>
					<!--div class="col-xs-12 col-sm-2">
						<h3>Hora</h3>
						<input type="time" min="00:01" max=24:00" name="Hora" required>
					</div-->
					<div class="col-xs-12 col-sm-12">
						<h3>Asignar categoria de la ponencia</h3>	
					    <select class="form-control" name="Categoria">';
					    $Categoria=$conex->query("SELECT Id, Categoria FROM categorias WHERE Id_Congreso='$Id_Congreso'");
						while ($RCategorias=mysqli_fetch_assoc($Categoria)) {
							echo'<option value="'.$RCategorias[Id].'">'.$RCategorias[Categoria].'</option>';
						}
						echo '
					    </select>
					</div>';
				}
				echo '
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<h3>Activar/Desactivar Ponencia</h3>	
					    <select class="form-control" name="Estado">
					    	<option value="1">Activar</option>
						   	<option value="0">Desactivar</option>
					    </select>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-offset-9 col-sm-3">		
						<input type="submit" class="btn btn-raised btn-success" style="height:50px;" name="Guardar" value="Guardar">	
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-2">
				<a class="btn btn-raised btn-danger" style="height:50px; color:#fff" href="TodasPonencias.php?T=0" >Volver</a>
			</div>
		</div>
	</div>';
	if ($_POST['Guardar']) {
		include("conexion.php");
		$Idcon=$_POST['Id_Congreso'];
		$IdPonencia=$_POST['IdP'];
		$Validador=$_POST['Validador'];
		$Fecha2=$_POST['Fecha'];
		//$Hora2=$_POST['Hora'];
		$Categoria2=$_POST['Categoria'];
		$Categoria3="http://localhost/Covaite/ImgCategorias/".$Categoria2.".png";
		$Estado=$_POST['Estado'];
		$SqlC=$conex->query("UPDATE ponencia, ponente SET ponencia.Categoria='$Categoria2', ponencia.Estado='$Estado' WHERE ponencia.IdPonencia='$IdPonencia' AND ponente.IdPonencia=ponencia.IdPonencia AND ponente.Id_Congreso='$Idcon'");
		$SqlC2=$conex->query("UPDATE ponente SET Fotografia='$Categoria3' WHERE IdPonencia='$IdPonencia' AND Id_Congreso='$Idcon'");
		if ($Validador==0) {
			$SqlP=$conex->query("INSERT INTO programacion VALUES(null,'$IdPonencia','0','$Fecha2')");
		}else{
			$SqlP=$conex->query("UPDATE programacion, ponente SET programacion.Fecha='$Fecha2' WHERE programacion.IdPonencia='$IdPonencia' AND ponente.IdPonencia='$IdPonencia' AND ponente.Id_Congreso='$Idcon' AND programacion.IdPonencia=ponente.IdPonencia");
		}
		
	echo "
		<div style='display:block;left:0px;' class='Area_Oscura2'>
			<div class='container'>
			    <div class='row'>
			       	<div class='col-sm-4 col-sm-offset-4'>
			          	<div class='well' style='margin-top:55%;'>
			            	<h4 align='center'>La información se ha guardado correctamente.</h4>
			            	<div class='row'>
						    	<div class='col-sm-6 col-sm-offset-3'>
						        	<a href='TodasPonencias.php?T=0' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
			                	</div>
			            	</div>
			        	</div>
			    	</div>
		  		</div>
		    </div>
		</div>";
	}
include('footer.php');
}else{
  echo "
    <script type='text/javascript'>
      document.location = '../index.php';
    </script>
  ";
}
?>