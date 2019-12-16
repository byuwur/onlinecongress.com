<?php 
include("Variables.php");
include("conexion.php");
include('Head.php');
?>
<div class="container" style="margin-top: 50px;">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3 well">
			<img src="img/Estadistica.svg" class="center-block">
            <div class='form-group label-floating'>
                <label for='Periodo' class='control-label'>Seleccione un tipo de estadística</label>
                <select onchange="Obtener()"  id='TipoEstadistica' class='form-control'>
                	<option value="1">Asistentes en línea</option>
                	<option value="2">Ponencias con mayor participación</option>
                	<option value="3">Conferencias con mayor participación</option>
                	<option value="4">Participaciones por paises</option>
                </select>
            </div>
            <a style="height: 50px;" onclick="IrEstadistica()" class="btn btn-raised btn-info">Generar</a>
		</div>
	</div>
</div>
<?
include('Footer.php'); 
?>
<script type="text/javascript">
var TipoE;
	$(document).ready(function(){
 		TipoE=$("#TipoEstadistica").val();    
  	});
	function Obtener(){
		TipoE=$("#TipoEstadistica").val();
	}
	function IrEstadistica(){
		if (TipoE==1) {
			window.open('ExEsAsis.php', '_blank');
		}
		if (TipoE==2) {
			window.open('ExEsPonencia.php?T=0', '_blank');
		}
		if (TipoE==3) {
			window.open('ExEsPonencia.php?T=1', '_blank');
		}
		if (TipoE==4) {
			window.open('ExEsAsisPaises.php', '_blank');
		}
	}
</script>
