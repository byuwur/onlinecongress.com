<?php 
include("conexion.php");
include("Idc.php");
include('Head.php');
include('Nav.php'); 
include('Idc.php'); 
$Sql1=$conex->query("SELECT Asistente FROM inscripciones WHERE Id_Congreso='$Idc'");
$A=mysqli_fetch_assoc($Sql1);
$Resultado=$A['Asistente'];
if ($Resultado==0) {
	 echo "
	    <script type='text/javascript'>
	      document.location = 'index.php';
	    </script>
	  ";
}
?>
<div class="triangulo-equilatero-bottom-left animar2" style="margin-top:0px;">
  <div class="row">
      <div class="col-sm-12" style="color: #fff;">
        <h2 style="margin-top:25%; text-align: left;">Acompáñanos en esta experiencia educativa única.</h2>
      </div>
    </div>
</div>
<div class="parallax-window" data-parallax="scroll" data-image-src="Img_Web/Slider/image-1-P.jpg" style="margin-top:110px; height: 300px; max-height: 300px; min-height: 300px;">
</div>
<br>
<br>
<div class="container">
	<div class="well">
		<form action="" method="POST">
		<h1 style="text-align:center;">FORMULARIO DE INSCRIPCIÓN<br>ASISTENTES</h1>
		<hr style="color:#ff5722; background:#ff5722; width:20%;" class="center-block">
		<div class="row">
			<div class="form-group col-xs-12 col-sm-3" style="margin-top: 0px;">
			    <label for="exampleSelect1" class="bmd-label-floating">Tipo de documento de identidad</label>
			    <select class="form-control" id="exampleSelect1" name="TipoDocumento">
			      	<option>Cédula de ciudadanía</option>
			      	<option>Cédula de identidad</option>
					<option>Carteira de Identidade o Registro Geral</option>
					<option>Documento único de identidad</option>
					<option>Documento personal de identificación</option>
					<option>Tarjeta de identidad</option>
					<option>Clave única de registro de población y Credencial para Votar o Credencial de Elector</option>
					<option>Cédula de identidad personal</option>
					<option>Cédula de identidad civil</option>
					<option>Cartão de Cidadão</option>
					<option>Cédula de identidad y electoral</option>
					<option>Pasaporte</option>
			    </select>
			 </div>
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="">Número documento</label>
				<input type="text" maxlength="30" class="form-control" name="Documento" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="">Nombre(s)</label>
				<input type="text" maxlength="50" class="form-control" name="Nombres" required>
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="">Apellido(s)</label>
				<input type="text" maxlength="50" class="form-control" name="Apellidos" required>
			</div>
			<div class="form-group col-xs-12 col-sm-2" style="margin-top: 0px;">
			    <label for="exampleSelect1" class="bmd-label-floating">Genero</label>
			    <select class="form-control" id="exampleSelect1" name="Genero">
			      <option>Femenino</option>
			      <option>Masculino</option>
			      <option>Otro</option>
			    </select>
			 </div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-6">
				<label class="control-label" for="Barrio">Email</label>
				<input type="email" maxlength="100" class="form-control" name="Email" required>
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-6">
				<label class="control-label" for="Barrio">Institución</label>
				<input type="text" maxlength="200" class="form-control" name="Institucion">
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" style="margin-left: 16px; ">País</label>
				<select class="form-control" id="Pais" name="Pais" onchange="Cargar_Provincia()">
					<?php
					$ConsultaG = $conex->query("SELECT * FROM paises ORDER BY name_pais ASC");
					while($Dep=mysqli_fetch_assoc($ConsultaG)){
						echo "<option id='".$Dep[id]."' value='".$Dep[id]."'>".$Dep[name_pais]."</option>";  
					}?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-3">
				<label class="control-label" for="Barrio">Contraseña</label>
				<input onkeyup="ValidarContra()" type="password" id="Contra1" maxlength="250" class="form-control" name="Contra1" required>
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-3">
				<label class="control-label" for="Barrio">Verifique contraseña</label>
				<input onkeyup="ValidarContra()" type="password" id="Contra2" maxlength="250" class="form-control" name="Contra2" required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-sm-6">
				<div class="AlertContra alert alert-danger" role="alert" style="font-size: 16px; display: none">
			  		Las contraseñas no coinciden.
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-2 col-sm-offset-10">
				<input type="submit" name="Guardar" value="Guardar" style="height: 50px; display: none" class="Guardar btn btn-success btn-raised">
			</div>
		</div>
	</form>
	</div>
