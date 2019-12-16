<?php 
include("Variables.php");
include("conexion.php");
echo '
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
<style>
  	.Area_Oscura2{
	  background: rgba(81,81,81,0.7);
	  display: none;
	  margin-left: 0px;
	  position: fixed;
	  margin-top: -40px;
	  width: 100%;
	  height: 115%;
	  z-index: 10009;
	  margin-top: 0px;
	  top: 0px;
	  left: 0px;
	}
</style>
  <body>
';
if ($Usuario!="") {
	echo "
	<form action='' method='POST'>
			<div class='container'>
				<div class='row'>
					<div class='col-xs-12 col-sm-6 offset-sm-3 card' style='margin-top:50px;'>
						<h2 style='text-align:center'>Crear Reglas de participación<h2>
						<div class='form-group col-xs-12'>
			                <label for='exampleInputEmail1' style='font-size: 16px ' class='control-label'>Ingrese regla de participación</label>
			                <textarea maxlength='2000' class='form-control' name='NRegla' rows='3' required></textarea>
			              </div>
						<div class='row'>
							<div class='col-sm-4 offset-sm-4'>
							 	<input type='submit' name='Guardar' value='Guardar' style='width:100%; height: 50px;' class='Generar btn btn-success btn-raised'>
							</div>
						</div>
					</div>
				</div>
			</div>
		<input type='hidden' value='$Id_Congreso' name='Id_Congreso'>
	</form>

	";
	echo '<div class="container">
  <div class="col-xs-12 col-sm-12">
 
      <h1 style="text-align:center;">LISTADO DE COMITÉS CREADOS</h1>
      <hr style="color:#0277bd; background:#0277bd; width:30%;" class="center-block">
      <br
      <br
      <br
      <div class="row">
        <table class="table">
			  <thead style="background: #f2f2f2">
			    <tr>
			    	<th scope="col">NUMERO</th>
			      	<th scope="col">REGLA DE PARTICIPACIÓN</th>
			      	<th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  ';
			  $query1=$conex->query("SELECT Id_Regla, Regla FROM reglas_participacion WHERE Id_Congreso='$Id_Congreso'");
			  $Num=0; 
			  	while ($resultado=mysqli_fetch_assoc($query1)) {
			  		$Num=$Num+1;
			  		echo "<tr>
			  			<td>".$Num."</td>
					      <td>".$resultado['Regla']."</td>
					    
					      <td>
					      <a data-toggle='modal' data-target='' href='#".$resultado[Id_Regla]."' class='Eliminar'>
						                        <img src='img/Eliminar.svg'>
						                      </a> </td>
					    </tr>
					    ";
					    echo "
						<div class='modal modal-static fade' id='".$resultado[Id_Regla]."' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
						    <div class='modal-dialog'>
						        <div style='height:auto;' class='modal-content'>
						            <div class='modal-body'>
						               <div class=''>
						                    <div class='row'>
						                        <div class='col-xs-12 col-sm-12' style='text-align:center; height:115px;'>
						                            <h4>¿Estás seguro que deseas eliminar regla número <strong>".$Num."</strong>?</h4>
						                        </div>
						                    </div>
						                    <div class='row'>
						                        <div class='col-sm-4'>
						                            <a style='width:100%; height: 50px;' href='#' data-dismiss='modal' aria-hidden='true' class='btn btn-danger btn-raised' >Cancelar</a>
						                        </div>
						                        <div class='col-sm-4 offset-sm-4'>
						                            <form action='' method='POST'>
						                                <input data-toggle='modal' data-target='#Mensaje' type='submit' style='width:100%; height: 50px; margin-top:-18px;' name='Eliminar' class='btn btn-info btn-raised' value='Eliminar'>
						                                <input type='hidden' name='Idc' value='".$Id_Congreso."'>                   
						                                <input type='hidden' name='ID' value='".$resultado[Id_Regla]."'> 
						                            </form>
						                        </div>
						                    </div>
						                </div>
						            </div>
						        </div>
						    </div>
						</div>";
			  	}
			    echo '
			  </tbody>
			</table>
      </div>
    </div>
</div>';

}
if ($_POST['Eliminar']){
		$IDC = $_POST['Idc'];
		$ID=$_POST['ID'];
		$SqlM=$conex->query("DELETE FROM reglas_participacion WHERE Id_Regla='$ID' AND Id_Congreso='$IDC'");
    	echo "
				<div style='display:block' class='Area_Oscura2'>
					<div class='container'>
						<div class='row'>
							<div class='col-sm-4 offset-sm-4'>
								<div class='card' style='margin-top:55%; height:150px;'>
                        			<br>								
									<h4 align='center'>La regla se ha eliminado correctamente</h4>
									<div class='row'>
										<div class='col-sm-4 offset-sm-4'>
											<a href='ReglasParticipacion.php' style='height:45px; width:100%; margin-top:10px;' class='btn btn-info btn-raised'>Aceptar</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				";
	}
if ($_POST['Guardar']) {
	$NRegla=$_POST['NRegla'];
	$Idc=$_POST['Id_Congreso'];
	$conex->query("INSERT INTO reglas_participacion VALUES (null,'$Id_Congreso','$NRegla')");
	echo "
                <div style='display:block;left:0px;' class='Area_Oscura2'>
                  <div class='container'>
                    <div class='row'>
                      <div class='col-sm-4 offset-sm-4'>
                        <div class='card' style='margin-top:55%; height:150px;'>
                        	<br>
                          <h4 align='center'>La regla ha sido creada.</h4>
                          <div class='row'>
                            <div class='col-sm-6 offset-sm-3'>
                                <a href='ReglasParticipacion.php' style='width:100%; padding-top:10px; margin-top:15px;' class='btn btn-info btn-raised'>Aceptar</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                ";
}
echo '<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $("body").bootstrapMaterialDesign(); });</script>
  </body>
</html>';
?>
