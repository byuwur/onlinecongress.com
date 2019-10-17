<?php 
include("Variables.php");
include("conexion.php");
include('Head.php');
$Tipo = $_GET['T'];
date_default_timezone_set('America/Bogota'); 
$Fecha = date("Y-m-d");
$Hora = date("H:i:s");
if ($Usuario!="") {
	$sql=$conex->query("SELECT ponencia.IdPonencia, ponencia.Titulo, ponente.Nombres, ponente.Apellidos FROM ponencia, ponente, congreso WHERE ponencia.IdPonencia=ponente.IdPonencia AND ponencia.Tipo='$Tipo' AND congreso.Id_Congreso='$Id_Congreso' AND congreso.Id_Administrador='$Usuario' AND ponente.Id_Congreso='$Id_Congreso' AND ponente.Id_Congreso=congreso.Id_Congreso ORDER BY ponencia.Fecha ASC");
	echo '
	<input type="hidden" id="IdPonencia" value="'.$IdPonencia.'">
	<input type="hidden" id="Usuario" value="'.$Usuario.'">
	<div class="container">
		<div class="row" style="margin-top:20px;">
		';
		if ($Tipo==1) {
			echo "CONFERENCIAS";
		}else{
			echo "PONENCIAS";
		}
		while ($Resultado=mysqli_fetch_assoc($sql)) {
	$IdPonencia=$Resultado['IdPonencia'];
	$sql2=$conex->query("SELECT programacion.Fecha, ponencia.Estado FROM programacion, ponencia WHERE programacion.IdPonencia='$IdPonencia' AND ponencia.IdPonencia='$IdPonencia'");
	$Resultado2=mysqli_fetch_assoc($sql2);
	//***************Sacar la fecha*******************
	          $A = substr($Resultado2['Fecha'], 0, 4); 
	          $M = substr($Resultado2['Fecha'], 5, 2); 
	          $D = substr($Resultado2['Fecha'], 8, 2); 
	          $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	          $Fecha=date($D)." de ".$meses[date($M)-1]. " del ".date($A);
	          	if ($Resultado2['Estado']==0) {
					$Color="; background:#ffe7e6";
				}else{
					$Color="";
				}
			echo '
				<div class="col-xs-12 comentarios" style="border-bottom:1px solid #ccc'.$Color.'">
					<div class="row">
						<div class="col-xs-12 col-sm-4">
							<h3 style="font-size:18px;">Titulo ';
								if ($Tipo==1) {
									echo "conferencia";
								}else{
									echo "ponencia";
								}
							echo'</h3>
							<p style="font-size:15px;">'.$Resultado['Titulo'].'</p>';
							if ($Resultado2['Estado']==0) {
								echo'<h3 style="font-size:18px; color: red">* Desactivada</h3>';	
							}
							echo'
						</div>
						<div class="col-xs-12 col-sm-3">
							<h3 style="font-size:18px;">';
							if ($Tipo==1) {
									echo "Conferencista";
								}else{
									echo "Ponente";
								}
							echo '
							</h3>
							<p style="font-size:15px;">'.$Resultado['Nombres'].' '.$Resultado['Apellidos'].'</p>
						</div>
						';
						if ($Tipo==0) {
							echo '<div class="col-xs-12 col-sm-offset-4 col-sm-1">
							<a class="btn btn-raised btn-info" style="height:50px; color:#fff" href="MasInfoPonencia.php?U='.$Usuario.'&P='.$Resultado['IdPonencia'].'">Ver</a>
						</div>';
						}else{
							echo '<div class="col-xs-12 col-sm-offset-4 col-sm-1">
							<a class="btn btn-raised btn-info" style="height:50px; color:#fff" href="MasInfoConferencia.php?U='.$Usuario.'&P='.$Resultado['IdPonencia'].'">Ver</a>
						</div>';
						}
						echo '
					</div>
				</div>
			';}
		echo'
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