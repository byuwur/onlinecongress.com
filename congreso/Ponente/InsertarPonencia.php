<?php 
include("conexion.php");
include("Variables.php");
include("../Idc.php");
include("Head.php");?>
<script src="js/dropzone.js"></script>
<link rel="stylesheet" type="text/css" href="css/dropzone.css">
<script type="text/javascript">
	jQuery(document).ready(function($){
		Dropzone.options.Pdf={
			maxFileSize:5,
			acceptedFiles: "application/pdf",
			init: function init(){
				this.on('error', function(){
					alert("Error al cargar el archivo");
				});
			}
		}
	});/*
	jQuery(document).ready(function($){
		Dropzone.options.myDrop1={
			maxFileSize:2,
			acceptedFiles: "image/*",
			init: function init(){
				this.on('error', function(){
					alert("Error al cargar el archivo");
				});
			}
		}
	});*/
</script>
<script type="text/javascript">
	function Archivo(){
		$Tipo = document.getElementById("TipoArchivo").value;
		if ($Tipo=="Video") {
			$('#Video').fadeIn('fast');
			$('#Alerta2').fadeIn('fast');
			$('#Pdf').fadeOut('fast');
			$('#Alerta').fadeOut('fast');
			$("#UrlVideo").attr('required', 'required');
		}else{
			$('#Video').fadeOut('fast');
			$('#Alerta2').fadeOut('fast');
			$('#Pdf').fadeIn('fast');
			$('#Alerta').fadeIn('fast');
			$("#UrlVideo").removeAttr('required');
		}
	}
