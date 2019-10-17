<?php 
include("conexion.php");
include('Head.php');
$Usuario = $_GET['U'];
$Tipo = $_GET['T'];
$IdPonencia = $_GET['P'];
if ($Usuario!="") {
	$Sql=$conex->query("SELECT Ponente.TipoDocumento, Ponente.IdPonente, Ponente.Nombres, Ponente.Apellidos, Ponente.Genero, Ponente.Telefono, Ponente.Email, Ponente.Institucion, Ponente.NivelFormacion, Ponente.ResumenPonente, Paises.name_pais, Provincias.name_pro FROM Ponente, Paises, Provincias WHERE IdPonente='$Usuario' AND Ponente.Pais=Paises.id AND Ponente.Provincia=Provincias.id");
	$Resultado=mysqli_fetch_assoc($Sql);
	echo '
<br>
<div class="container">
	<div class="well">
		<form action="" method="POST">
		<input type="hidden" value="'.$Usuario.'" name="Usuario">
		<h1 style="text-align:center;">DATOS DEL <br>
		';
		if ($Tipo==1) {
            	echo "CONFERENCISTA";
            }else{
            	echo "PONENTE";
        } 
		echo'</h1>
		<hr style="color:#0277bd; background:#0277bd; width:20%;" class="center-block">
		<div class="row">
			<div class="form-group col-xs-12 col-sm-3" style="margin-top: 0px;">
			    <h5 style="color:#d2d2d2">Tipo de documento de identidad</h5>
			    <p style="color:#818181">'.$Resultado['TipoDocumento'].'</p>
			 </div>
			 <div class="form-group col-xs-12 col-sm-3" style="margin-top: 0px;">
			    <h5 style="color:#d2d2d2">Documento</h5>
			    <p style="color:#818181">'.$Resultado['IdPonente'].'</p>
			 </div>
		</div>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-4">
				<h5 style="color:#d2d2d2">Nombre(s)</h5>
				<p style="color:#818181">'.$Resultado['Nombres'].'</p>
			</div>
			<div class="form-group col-xs-12 col-sm-4">
				<h5 style="color:#d2d2d2">Apellido(s)</h5>
				<p style="color:#818181">'.$Resultado['Apellidos'].'</p>
			</div>
			<div class="form-group col-xs-12 col-sm-2">
				<h5 style="color:#d2d2d2">Genero</h5>
				<p style="color:#818181">'.$Resultado['Genero'].'</p>
			</div>
			 <div class="form-group label-floating col-xs-12 col-sm-2" style="margin-top:50px;">
				<label class="control-label" for="Barrio">Teléfono</label>
				<input type="number" maxlength="20" class="form-control" value="'.$Resultado['Telefono'].'" name="Telefono" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-6">
				<label class="control-label" for="Barrio">Email</label>
				<input type="email" maxlength="100" class="form-control" name="Email" value="'.$Resultado['Email'].'" required>
			</div>
			<div class="form-group col-xs-12 col-sm-2" style="margin-top: 0px;">
			    <label for="exampleSelect1" class="bmd-label-floating">Nivel de formación</label>
			    <select class="form-control" id="exampleSelect1" name="Formacion">';
			    $Formacion=array(1 => "Profesional", 2 => "Maestria", 3 => "Doctorado", 4 => "Postdoctorado");
			    echo "<option>".$Resultado['NivelFormacion']."</option>";
			    for ($i=1; $i <5; $i++) { 
			    	if ($Formacion[$i]!=$Resultado['NivelFormacion']) {
			    		echo "<option>".$Formacion[$i]."</option>";
			    	}
			    }

			echo '</select>
			 </div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-12">
				<label class="control-label" for="Barrio">Institución académica donde labora</label>
				<input type="text" maxlength="250" class="form-control" name="Labora" value="'.$Resultado['Institucion'].'" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-4">
				<h5 style="color:#d2d2d2">País</h5>
				<p style="color:#818181">'.$Resultado['name_pais'].'</p>
			</div>
			<div class="form-group col-xs-12 col-sm-4">
				<h5 style="color:#d2d2d2">Provincia</h5>
				<p style="color:#818181">'.$Resultado['name_pro'].'</p>
			</div><div class="form-group col-xs-12 col-sm-4">
				<h5 style="color:#d2d2d2">Ciudad</h5>
				';
				$sqlC=$conex->query("SELECT Ciudades.name_ciu FROM Ponente, Ciudades WHERE Ponente.IdPonencia='$IdPonencia' AND Ciudades.id=Ponente.Ciudad AND Tipo='$Tipo'");
				$RC=mysqli_fetch_assoc($sqlC);
				if ($RC['name_ciu']!="") {
					echo '
						<p style="color: #818181">'.$RC['name_ciu'].'</p>';
					}
				echo'
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-12">
			    <label for="exampleTextarea" class="control-label">Resumen bibliográfico del ';
				if ($Tipo==1) {
		            	echo "conferencista";
		            }else{
		            	echo "ponente";
		        } 
				echo'</label>
			    <textarea class="form-control" id="exampleTextarea" name="Resumen" rows="5" maxlength="1000" required>'.$Resultado['ResumenPonente'].'</textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-2 col-sm-offset-10">
				<input type="submit" name="Guardar" value="Guardar" style="height: 50px;" class="Guardar btn btn-success btn-raised">
			</div>
		</div>
	</form>
	</div>
</div>
	';
}
?>
<?php
include("conexion.php");
	if ($_POST['Guardar']) {
		$Usuario=$_POST['Usuario'];
		$Telefono=$_POST['Telefono'];
		$Email=$_POST['Email'];
		$Labora=$_POST['Labora'];
		$Formacion=$_POST['Formacion'];
		$Resumen=$_POST['Resumen'];

		date_default_timezone_set('America/Bogota'); 
		$Fecha = date("Y-m-d");
		$Año = date("Y");
		if ($Telefono!="" && $Email!="" && $Labora!="" && $Formacion!="" && $Resumen!="") {
				$query2 = $conex->query("UPDATE Ponente SET Telefono='$Telefono', Email='$Email', Institucion='$Labora', NivelFormacion='$Formacion', ResumenPonente='$Resumen' WHERE IdPonente='$Usuario'");	
			echo "
		    <script type='text/javascript'>
		      document.location = 'Perfil.php?U=$Usuario';
		    </script>
		  ";		
		}
	}

?>
<script type="text/javascript">
function Validar(){
	$(".Area_Oscura2").fadeOut('fast');
}
<?php include('footer.php');?>