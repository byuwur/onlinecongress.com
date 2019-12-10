<?php
include('Variables.php');
include('Head.php');
include('conexion.php');
$Consul = $conex->query("SELECT Id_Congreso, Img FROM certificados WHERE Id_Congreso='$Id_Congreso'");
$Id=mysqli_fetch_assoc($Consul);
?>
<div class="container">
	<div class="well" style="margin-top: 50px;">
		<div class="row">
			<div class="col-xs-12">
				<h2 style="text-align: center;">Descarga el certificado según tú participación</h2>
			</div>
		</div>
		<br>
		<br>
		<form action="" method="POST">
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-sm-offset-1">
				 	<label for="exampleSelect1" class="bmd-label-floating">¿Como participaste?</label>
					    <select class="form-control" id="exampleSelect1" name="Tipo">
					      	<option value="0">Ponente</option>
					      	<option value="1">Conferencista</option>
							<option value="2">Asistente</option>
					</select>
				</div>
				<div class="col-xs-12 col-sm-4" style="margin-top: -5px">
				 	<label class="control-label" for="Barrio">Número documento</label>
					<input type="text" maxlength="30" class="form-control" name="Documento" required>
				</div>
				<div class="col-xs-12 col-sm-3 col-sm-offset-1">
				 	<input type="submit" name="Generar" value="Generar" style="height: 50px;" class="Generar btn btn-success btn-raised">
				</div>
			</div>
			<input type="hidden" id="Id_Congreso"  name="Id_Congreso" <?php echo 'value="'.$Id_Congreso.'"';?>>
		</form>
		<br>
		<?php 
	      if ($Id[Img]!="") {

	          echo '
	          <div class="row">
	            <div class="col-sm-4">
	              <a onclick="Generar()" style="height: 50px" type="button" class="btn btn-info btn-raised" style="color: #fff" id="BtnGuardar">Ver ejemplo del certificado</a>
	            </div>
	          </div>
	          ';
	      }
	      ?>
	</div>
	<div class="alert alert-danger" role="alert" style="text-align: justify;">
		ONLINECONGRESS, les informa que para poder descargar los certificados, deben tener desbloqueadas las ventanas emergentes de su navegador.   Los navegadores bloquean de forma predeterminada las ventanas emergentes, para que no aparezcan automáticamente en su pantalla. 
		Al bloquear una ventana emergente, aparece el icono de ventanas emergentes bloqueadas en la barra de direcciones. En la parte superior derecha, elige la opción Permitir siempre pop-ups….  Luego, regresar a la opción generar certificado.  Ya con el anterior paso realizado, usted podrá acceder al documento de certificación.
		<br><br>
 	 	Al inscribirse como asistente en el II Congreso Virtual Argentino e Iberoamericano de Tecnología y Educación- COVAITE2019. Se adquiere un compromiso con la participación de este.
		Se hace través de los comentarios que hagan a las diferentes ponencias y conferencias.  Si no los hizo, lamentamos comunicar que no se podrá entregar el certificado como asistente.
	</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php 

if ($_POST['Generar']) {
    include("conexion.php");

	$Tipo = $_POST['Tipo'];
	$Documento = $_POST['Documento'];
	$Id_Congreso = $_POST['Id_Congreso'];
	date_default_timezone_set('America/Bogota'); 
	$Fecha = date("Y-m-d");
	$Año = date("Y");

	if ($Tipo==2) {
		$Sql1=$conex->query("SELECT Id_Asistente FROM registro_asistencia WHERE Id_Asistente='$Documento' AND Anno='$Año' AND Id_Congreso='$Id_Congreso'");
		if (mysqli_num_rows($Sql1)>0) {
			$D=mysqli_fetch_assoc($Sql1);
			$Sql2=$conex->query("SELECT IdUsuario FROM comentarios WHERE IdUsuario='$Documento' AND TipoU='$Tipo' AND Id_Congreso='$Id_Congreso'");

			if (mysqli_num_rows($Sql2)>0) {
				$IdUsuario = $D['Id_Asistente'];
			}
			if ($IdUsuario!="") {
				echo "
					<script type='text/javascript'>
				    	window.open('Exportar_Certificado.php?Doc=$IdUsuario&T=$Tipo&Id=$Id_Congreso');
				    </script>
				";
			}else{
				echo "
	                <div style='display:block;left:0px;' class='Area_Oscura2'>
	                  <div class='container'>
	                    <div class='row'>
	                      <div class='col-sm-4 col-sm-offset-4'>
	                        <div class='well' style='margin-top:55%;'>
	                          <h4 align='center'>El asistente no tuvo participación en el congreso.</h4>
	                          <div class='row'>
	                            <div class='col-sm-6 col-sm-offset-3'>
	                                <a href='Certificado.php' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
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
	                          <h4 align='center'>No se encontrados datos del participante en el congreso.</h4>
	                          <div class='row'>
	                            <div class='col-sm-6 col-sm-offset-3'>
	                                <a href='Certificado.php' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
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
		$Sql1=$conex->query("SELECT IdPonente FROM Ponente WHERE IdPonente='$Documento' AND Tipo='$Tipo' AND Año='$Año'");
		$D=mysqli_fetch_assoc($Sql1);
		$IdUsuario = $D['IdPonente'];
		if ($IdUsuario!="") {
			echo "
				<script type='text/javascript'>
			    	window.open('Certificado.php?Doc=$IdUsuario&T=$Tipo');
			    </script>
			";
		}else{
			echo "
                <div style='display:block;left:0px;' class='Area_Oscura2'>
                  <div class='container'>
                    <div class='row'>
                      <div class='col-sm-4 col-sm-offset-4'>
                        <div class='well' style='margin-top:55%;'>
                          <h4 align='center'>Verifica tus datos ingresados.</h4>
                          <div class='row'>
                            <div class='col-sm-6 col-sm-offset-3'>
                                <a href='Certificados.php' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
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
}

include('footer.php');?>
<script type="text/javascript">
	
  function Generar(){
    var Id_Congreso=$("#Id_Congreso").val();
    var Url='Exportar_Certificado.php?Doc=0&T=10&Id='+Id_Congreso;
    window.open(Url);
  }
</script>