</script>
<?php 
if ($IdPonente!="") {
echo '
<a onclick="OcultarMensaje()" style="cursor: pointer;">
	<div class="Mensaje" style="display: none;background:black; height: 60px; position: fixed; margin-top:530px; width: 50%;margin-left:25%;z-index: 1">
		<dir class="row">
			<div class="col-sm-12">
				<h4 style="text-align:center; color: #fff; margin-top:-10px;">Al registrar un Autor debes llenar todos los campos o sino no se podra guardar el registro</h4>
			</div>
		</dir>
	</div>
</a>
<div class="container">
	<div class="well">
		<h1 style="text-align:center;">FORMULARIO REGISTRO<br>PONENCIA</h1>
		<hr style="color:#ff5722; background:#ff5722; width:20%;" class="center-block">
		<h3>Información</h3>
		<hr style="color:#ff5722; background:#ff5722; width:30%; margin-left:1px">
		<div class="row">
			<div class="form-group col-xs-12 col-sm-2" style="margin-top: 0px;">
			    <label for="exampleSelect1" class="bmd-label-floating">Tipo de archivo</label>
			    <select class="form-control" id="TipoArchivo" name="Idioma" onchange="Archivo()">
			      <option value="Video">Vídeo</option>
			      <!--option value="Pdf">Pdf</option-->
			    </select>
			</div>
		</div>
		<div class="row">
			<!--div class="col-sm-3">
				<form action="Upload1.php" class="dropzone" id="Pdf" style="display: none;">
					<h2 style="text-align:center; color:#ff5722;">PDF</h2>
					<div class="form-group label-floating">
						<input type="file" name="file" accept=".pdf" required>
					</div>
					<input type="hidden" name="IDP" value='.$IdPonencia.'>
					<input type="hidden" name="Tipo" value="Pdf">
				</form>
			</div-->
            <div class="AlertContra alert alert-danger col-xs-12 col-sm-4" role="alert" style="font-size: 16px; text-align:center; display:none" id="Alerta">
                Recuerda que el archivo que vayas a cargar no debe de superar los 5 MB(Megabyte).
            </div>
		</div>
		<form action="" method="POST">
		<div id="Video">
			<div class="row">
				<div class="form-group label-floating col-xs-12 col-sm-6">
					<label class="control-label" for="Barrio">URL del vídeo. Ejemplo: https://www.youtube.com/Video</label>
					<input type="text" maxlength="1000" class="form-control" id="UrlVideo" name="UrlVideo" required>
					<input type="hidden" name="Tipo" value="Video">
				</div>
				<div class="AlertContra alert alert-danger col-xs-12 col-sm-6" role="alert" style="font-size: 16px; text-align:center;" id="Alerta2">
                Debes de copiar y pegar en este espacio la URL de tu vídeo, el cual debe de estar subido en tu cuenta de YouTube.
            </div>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-12">
				<label class="control-label" for="Barrio">Título ponencia</label>
				<textarea maxlength="500" class="form-control" name="TituloPonencia" rows="3" required></textarea>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-12">
			    <label for="exampleTextarea" class="control-label">Resúmen ponencia</label>
			    <textarea class="form-control" id="exampleTextarea" name="ResumenPonencia" rows="5" maxlength="2000" required></textarea>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-2" style="margin-top: 0px;">
			    <label for="exampleSelect1" class="bmd-label-floating">Idioma ponencia</label>
			    <select class="form-control" id="" name="Idioma">
			      <option>Español</option>
			      <option>Ingles</option>
			      <option>Portugués</option>
			    </select>
			 </div>
			<div class="form-group label-floating col-xs-12 col-sm-6" style="margin-top: 0px;">
			    <label for="exampleSelect1" class="bmd-label-floating">Sitio web</label>
				<input type="text" maxlength="500" class="form-control" name="SitioWeb">
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-12">
				<label class="control-label" for="Barrio">Institución patrocinadora</label>
				<input type="text" maxlength="250" class="form-control" name="InsPatro" required>
			</div>
		</div>
		<br>
		<br>
		<h3>Registrar primer autor<span style="font-size: 13px;"> *opcional</span></h3>
		<hr style="color:#ff5722; background:#ff5722; width:30%; margin-left:1px">
		<div class="row">
			<div class="form-group col-xs-12 col-sm-3" style="margin-top: 28px;">
			    <label for="exampleSelect1" class="bmd-label-floating"></label>
			    <select class="form-control" id="exampleSelect1" name="TipoDocumentoA1" style="color: #BDBDBD">
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
				<label class="control-label" for="Barrio">Numero documento</label>
				<input type="text" maxlength="30" class="form-control" onkeyup="ValidarMensaje()" name="DocumentoA1">
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Nombre(s)</label>
				<input type="text" maxlength="50" class="form-control" onkeyup="ValidarMensaje()" name="NombresA1">
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Apellido(s)</label>
				<input type="text" maxlength="50" class="form-control" name="ApellidosA1">
			</div>
			<div class="form-group col-xs-12 col-sm-2" style="margin-top: 0px;">
			    <label for="" class="bmd-label-floating">Nivel de formación</label>
			    <select class="form-control" id="" name="FormacionA1">
			      <option>Profesional</option>
			      <option>Maestría</option>
			      <option>Doctorado</option>
			      <option>Postdoctorado</option>
			    </select>
			 </div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Email</label>
				<input type="email" maxlength="100" class="form-control" name="EmailA1">
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-8">
				<label class="control-label" for="Barrio">Institución académica donde labora</label>
				<input type="text" maxlength="250" class="form-control" name="LaboraA1">
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" style="margin-left: 16px; ">País</label>
				<select class="form-control PaisA1" id="Pais1" name="Pais1" onchange="Cargar_Provincia1()" style="color: #818181">';
					
					$ConsultaG = $conex->query("SELECT * FROM Paises ORDER BY name_pais ASC");
					while($Dep=mysqli_fetch_assoc($ConsultaG)){
						echo "<option id='".$Dep[id]."' value='".$Dep[id]."'>".$Dep[name_pais]."</option>";  
					};
				
				echo '
				</select>
			</div>
			<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Provincia</label>
				<select id="Provincia1" name="Provincia1" class="Provincia1 form-control" onchange="Cargar1()">
				</select>
			</div>
			<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Ciudad</label>
				<select id="Ciudad1" name="Ciudad1" class="Ciudad1 form-control">
				</select>
			</div>
		</div>
		<br>
		<br>
		<h3>Registrar segundo autor<span style="font-size: 13px;"> *opcional</span></h3>
		<hr style="color:#ff5722; background:#ff5722; width:30%; margin-left:1px">
		<div class="row">
			<div class="form-group col-xs-12 col-sm-3" style="margin-top: 28px;">
			    <label for="exampleSelect1" class="bmd-label-floating"></label>
			    <select class="form-control" id="exampleSelect1" name="TipoDocumentoA2" style="color: #BDBDBD">
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
				<label class="control-label" for="Barrio">Numero documento</label>
				<input type="text" maxlength="30" class="form-control" name="DocumentoA2">
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Nombre(s)</label>
				<input type="text" maxlength="50" class="form-control" name="NombresA2">
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Apellido(s)</label>
				<input type="text" maxlength="50" class="form-control" name="ApellidosA2">
			</div>
			<div class="form-group col-xs-12 col-sm-2" style="margin-top: 0px;">
			    <label for="" class="bmd-label-floating">Nivel de formación</label>
			    <select class="form-control" id="" name="FormacionA2">
			      <option>Profesional</option>
			      <option>Maestría</option>
			      <option>Doctorado</option>
			      <option>Postdoctorado</option>
			    </select>
			 </div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Email</label>
				<input type="email" maxlength="100" class="form-control" name="EmailA2">
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-8">
				<label class="control-label" for="Barrio">Institución académica donde labora</label>
				<input type="text" maxlength="250" class="form-control" name="LaboraA2">
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" style="margin-left: 16px; ">País</label>
				<select class="form-control Pais2" id="Pais2" name="Pais2" onchange="Cargar_Provincia2()" style="color: #818181">';
					$ConsultaG = $conex->query("SELECT * FROM Paises ORDER BY name_pais ASC");
					while($Dep=mysqli_fetch_assoc($ConsultaG)){
						echo "<option id='".$Dep[id]."' value='".$Dep[id]."'>".$Dep[name_pais]."</option>";  
					};
				echo '
				</select>
			</div>
			<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Provincia</label>
				<select id="Provincia2" name="Provincia2" class="Provincia2 form-control" onchange="Cargar2()">
				</select>
			</div>
			<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Ciudad</label>
				<select id="Ciudad2" name="Ciudad2" class="Ciudad2 form-control">
				</select>
			</div>
		</div>
		<br>
		<br>
		<h3>Registrar tercer autor<span style="font-size: 13px;"> *opcional</span></h3>
		<hr style="color:#ff5722; background:#ff5722; width:30%; margin-left:1px">
		<div class="row">
			<div class="form-group col-xs-12 col-sm-3" style="margin-top: 28px;">
			    <label for="exampleSelect1" class="bmd-label-floating"></label>
			    <select class="form-control" id="exampleSelect1" name="TipoDocumentoA3" style="color: #BDBDBD">
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
				<label class="control-label" for="Barrio">Numero documento</label>
				<input type="text" maxlength="30" class="form-control" name="DocumentoA3">
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Nombre(s)</label>
				<input type="text" maxlength="50" class="form-control" name="NombresA3">
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Apellido(s)</label>
				<input type="text" maxlength="50" class="form-control" name="ApellidosA3">
			</div>
			<div class="form-group col-xs-12 col-sm-2" style="margin-top: 0px;">
			    <label for="" class="bmd-label-floating">Nivel de formación</label>
			    <select class="form-control" id="" name="FormacionA3">
			      <option>Profesional</option>
			      <option>Maestría</option>
			      <option>Doctorado</option>
			      <option>Postdoctorado</option>
			    </select>
			 </div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Email</label>
				<input type="email" maxlength="100" class="form-control" name="EmailA3">
			</div>
			<div class="form-group label-floating col-xs-12 col-sm-8">
				<label class="control-label" for="Barrio">Institución académica donde labora</label>
				<input type="text" maxlength="250" class="form-control" name="LaboraA3">
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-4">
				<label class="control-label" style="margin-left: 16px; ">País</label>
				<select class="form-control Pais3" id="Pais3" name="Pais3" onchange="Cargar_Provincia3()" style="color: #818181">';
					$ConsultaG = $conex->query("SELECT * FROM Paises ORDER BY name_pais ASC");
					while($Dep=mysqli_fetch_assoc($ConsultaG)){
						echo "<option id='".$Dep[id]."' value='".$Dep[id]."'>".$Dep[name_pais]."</option>";  
					};
				echo '
				</select>
			</div>
			<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Provincia</label>
				<select id="Provincia3" name="Provincia3" class="Provincia3 form-control" onchange="Cargar3()">
				</select>
			</div>
			<div style="margin-top: 0px;" class="form-group col-xs-12 col-sm-4">
				<label class="control-label" for="Barrio">Ciudad</label>
				<select id="Ciudad3" name="Ciudad3" class="CiudadA3 form-control">
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-2 col-sm-offset-10">
				<input type="submit" name="Guardar" value="Guardar" style="height: 50px;" class="Guardar btn btn-success btn-raised">
			</div>
		</div>
		<input type="hidden" name="Id_Congreso" value="'.$Idc.'">
	</form>
		<br>
	</div>
</div>
</div>';}else{
	echo "
    <script type='text/javascript'>
      document.location = '../index.php';
    </script>
  ";
}
?>
<script type="text/javascript">
	function ValidarMensaje(){
		$(".Mensaje").fadeIn('slow');
	}
	function OcultarMensaje(){
		$(".Mensaje").fadeOut('fast');
	}
