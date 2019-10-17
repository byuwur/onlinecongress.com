<?php 
include("conexion.php");
include("Variables.php");
include("Head.php");
if ($Usuario != ""){
echo "
	<form action='' method='POST'>
			<div class='container'>
				<div class='row'>
					<div class='col-xs-12 col-sm-6 offset-sm-3 card' style='margin-top:50px;'>
						<h2 style='text-align:center'>CAMBIO DE CONTRASEÑA<h2>
						<div class='form-group col-xs-12'>
			                <label for='exampleInputEmail1' style='font-size: 16px ' class='control-label'>Contraseña actual</label>
			                <input type='password' class='form-control' id='' name='ContrasenaA' required>
			              </div>
			              <div class='row'>
							<div class='form-group label-floating col-xs-12 col-sm-12'>
								<label class='control-label' for='Barrio'>Nueva contraseña</label>
								<input onkeyup='ValidarContra()' type='password' id='Contra1' maxlength='250' class='form-control' name='Contra1' required>
							</div>
							<div class='form-group label-floating col-xs-12 col-sm-12'>
								<label class='control-label' for='Barrio'>Verifique la nueva contraseña</label>
								<input onkeyup='ValidarContra()' type='password' id='Contra2' maxlength='250' class='form-control' name='Contra2' required>
							</div>
						</div>
			              </div>
						<div class='row'>
							<div class='col-sm-12 col-sm-6'>
								<div class='AlertContra alert alert-danger' role='alert' style='font-size: 16px; display: none'>
							  		Las contraseñas no coinciden.
								</div>
							</div>
						</div>
						<div class='row'>
							<div class='col-xs-12 col-sm-2 col-sm-offset-10'>
								<input type='submit' name='Guardar' value='Guardar' style='height: 50px; display: none' class='Guardar btn btn-success btn-raised'>
							</div>
						</div>
					</div>
				</div>
			</div>
		<input type='hidden' value='$Id_Congreso' name='Id_Congreso'>
		<input type='hidden' value='$Usuario' name='Documento'>
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
	$ContrasenaA=md5($_POST['ContrasenaA']);
	$ContrasenaN=md5($_POST['Contra1']);
	$Verif=$conex->query("SELECT administrador.Documento FROM administrador, congreso WHERE administrador.Password='$ContrasenaA' AND administrador.Documento='$Documento1' AND congreso.Id_Congreso='$Idc' AND administrador.Documento=congreso.Id_Administrador");
	if (mysqli_num_rows($Verif)!=0) {
		$Verif2=$conex->query("UPDATE administrador, congreso SET administrador.Password='$ContrasenaN' WHERE administrador.Documento='$Documento1' AND congreso.Id_Congreso='$Idc' AND administrador.Documento=congreso.Id_Administrador");
		echo "
                <div style='display:block;left:0px;' class='Area_Oscura2'>
                  <div class='container'>
                    <div class='row'>
                      <div class='col-sm-4 col-sm-offset-4'>
                        <div class='card' style='margin-top:55%; height:150px;'>
                        	<br>
                          <h4 align='center'>La contraseña ha sido actualizada.</h4>
                          <div class='row'>
                            <div class='col-sm-6 col-sm-offset-3'>
                                <a href='Contrasena.php' style='width:100%; padding-top:10px; margin-top:15px;' class='btn btn-info btn-raised'>Aceptar</a>
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
                        <div class='card' style='margin-top:55%; height:150px;'>
                        	<br>
                          <h4 align='center'>La contraseña actual no coincide.</h4>
                          <div class='row'>
                            <div class='col-sm-6 col-sm-offset-3'>
                                <a href='Contrasena.php' style='width:100%; padding-top:10px; margin-top:15px;' class='btn btn-info btn-raised'>Aceptar</a>
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
include('Footer.php'); 
?>

<script type="text/javascript">
	function ValidarContra(){
		$Contra1=$("#Contra1").val();
		$Contra2=$("#Contra2").val();
		if ($Contra1==$Contra2) {
			$(".AlertContra").fadeOut('fast');
			$(".Guardar").fadeIn('fast');
		}else{
			if ($Contra1!="" && $Contra2!="") {
				$(".AlertContra").fadeIn('fast');
				$(".Guardar").fadeOut('fast');
			}else{
				$(".AlertContra").fadeOut('fast');
			}
		}
	}
</script>