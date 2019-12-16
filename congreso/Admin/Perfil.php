<?php 
include("conexion.php");
include("Variables.php");
include("Head.php");
$Admin1=$conex->query("SELECT administrador.Documento, administrador.NombreCompleto, administrador.Email FROM administrador, congreso WHERE administrador.Documento='$Usuario' AND congreso.Id_Congreso='$Id_Congreso' AND administrador.Documento=congreso.Id_Administrador");
$Datos=mysqli_fetch_assoc($Admin1);
if ($Usuario != ""){
echo "
	<form action='' method='POST'>
			<div class='container'>
				<div class='row'>
					<div class='col-xs-12 col-sm-6 offset-sm-3 card' style='margin-top:50px;'>
						<h2 style='text-align:center'>INFORMACION ADMINISTRADOR</h2>
						<div class='form-group col-xs-12'>
			                <label for='exampleInputEmail1' style='font-size: 16px ' class='control-label'>Documento</label>
			                <input value='".$Datos[Documento]."' type='text' class='form-control' id='' name='Documento' required>
			              </div>
			              <div class='row'>
							<div class='form-group label-floating col-xs-12 col-sm-12'>
								<label class='control-label' for='Barrio'>Nombre del administrador</label>
								<input value='".$Datos[NombreCompleto]."' type='text' class='form-control' name='Nombre' required>
							</div>
							<div class='form-group label-floating col-xs-12 col-sm-12'>
								<label class='control-label' for='Barrio'>Email del administrador</label>
								<input value='".$Datos[Email]."' type='email' class='form-control' name='Email' required>
							</div>
						</div>
							<div class='col-xs-12 col-sm-2 col-sm-offset-10'>
								<input type='submit' name='Guardar' value='Guardar' style='height: 50px;'class='btn btn-success btn-raised'>
							</div>
						</div>
					</div>
				</div>
			</div>
		<input type='hidden' value='$Id_Congreso' name='Id_Congreso'>
		<input type='hidden' value='$Usuario' name='Documento2'>
	</form>
";
}else{
  echo "
    <script type='text/javascript'>
      document.location = '../index.php';
    </script>
  ";
}
if ($_POST['Guardar']) {
	$Idc=$_POST['Id_Congreso'];
	$Documento1=$_POST['Documento'];
	$Documento2=$_POST['Documento2'];
	$Nombre=$_POST['Nombre'];
	$Email=$_POST['Email'];

	$Verif=$conex->query("UPDATE administrador, congreso SET administrador.Documento='$Documento1', congreso.Id_Administrador='$Documento1', administrador.NombreCompleto='$Nombre', administrador.Email='$Email' WHERE administrador.Documento='$Documento2' AND congreso.Id_Congreso='$Idc' AND administrador.Documento=congreso.Id_Administrador");
	
		echo "
                <div style='display:block;left:0px;' class='Area_Oscura2'>
                  <div class='container'>
                    <div class='row'>
                      <div class='col-sm-4 col-sm-offset-4'>
                        <div class='card' style='margin-top:55%; height:150px;'>
                        	<br>
                          <h4 align='center'>La información ha sido actualizada.</h4>
                          <div class='row'>
                            <div class='col-sm-6 col-sm-offset-3'>
                                <a href='#' onclick='Volver()' style='width:100%; padding-top:10px; margin-top:15px;' class='btn btn-info btn-raised'>Aceptar</a>
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
<script type='text/javascript'>
	function Volver(){

      window.top.location = 'index.php?cerrar=cerrar';
	}
    </script>
