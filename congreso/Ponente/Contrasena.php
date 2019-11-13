<?php 
include("conexion.php");
include('Head.php');
include("../Idc.php");
$Usuario = $_GET['U'];
$Tipo = $_GET['Tipo'];
if ($Usuario!="") {
	echo '
<div class="container">
	<form action="" method="POST">
	<input type="hidden" value="'.$Usuario.'" name="Usuario">
	<input type="hidden" value="'.$Tipo.'" name="Tipo">
	<div class="well" style="margin-top:10px;">
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-5">
				<label class="control-label" for="Barrio">Contraseña actual</label>
				<input type="password" maxlength="250" class="form-control" name="ContrActual" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
					<label class="control-label" for="Barrio">Nueva Contraseña</label>
					<input onkeyup="ValidarContra()" type="password" id="Contra1" maxlength="250" class="form-control" name="Contra1" required>
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Verifique contraseña</label>
				<input onkeyup="ValidarContra()" type="password" id="Contra2" maxlength="250" class="form-control" name="Contra2" required>
			</div>
			<div class="col-xs-12 col-sm-2">
				<input type="submit" name="Guardar" value="Guardar" style="height: 50px; display: none" class="Guardar btn btn-success btn-raised">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-sm-6">
				<div class="AlertContra alert alert-danger" role="alert" style="font-size: 16px; display: none">
			  		Las contraseñas no coinciden.
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" name="Id_Congreso" value="'.$Idc.'">
	</form>
</div>';
}
?>
<?php
include("conexion.php");
	if ($_POST['Guardar']) {
		$Id_Congreso=$_POST['Id_Congreso'];
		$ContraA=md5($_POST['ContrActual']);
		$Contra1=$_POST['Contra1'];
		$Contra2=$_POST['Contra2'];
		$Usuario=$_POST['Usuario'];
		$Tipo=$_POST['Tipo'];
		if ($Tipo==2) {
			$query1=$conex->query("SELECT asistente.DocumentoA FROM asistente, registro_asistencia WHERE asistente.Password='$ContraA' AND registro_asistencia.Id_Congreso='$Id_Congreso' AND asistente.IdAsistente=registro_asistencia.Id_Asistente");
		}else{
			$query1=$conex->query("SELECT IdPonente FROM ponente WHERE Password='$ContraA' AND Id_Congreso='$Id_Congreso'");
		}
	
		if (mysqli_num_rows($query1)>0) {
			if ($Contra2==$Contra1) {
				$ContraN=md5($Contra1);
					if ($Tipo==2) {
						$query2 = $conex->query("UPDATE asistente,registro_asistencia SET asistente.Password='$ContraN' WHERE asistente.DocumentoA='$Usuario' AND registro_asistencia.Id_Congreso='$Id_Congreso' AND asistente.IdAsistente=registro_asistencia.Id_Asistente");	
					}else{
						$query2 = $conex->query("UPDATE ponente SET Password='$ContraN' WHERE IdPonente='$Usuario' AND Id_Congreso='$Id_Congreso'");	
					}
				echo "
				<div style='display:block;left:0px;' class='Area_Oscura2'>
			        <div class='container'>
					    <div class='row'>
					        <div class='col-sm-4 col-sm-offset-4'>
					            <div class='well' style='margin-top:55%;'>
					               <h4 align='center'>La contraseña se ha actualizado correctamente.</h4>
					                <div class='row'>
					           		    <div class='col-sm-6 col-sm-offset-3'>
					                      <a href='Contrasena.php?U=$Usuario&Tipo=$Tipo' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
					                  	</div>
					                </div>
					            </div>
					        </div>
					   	</div>
					</div>
			    </div>
			";		
			}
		}else{
			echo "
				<div style='display:block;left:0px;' class='Area_Oscura2'>
			        <div class='container'>
					    <div class='row'>
					        <div class='col-sm-4 col-sm-offset-4'>
					            <div class='well' style='margin-top:55%;'>
					               <h4 align='center'>La contraseña actual es invalida.</h4>
					                <div class='row'>
					           		    <div class='col-sm-6 col-sm-offset-3'>
					                      <a href='Contrasena.php?U=$Usuario&Tipo=$Tipo' style='width:100%' class='btn btn-info btn-raised'>Aceppar</a>
					                  	</div>
					                </div>
					            </div>
					        </div>
					   	</div>
					</div>
			    </div>
			";
		}
	}

?>

<script type="text/javascript">
	function ValidarContra(){
		$Contra1=$("#Contra1").val();
		$Contra2=$("#Contra2").val();
		if ($Contra1==$Contra2) {
			$(".AlertContra").fadeOut('fast');
			$(".Guardar").fadeIn('fast');
		}else{
			$(".AlertContra").fadeIn('fast');
			$(".Guardar").fadeOut('fast');
		}
	}
</script>
<script type="text/javascript">
function Validar(){
	$(".Area_Oscura2").fadeOut('fast');
}
<?php include('footer.php');?>