<?php 
include("conexion.php");
include("Idc.php");
include('Head.php');
include('Nav.php');

$Sql1=$conex->query("SELECT Ponente FROM inscripciones WHERE Id_Congreso='$Idc'");
$A=mysqli_fetch_assoc($Sql1);
$Resultado=$A['Ponente'];
if ($Resultado==0) {
	 echo "
	    <script type='text/javascript'>
	      document.location = 'index.php';
	    </script>
	  ";
}
?>
<div class="triangulo-equilatero-bottom-left animar2" style="margin-top:0px;">
	<div class="container">
	  <div class="row">
	      	<div class="col-xs-12 col-sm-4" style="color: #fff;">
	        	<h2 style="margin-top:20%; margin-left: -250px;">Destinado a Investigadores en el área de Educación y Tecnología. Socializa tus proyectos de investigación y experiencias con TIC en el aula.</h2>
	      	</div>
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
		<h1 style="text-align:center;">FORMULARIO DE INSCRIPCIÓN<br>
		<?php
			$Tipo=$_GET['T'];
			if ($Tipo==1) {
				echo "CONFERENCISTA";
			}else{
				echo "PONENTE";
			}
		?>
		</h1>
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
				<label class="control-label" for="Barrio">Número documento</label>
				<input type="text" maxlength="30" class="form-control" name="Documento" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Nombre(s)</label>
				<input type="text" maxlength="50" class="form-control" name="Nombres" required>
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Apellido(s)</label>
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
			 <div class="form-group label-floating col-xs-12 col-sm-2">
				<label class="control-label" for="Barrio">Teléfono</label>
				<input type="number" maxlength="20" class="form-control" name="Telefono" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-6">
				<label class="control-label" for="Barrio">Email</label>
				<input type="email" maxlength="100" class="form-control" name="Email" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-8">
				<label class="control-label" for="Barrio">Institución académica donde labora</label>
				<input type="text" maxlength="250" class="form-control" name="Labora" required>
			</div>
			<div class="form-group col-xs-12 col-sm-2" style="margin-top: 0px;">
			    <label for="exampleSelect1" class="bmd-label-floating">Nivel de formación</label>
			    <select class="form-control" id="exampleSelect1" name="Formacion">
			      <option>Profesional</option>
			      <option>Maestría</option>
			      <option>Doctorado</option>
			      <option>Postdoctorado</option>
			    </select>
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
			<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Provincia</label>
				<select id="Provincia" name="Provincia" class="form-control" onchange="Cargar()">
				</select>
			</div>
			<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Ciudad</label>
				<select id="Ciudad" name="Ciudad" class="form-control">
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-12">
					<?php
						$Tipo=$_GET['T'];
						if ($Tipo==1) {
							echo '<label for="exampleTextarea" class="control-label">Resúmen bibliográfico del conferencista</label>';
						}else{
							echo '<label for="exampleTextarea" class="control-label">Resúmen bibliográfico del ponente</label>';
						}
					?>
			    
			    <textarea class="form-control" id="exampleTextarea" name="Resumen" rows="5" maxlength="1000" required></textarea>
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
		<?php
			$Tipo=$_GET['T'];
			echo '<input type="hidden" name="Tipo" value="'.$Tipo.'">';
		?>
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
	if ($_POST['Guardar']) {
		$count = 1;
		while ($count!=0) {
			$chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   			$randomString = '';
    		for ($i = 0; $i < 6; $i++) {
        		$randomString .= $chars[rand(0, strlen($chars) - 1)];
    		}
			$query1 = "SELECT IdPonencia FROM ponencia WHERE IdPonencia='$randomString' AND Id_Congreso='$Idc'";
			$result = $conex->query($query1);
			$count = mysqli_num_rows($result);
		}

		$TipoDocumento=$_POST['TipoDocumento'];
		$Documento=$_POST['Documento'];
		$Nombres=$_POST['Nombres'];
		$Apellidos=$_POST['Apellidos'];
		$Genero=$_POST['Genero'];
		$Telefono=$_POST['Telefono'];
		$Email=$_POST['Email'];
		$Labora=$_POST['Labora'];
		$Formacion=$_POST['Formacion'];
		$Pais=$_POST['Pais'];
		$Provincia=$_POST['Provincia'];
		$Ciudad=$_POST['Ciudad'];
		$Resumen=$_POST['Resumen'];
		$Contra1=$_POST['Contra1'];
		$Contra2=$_POST['Contra2'];
		$Tipo=$_POST['Tipo'];
		date_default_timezone_set('America/Bogota'); 
		$Fecha = date("Y-m-d");
		$Año = date("Y");
		if ($Documento!="" && $Nombres!="" && $Apellidos!="" && $Genero!="" && $Telefono!="" && $Email!="" && $Labora!="" && $Formacion!="") {
				$query2 = $conex->query("SELECT IdPonente FROM ponente WHERE IdPonente='$Documento' AND Año='$Año' AND Id_Congreso='$Idc'");		
				if (mysqli_num_rows($query2)!=0) {
					echo "
				      <div style='display:block;left:0px;' class='Area_Oscura2'>
				        <div class='container'>
				          <div class='row'>
				            <div class='col-sm-4 col-sm-offset-4'>
				              <div class='well' style='margin-top:55%;'>
				                <h4 align='center'>Ya existe un usuario con este número de documento.</h4>
				                <div class='row'>
				                  <div class='col-sm-6 col-sm-offset-3'>
				                      <a href='inscripcion.php?T=$Tipo' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
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
				$query3 = $conex->query("INSERT INTO ponente VALUES('$Idc', '$randomString','$TipoDocumento','$Documento','$Nombres','$Apellidos','$Genero','$Email','$Telefono','$Pais','$Provincia','$Ciudad','$Resumen','$Labora','$Formacion','','$Fecha','$Año','$Contra','$Tipo')");
				$querie4 = $conex->query("INSERT INTO ponencia VALUES('$randomString','','','','','','$Fecha','$Tipo','0','0')");
				$queryTipo=$conex->query("INSERT INTO archivosponentes VALUES('$Idc', '$randomString','0','')");
				$Ncon= $conex->query("SELECT congreso.Nombre,congreso.Logo, info_congreso.Subdominio, administrador.Email FROM congreso, info_congreso, administrador WHERE congreso.Id_Congreso='$Idc' AND info_congreso.Id_Congreso='$Idc'");
				$NombreC=mysqli_fetch_assoc($Ncon);
					$Destino = $Email;
			        $Remitente = "comitetecnico@covaite.com";
			        $Asunto = 'Notificación plataforma';
			        $Cuerpo = '
			        <html>
			        <head>
			          <title></title>
			        </head>
			        <body>
			          <p style="font-size:28px; color:#333"><strong>Bienvenido: </strong> '.$Nombres.' '.$Apellidos.', tú registro ha sido exitoso, ahora pudes ingresar a la plataforma de '.$NombreC[Nombre].'.</p>
			          <br>
			          <div>
			            <p style="font-size:28px; color:#333"><strong>Usuario: </strong> '.$Documento.' </p>
			            <p style="font-size:28px; color:#333"><strong>Password: </strong>Es la que ingresaste a la hora de registrate.</p>
			            <p style="font-size:28px; color:#333"><strong>Recuerda ingresar a: </strong><a style="text-decoration:none;" href="http://covaite.com">www.covaite.com</a></p>
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
				                      <a href='Ponente/index.php?T=$Tipo' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
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
$(document).ready(function(){
  	$IdProvincia = document.getElementById("Pais").value;
		var data = {Id:$IdProvincia};
		$("#Provincia").empty();
		$.ajax({
			url: 'Service/Provincia.php',
			type: 'POST',
			data: data,
			dataType: "json",
			beforeSend: function(){
				console.log('enviando datos a la BD.... :)');
			}
		}).done(function(Provincia) {

			var dataJson = eval(Provincia);
				for(var i in dataJson){
					var u = document.createElement('option');
					u.value = dataJson[i].Id_Provincia;
					u.style.color = '#818181';
					u.innerText = dataJson[i].Provincia;
					document.getElementById("Provincia").appendChild(u);
				}
		});
  });
	function Cargar_Provincia(){
		$IdProvincia = document.getElementById("Pais").value;
		var data = {Id:$IdProvincia};
		$("#Provincia").empty();
		$.ajax({
			url: 'Service/Provincia.php',
			type: 'POST',
			data: data,
			dataType: "json",
			beforeSend: function(){
				console.log('enviando datos a la BD.... :)');
			}
		}).done(function(Provincia) {

			var dataJson = eval(Provincia);
				for(var i in dataJson){
					var u = document.createElement('option');
					u.value = dataJson[i].Id_Provincia;
					u.style.color = '#818181';
					u.innerText = dataJson[i].Provincia;
					document.getElementById("Provincia").appendChild(u);
				}
		});
	}
	function Cargar(){
		$IdCiudad = document.getElementById("Provincia").value;
		var data = {Id:$IdCiudad};
		$("#Ciudad").empty();
		$.ajax({
			url: 'Service/Ciudad.php',
			type: 'POST',
			data: data,
			dataType: "json",
			beforeSend: function(){
				console.log('enviando datos a la BD.... :)');
			}
		}).done(function(Ciudad) {

			var dataJson = eval(Ciudad);
				for(var i in dataJson){
					var u = document.createElement('option');
					u.value = dataJson[i].Id_Ciudad;
					u.style.color = '#818181';
					u.innerText = dataJson[i].Ciudad;
					document.getElementById("Ciudad").appendChild(u);
				}
		});
	}
</script>
<?php include('footer.php');?>