</script>

<script type="text/javascript">
function Validar(){
	$(".Area_Oscura2").fadeOut('fast');
}
$(document).ready(function(){
  	$IdProvincia = $(".Pais1").val();
		var data = {Id:$IdProvincia};
		$("#Provincia1").empty();
		$.ajax({
			url: '../Service/Provincia.php',
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
					document.getElementById("Provincia1").appendChild(u);
				}
		});
  });
	function Cargar_Provincia1(){
		$IdProvincia = document.getElementById("Pais1").value;
		var data = {Id:$IdProvincia};
		$("#Provincia1").empty();
		$.ajax({
			url: '../Service/Provincia.php',
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
					document.getElementById("Provincia1").appendChild(u);
				}
		});
	}
	function Cargar1(){
		$IdCiudad = document.getElementById("Provincia1").value;
		var data = {Id:$IdCiudad};
		$("#Ciudad1").empty();
		$.ajax({
			url: '../Service/Ciudad.php',
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
					document.getElementById("Ciudad1").appendChild(u);
				}
		});
	}

$(document).ready(function(){
  	$IdProvincia = $(".Pais2").val();
		var data = {Id:$IdProvincia};
		$("#Provincia2").empty();
		$.ajax({
			url: '../Service/Provincia.php',
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
					document.getElementById("Provincia2").appendChild(u);
				}
		});
  });
	function Cargar_Provincia2(){
		$IdProvincia = document.getElementById("Pais2").value;
		var data = {Id:$IdProvincia};
		$("#Provincia2").empty();
		$.ajax({
			url: '../Service/Provincia.php',
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
					document.getElementById("Provincia2").appendChild(u);
				}
		});
	}
	function Cargar2(){
		$IdCiudad = document.getElementById("Provincia2").value;
		var data = {Id:$IdCiudad};
		$("#Ciudad2").empty();
		$.ajax({
			url: '../Service/Ciudad.php',
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
					document.getElementById("Ciudad2").appendChild(u);
				}
		});
	}