</div>
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
<?php
include("conexion.php");
	if ($_POST['Guardar']) {
		$count = 1;
		while ($count!=0) {
			$chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghyjklmnopqrstuvwxyz';
   			$randomString = '';
    		for ($i = 0; $i < 6; $i++) {
        		$randomString .= $chars[rand(0, strlen($chars) - 1)];
    		}
			$query1 = "SELECT asistente.IdAsistente FROM asistente, registro_asistencia WHERE asistente.IdAsistente='$randomString' AND registro_asistencia.Id_Congreso='$Idc' AND registro_asistencia.Id_Asistente='$randomString'";
			$result = $conex->query($query1);
			$count = mysqli_num_rows($result);
		}

		$TipoDocumento=$_POST['TipoDocumento'];
		$Documento=$_POST['Documento'];
		$Nombres=$_POST['Nombres'];
		$Apellidos=$_POST['Apellidos'];
		$Genero=$_POST['Genero'];
		$Email=$_POST['Email'];
		$Institucion=$_POST['Institucion'];
		$Pais=$_POST['Pais'];
		$Contra1=$_POST['Contra1'];
		$Contra2=$_POST['Contra2'];
		date_default_timezone_set('America/Bogota'); 
		$Fecha = date("Y-m-d");
		$Año = date("Y");
		if ($Documento!="" && $Nombres!="" && $Apellidos!="" && $Genero!="" && $Email!="") {
				$query2 = $conex->query("SELECT asistente.DocumentoA FROM asistente, registro_asistencia WHERE asistente.DocumentoA='$Documento' AND asistente.AñoA='$Año' AND registro_asistencia.Id_Congreso='$Idc' AND registro_asistencia.Id_Asistente=asistente.IdAsistente");		
				if (mysqli_num_rows($query2)!=0) {
					echo "
				      <div style='display:block;left:0px;' class='Area_Oscura2'>
				        <div class='container'>
				          <div class='row'>
				            <div class='col-sm-4 col-sm-offset-4'>
				              <div class='well' style='margin-top:55%;'>
				                <h4 align='center'>Ya existe un usuario con este Número de documento.</h4>
				                <div class='row'>
				                  <div class='col-sm-6 col-sm-offset-3'>
				                      <a href='Registro.php?T=2' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
				                  </div>
				                </div>
				              </div>
				            </div>
				          </div>
				        </div>
				      </div>
				      ";
				}else{
				$Contra=md5($Contra1);
				$query3 = $conex->query("INSERT INTO asistente VALUES('$randomString','$TipoDocumento','$Documento','$Nombres','$Apellidos', '$Institucion', '$Genero','$Email', '$Pais', '$Contra', '$Año', '2')");
				$Registro = $conex->query("INSERT INTO registro_asistencia VALUES ('$Idc', '$randomString','$Año')");
				$Ncon= $conex->query("SELECT congreso.Nombre,congreso.Logo, info_congreso.Subdominio, administrador.Email FROM congreso, info_congreso, administrador WHERE congreso.Id_Congreso='$Idc' AND info_congreso.Id_Congreso='$Idc'");
				$NombreC=mysqli_fetch_assoc($Ncon);
					$Destino = $Email;
			        $Remitente = "soporteonlinecongress@gmail.com";
			        $Asunto = 'Notificación plataforma';
			        $Cuerpo = '
			        <html>
			        <head>
			          <title></title>
			        </head>
			        <body>
			          <p style="font-size:28px; color:#333"><strong>Bienvenido: </strong> '.$Nombres.' '.$Apellidos.', Su registro ha sido exitoso, ahora puede ingresar a la plataforma de '.$NombreC[Nombre].'.</p>
			          <br>
			          <div>
			            <p style="font-size:28px; color:#333"><strong>Usuario: </strong> '.$Documento.' </p>
			            <p style="font-size:28px; color:#333"><strong>Password: </strong>Es su mismo número de usuario.</p>			           
			            <p style="font-size:28px; color:#333"><strong>Password: </strong>Es la que ingreso a la hora de registrarse.</p>
			            <br>
			            <hr style="width:45%; background:#ccc;" align="left">
			            <br>
			            <table>
			              <tr>
		                    <td width="250px">
		                        <a href="'.$Resul[Subdominio].'">
		                          <img src="'.$Resul[Logo].'">
		                        </a>
		                    </td>
			              </tr>
			            </table>
			          </body>
			          </html>
			          ';
			          $Cabecera = "MIME-Version: 1.0\r\n";
			          $Cabecera.="Content-type: text/html; charset=iso-8859-1\r\n";
			          $Cabecera.="From: " . $Remitente;

			          @mail($Destino, $Asunto, $Cuerpo, $Cabecera);
				
				echo "
				      <div style='display:block;left:0px;' class='Area_Oscura2'>
				        <div class='container'>
				          <div class='row'>
				            <div class='col-sm-4 col-sm-offset-4'>
				              <div class='well' style='margin-top:55%;'>
				                <h4 align='center'>La información se ha guardado correctamente.</h4>
				                <div class='row'>
				                  <div class='col-sm-6 col-sm-offset-3'>
				                     <a href='Ponente/index.php?T=2' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
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

?>
<script type="text/javascript">
function Validar(){
	$(".Area_Oscura2").fadeOut('fast');
}
</script>
<?php include('footer.php');?>