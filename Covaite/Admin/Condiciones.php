<?php 
include("Variables.php");
include("conexion.php");
include("Head.php");
echo '

<script src="js/dropzone.js"></script>
<link rel="stylesheet" type="text/css" href="css/dropzone.css">

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
';
if ($Usuario!="") {
	echo "
	<form action='' method='POST'>
			<div class='container'>
				<div class='row'>
					<div class='col-xs-12 card' style='margin-top:50px;'>
						<h2 style='text-align:center'>Crear condiciones para la elaboración de comunicaciones videonarradas<h2>
						<div class='form-group col-xs-12'>
			                <label for='exampleInputEmail1' style='font-size: 16px ' class='control-label'>Ingrese condición</label>
			                <textarea maxlength='2000' class='form-control' name='NCondicion' rows='3' required></textarea>
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
 
      <h1 style="text-align:center;">LISTADO DE CONDICIONES</h1>
      <hr style="color:#0277bd; background:#0277bd; width:30%;" class="center-block">
      <br
      <br
      <br
      <div class="row">
        <table class="table">
			  <thead style="background: #f2f2f2">
			    <tr>
			    	<th scope="col">NUMERO</th>
			      	<th scope="col">CONDICIONES</th>
			      	<th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  ';
			  $query1=$conex->query("SELECT Id_Condicion, Condicion FROM condiciones WHERE Id_Congreso='$Id_Congreso'");
			  $Num=0; 
			  	while ($resultado=mysqli_fetch_assoc($query1)) {
			  		$Num=$Num+1;
			  		echo "<tr>
			  			<td>".$Num."</td>
					      <td>".$resultado['Condicion']."</td>
					    
					      <td>
					      <a data-toggle='modal' data-target='' href='#".$resultado[Id_Condicion]."' class='Eliminar'>
						                        <img src='img/Eliminar.svg'>
						                      </a> </td>
					    </tr>
					    ";
					    echo "
						<div class='modal modal-static fade' id='".$resultado[Id_Condicion]."' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
						    <div class='modal-dialog'>
						        <div style='height:auto;' class='modal-content'>
						            <div class='modal-body'>
						               <div class=''>
						                    <div class='row'>
						                        <div class='col-xs-12 col-sm-12' style='text-align:center; height:115px;'>
						                            <h4>¿Estás seguro que deseas eliminar la condición número <strong>".$Num."</strong>?</h4>
						                        </div>
						                    </div>
						                    <div class='row'>
						                        <div class='col-sm-6'>
						                            <a style='width:100%; height: 50px;' href='#' data-dismiss='modal' aria-hidden='true' class='btn btn-danger btn-raised' >Cancelar</a>
						                        </div>
						                        <div class='col-sm-6'>
						                            <form action='' method='POST'>
						                                <input data-toggle='modal' data-target='#Mensaje' type='submit' style='width:100%; height: 50px;' name='Eliminar' class='btn btn-info btn-raised' value='Eliminar'>
						                                <input type='hidden' name='Idc' value='".$Id_Congreso."'>                   
						                                <input type='hidden' name='ID' value='".$resultado[Id_Condicion]."'> 
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
$Sql5=$conex->query("SELECT Id_Congreso FROM condiciones WHERE Id_Congreso='$Id_Congreso'");
if (mysqli_num_rows($Sql5)>0) {
	echo '
<div class="container" style="margin-top:50px">
  <div class="col-xs-12 col-sm-12">
    <div class="card">
      <h1 style="text-align:center;">PDF CON PLANTILLA</h1>
      <hr style="color:#0277bd; background:#0277bd; width:30%;" class="mx-auto">
      <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
          <p style="text-align: center;">Elija un PDF donde se encuentren los pasos y plantillas de cómo se debe de realizar una comunicación videonarrada.</p>
          <form action="UploadCondiciones.php" class="dropzone" id="myDrop1">
            <h2 style="text-align:center; color:#0277bd;">PDF</h2>
            <div class="form-group label-floating">
              <input type="file" name="archivo">
            </div>
            <input type="hidden" id="Id_Congreso" name="Id_Congreso" value="'.$Id_Congreso.'">
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
           <div class="alert alert-danger" role="alert">La plantilla en PDF solo será subida una vez, no será necesario seleccionarla varias veces.</div>
        </div>
      </div>
    </div>
  </div>
</div>
	';
}
}
if ($_POST['Eliminar']){
		$IDC = $_POST['Idc'];
		$ID=$_POST['ID'];
		$SqlM=$conex->query("DELETE FROM condiciones WHERE Id_Condicion='$ID' AND Id_Congreso='$IDC'");
    	echo "
				<div style='display:block' class='Area_Oscura2'>
					<div class='container'>
						<div class='row'>
							<div class='col-sm-4 col-sm-offset-4'>
								<div class='card' style='margin-top:55%; height:150px;'>
									<h4 align='center'>La condición se ha eliminado correctamente</h4>
									<div class='row'>
                            			<div class='col-sm-6 col-sm-offset-3'>
											<a href='Condiciones.php' style='height:45px; width:100%; margin-top:10px;' class='btn btn-info btn-raised'>Aceptar</a>
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
	$NCondicion=$_POST['NCondicion'];
	$Idc=$_POST['Id_Congreso'];
	$conex->query("INSERT INTO condiciones VALUES (null,'$Id_Congreso','$NCondicion','')");
	echo "
                <div style='display:block;left:0px;' class='Area_Oscura2'>
                  <div class='container'>
                    <div class='row'>
                      <div class='col-sm-4 col-sm-offset-4'>
                        <div class='card' style='margin-top:55%; height:150px;'>
                        	<br>
                          <h4 align='center'>La condición ha sido creada.</h4>
                          <div class='row'>
                            <div class='col-sm-6 col-sm-offset-3'>
                                <a href='Condiciones.php' style='width:100%; padding-top:10px; margin-top:15px;' class='btn btn-info btn-raised'>Aceptar</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                ";
}
include('Footer.php');
?>
<script type="text/javascript">
  jQuery(document).ready(function($){
    Dropzone.options.myDrop1={
      maxFileSize:5,
      acceptedFiles: ".pdf",

      init: function() {
        this.on("success", function(file, responseText) {
        });
        }
    }
  });
  function Generar(){
    var Id_Congreso=$("#Id_Congreso").val();
    var Url='Exportar_Certificado.php?Doc=0&T=10&Id='+Id_Congreso;
    window.open(Url);
  }
</script>
