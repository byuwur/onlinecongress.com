<?php 
include("Variables.php");
include("conexion.php");
include('Head.php');

$Partici= $conex->query("SELECT Id_Congreso FROM participacion WHERE Id_Congreso='$Id_Congreso'");
      if (mysqli_num_rows($Partici)<1 ) {
        $conex->query("INSERT INTO participacion VALUES('$Id_Congreso', '')");
      }
if ($Usuario!="") {
	echo "
	<form action='' method='POST'>
			<div class='container'>
				<div class='row'>
					<div class='col-xs-12 col-sm-6 col-sm-offset-3 well' style='margin-top:50px;'>
						<h2 style='text-align:center'>Comentarios de los participantes<h2>
						<label for='exampleSelect2' class='bmd-label-floating'>Activar o Desactivar</label>
						    <select class='form-control' id='exampleSelect2' name='Activar'>
						      	<option value='0'>Desactivar</option>
								<option value='1'>Activar</option>
						</select>
						<div class='row'>
							<div class='col-xs-12 col-sm-4 col-sm-offset-4'>
							 	<input type='submit' name='Aceptar' value='Aceptar' style='height: 50px;' class='Generar btn btn-success btn-raised'>
							</div>
						</div>
					</div>
				</div>
			</div>
	</form>
	";
	if ($_POST['Aceptar']) {
		$Activar = $_POST['Activar'];
			$Sql1=$conex->query("UPDATE participacion SET Participacion='$Activar' WHERE Id_Congreso='$Id_Congreso'");
			if ($Activar==0) {
				echo "
                <div style='display:block;left:0px;' class='Area_Oscura2'>
                  <div class='container'>
                    <div class='row'>
                      <div class='col-sm-4 col-sm-offset-4'>
                        <div class='well' style='margin-top:55%;'>
                          <h4 align='center'>La sección de comentarios se han DESACTIVADO.</h4>
                          <div class='row'>
                            <div class='col-sm-6 col-sm-offset-3'>
                                <a href='Congreso.php' style='width:100%; padding-top:10px' class='btn btn-info btn-raised'>Aceptar</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                ";
			}else{
				echo "
                <div style='display:block;left:0px;' class='Area_Oscura2'>
                  <div class='container'>
                    <div class='row'>
                      <div class='col-sm-4 col-sm-offset-4'>
                        <div class='well' style='margin-top:55%;'>
                          <h4 align='center'>La sección de comentarios se han ACTIVADO.</h4>
                          <div class='row'>
                            <div class='col-sm-6 col-sm-offset-3'>
                                <a href='Congreso.php' style='width:100%; padding-top:10px' class='btn btn-info btn-raised'>Aceptar</a>
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
}else{
  echo "
    <script type='text/javascript'>
      document.location = '../index.php';
    </script>
  ";
}
?>