$(document).ready(function(){
  	$IdProvincia = $(".Pais3").val();
		var data = {Id:$IdProvincia};
		$("#Provincia3").empty();
		$.ajax({
			url: '../Service/Provincia.php',
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
					document.getElementById("Provincia3").appendChild(u);
				}
		});
  });
	function Cargar_Provincia3(){
		$IdProvincia = document.getElementById("Pais3").value;
		var data = {Id:$IdProvincia};
		$("#Provincia3").empty();
		$.ajax({
			url: '../Service/Provincia.php',
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
					document.getElementById("Provincia3").appendChild(u);
				}
		});
	}
	function Cargar3(){
		$IdCiudad = document.getElementById("Provincia3").value;
		var data = {Id:$IdCiudad};
		$("#Ciudad3").empty();
		$.ajax({
			url: '../Service/Ciudad.php',
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
					document.getElementById("Ciudad3").appendChild(u);
				}
		});
	}
</script>
<?php include('footer.php');
include("conexion.php");
include("Variables.php");
	if ($_POST['Guardar']) {
		
function id_youtube($url) {
    $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
    $array = preg_match($patron, $url, $parte);
    if (false !== $array) {
        return $parte[1];
    }
    return false;
}
/*
$Dir = $_POST['UrlVideo'];
$Nueva1 = id_youtube($Dir);
$UrlVideo= "https://www.youtube.com/embed/".$Nueva1;
*/
		$Id_Congreso=$_POST['Id_Congreso'];
		$Tipo=$_POST['Tipo'];
		$UrlVideo = $_POST['UrlVideo'];
		$TituloPonencia=$_POST['TituloPonencia'];
		$ResumenPonencia=$_POST['ResumenPonencia'];
		$SitioWeb=$_POST['SitioWeb'];
		$Idioma=$_POST['Idioma'];
		$InsPatro=$_POST['InsPatro'];
		date_default_timezone_set('America/Bogota'); 
		$Fecha = date("Y-m-d");

		$TipoDocumentoA1=$_POST['TipoDocumentoA1'];
		$DocumentoA1=$_POST['DocumentoA1'];
		$NombresA1=$_POST['NombresA1'];
		$ApellidosA1=$_POST['ApellidosA1'];
		$FormacionA1=$_POST['FormacionA1'];
		$EmailA1=$_POST['EmailA1'];
		$LaboraA1=$_POST['LaboraA1'];
		$Pais1=$_POST['Pais1'];
		$Provincia1=$_POST['Provincia1'];
		$Ciudad1=$_POST['Ciudad1'];
		$ContraA1=$_POST['DocumentoA1'];

		$TipoDocumentoA2=$_POST['TipoDocumentoA2'];
		$DocumentoA2=$_POST['DocumentoA2'];
		$NombresA2=$_POST['NombresA2'];
		$ApellidosA2=$_POST['ApellidosA2'];
		$FormacionA2=$_POST['FormacionA2'];
		$EmailA2=$_POST['EmailA2'];
		$LaboraA2=$_POST['LaboraA2'];
		$Pais2=$_POST['Pais2'];
		$Provincia2=$_POST['Provincia2'];
		$Ciudad2=$_POST['Ciudad2'];
		$ContraA2=$_POST['DocumentoA2'];

		$TipoDocumentoA3=$_POST['TipoDocumentoA3'];
		$DocumentoA3=$_POST['DocumentoA3'];
		$NombresA3=$_POST['NombresA3'];
		$ApellidosA3=$_POST['ApellidosA3'];
		$FormacionA3=$_POST['FormacionA3'];
		$EmailA3=$_POST['EmailA3'];
		$LaboraA3=$_POST['LaboraA3'];
		$Pais3=$_POST['Pais3'];
		$Provincia3=$_POST['Provincia3'];
		$Ciudad3=$_POST['Ciudad3'];
		$ContraA3=$_POST['DocumentoA3'];

		if ($TituloPonencia!="" && $ResumenPonencia!="" && $Idioma!="" && $Fecha!="") {
				$query2 = $conex->query("SELECT ponencia.IdPonencia FROM ponencia, ponente WHERE ponencia.IdPonencia='$IdPonencia' AND ponente.Id_Congreso='$Id_Congreso' AND ponencia.IdPonencia=ponente.IdPonencia");
				if (mysqli_num_rows($query2)!=0) {
					$query3 = $conex->query("UPDATE ponencia, ponente SET ponencia.Titulo='$TituloPonencia', ponencia.Resumen='$ResumenPonencia', ponencia.Idioma='$Idioma', ponencia.InstitucionPatrocinadora='$InsPatro', ponencia.SitioWeb='$SitioWeb', ponencia.Fecha='$Fecha' WHERE ponencia.IdPonencia='$IdPonencia' AND ponente.Id_Congreso='$Id_Congreso' AND ponencia.IdPonencia=ponente.IdPonencia");
					if ($Tipo=="Video") {
						$ResultadoUrl = str_replace("watch?v=", "embed/", $UrlVideo);
						$Registro_Evento = $conex->query("UPDATE archivosponentes SET Ruta='$ResultadoUrl', Tipo='$Tipo' where IdPonencia='$IdPonencia' AND Id_Congreso='$Id_Congreso'");
					}

					if ($DocumentoA1!="" && $NombresA1!="" && $ApellidosA1!="" && $EmailA1!="" && $LaboraA1!="") {
						$query4 = $conex->query("INSERT INTO autores VALUES('$Id_Congreso','$IdPonencia','$TipoDocumentoA1','$DocumentoA1','$NombresA1','$ApellidosA1', '$FormacionA1','$EmailA1','$LaboraA1','$Pais1','$Provincia1','$Ciudad1','$ContraA1','$Fecha')");	
					}
					if ($DocumentoA2!="" && $NombresA2!="" && $ApellidosA2!="" && $EmailA2!="" && $LaboraA2!="") {
						$query5 = $conex->query("INSERT INTO autores VALUES('$Id_Congreso','$IdPonencia','$TipoDocumentoA2','$DocumentoA2','$NombresA2','$ApellidosA2', '$FormacionA2','$EmailA2','$LaboraA2','$Pais2','$Provincia2','$Ciudad2','$ContraA2','$Fecha')");	
					}
					if ($DocumentoA3!="" && $NombresA3!="" && $ApellidosA3!="" && $EmailA3!="" && $LaboraA3!="") {
						$query6 = $conex->query("INSERT INTO autores VALUES('$Id_Congreso','$IdPonencia','$TipoDocumentoA3','$DocumentoA3','$NombresA3','$ApellidosA3', '$FormacionA3','$EmailA3','$LaboraA3','$Pais3','$Provincia3','$Ciudad3','$ContraA3','$Fecha')");	
					}
						echo "
					      <div style='display:block;left:0px;' class='Area_Oscura2'>
					        <div class='container'>
					          <div class='row'>
					            <div class='col-sm-4 col-sm-offset-4'>
					              <div class='well' style='margin-top:55%;'>
					                <h4 align='center'>La información se ha guardado correctamente.</h4>
					                <div class='row'>
					                  <div class='col-sm-6 col-sm-offset-3'>
					                      <a onclick='Recargar()' style='width:100%; cursor:pointer;' class='Ocultar_A btn btn btn-info btn-raised'>Aceptar</a>
					                  </div>
					                </div>
					              </div>
					            </div>
					          </div>
					        </div>
					      </div>
					      ";
				}else{
				}
		}
	}
echo "
	<script type='text/javascript'>
	function Recargar(){
		top.location.reload();
	}
	</script>";
?>