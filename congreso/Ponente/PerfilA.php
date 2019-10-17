<?php 
include("conexion.php");
include('Head.php');
$Usuario = $_GET['U'];
$Tipo = $_GET['T'];
$IdPonencia = $_GET['P'];
if ($Usuario!="") {
		$Sql=$conex->query("SELECT Asistente.TipoDocumentoA, Asistente.NombresA, Asistente.ApellidosA, Asistente.Genero, Asistente.Email, Paises.name_pais FROM Asistente, Paises WHERE Asistente.DocumentoA='$Usuario' AND Paises.id=Asistente.Pais");
			$Resultado=mysqli_fetch_assoc($Sql);
	echo '
<br>
<div class="container">
	<div class="well">
		<form action="" method="POST">
		<input type="hidden" value="'.$Usuario.'" name="Usuario">
		<h1 style="text-align:center;">DATOS DEL<br>
		ASISTENTE AL EVENTO
		</h1>
		<hr style="color:#ff5722; background:#ff5722; width:20%;" class="center-block">
		<div class="row">
			<div class="form-group col-xs-12 col-sm-3" style="margin-top: 0px;">
			    <h5 style="color:#d2d2d2">Tipo de documento de identidad</h5>
			    <p style="color:#818181">'.$Resultado['TipoDocumentoA'].'</p>
			 </div>
			 <div class="form-group col-xs-12 col-sm-3" style="margin-top: 0px;">
			    <h5 style="color:#d2d2d2">Documento</h5>
			    <p style="color:#818181">'.$Usuario.'</p>
			 </div>
		</div>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-4">
				<h5 style="color:#d2d2d2">Nombre(s)</h5>
				<p style="color:#818181">'.$Resultado['NombresA'].'</p>
			</div>
			<div class="form-group col-xs-12 col-sm-4">
				<h5 style="color:#d2d2d2">Apellido(s)</h5>
				<p style="color:#818181">'.$Resultado['ApellidosA'].'</p>
			</div>
			<div class="form-group col-xs-12 col-sm-2">
				<h5 style="color:#d2d2d2">Genero</h5>
				<p style="color:#818181">'.$Resultado['Genero'].'</p>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-6">
				<label class="control-label" for="Barrio">Email</label>
				<input type="email" maxlength="100" class="form-control" name="Email" value="'.$Resultado['Email'].'" required>
			</div>
			<div class="form-group col-xs-12 col-sm-4" style="margin-top:5px;"">
				<h5 style="color:#d2d2d2">Pais</h5>
				<p style="color:#818181">'.$Resultado['name_pais'].'</p>
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
		$Email=$_POST['Email'];

		date_default_timezone_set('America/Bogota'); 
		$Fecha = date("Y-m-d");
		$Año = date("Y");
		if ($Email!="") {
				$query2 = $conex->query("UPDATE Asistente SET Email='$Email' WHERE DocumentoA='$Usuario'");	
			echo "
		    <script type='text/javascript'>
		      document.location = 'PerfilA.php?U=$Usuario';
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