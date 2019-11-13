<?php 
include("conexion.php");
include("Variables.php");
include("../Idc.php");
include("Head.php");?>
<script src="js/dropzone.js"></script>
<link rel="stylesheet" type="text/css" href="css/dropzone.css">
<script type="text/javascript">
	jQuery(document).ready(function($){
		Dropzone.options.myDrop1={
			maxFileSize:5,
			acceptedFiles: 'image/*',

			init: function init(){
				this.on("error", function(){
					alert("Error al cargar el archivo");
				});
			}
		}
	});
</script>
<?php 
if ($IdPonente!="") {
echo '
<div class="container">
	<div class="well">
		<h1 style="text-align:center;">FORMULARIO REGISTRO<br>CONFERENCIA</h1>
		<hr style="color:#ff5722; background:#ff5722; width:20%;" class="center-block">
		<h3>Fotografía conferencista</h3>
		<hr style="color:#ff5722; background:#ff5722; width:30%; margin-left:1px">
		<div class="row">
			<div class="col-sm-3">
				<form action="upload.php" class="dropzone" id="myDrop1">
					<h2 style="text-align:center; color:#ff5722;">Fotografía</h2>
					<div class="form-group label-floating">
						<input type="file" name="file">
					</div>
					<input type="hidden" name="IDP" value="'.$IdPonencia.'">
				</form>
			</div>
		</div>
		<h3>Información</h3>
		<hr style="color:#ff5722; background:#ff5722; width:30%; margin-left:1px">
		<form action="" method="POST">
		<div id="Video">
			<div class="row">
				<div class="form-group label-floating col-xs-12 col-sm-6">
					<label class="control-label" for="Barrio">URL del vídeo. Ejemplo: https://www.youtube.com/Video</label>
					<input type="text" maxlength="1000" class="form-control" id="UrlVideo" name="UrlVideo" required>
					<input type="hidden" name="Tipo" value="Video">
				</div>
				<div class="AlertContra alert alert-danger col-xs-12 col-sm-6" role="alert" style="font-size: 16px; text-align:center;" id="Alerta2">
                Debe de copiar y pegar en este espacio la URL de su vídeo, el cual debe de estar subido en tu cuenta de YouTube.
            </div>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-12">
				<label class="control-label" for="Barrio">Título conferencia</label>
				<textarea maxlength="500" class="form-control" name="TituloPonencia" rows="3" required></textarea>
			</div>
		</div>
		<div class="row">
			<div class="form-group label-floating col-xs-12 col-sm-12">
			    <label for="exampleTextarea" class="control-label">Resumen conferencia</label>
			    <textarea class="form-control" id="exampleTextarea" name="ResumenPonencia" rows="5" maxlength="2000" required></textarea>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-2" style="margin-top: 0px;">
			    <label for="exampleSelect1" class="bmd-label-floating">Idioma conferencia</label>
			    <select class="form-control" id="" name="Idioma">
			      <option>Español</option>
			      <option>Ingles</option>
			      <option>Portugués</option>
			    </select>
			 </div>
			<div class="form-group label-floating col-xs-12 col-sm-6" style="margin-top: 0px;">
			    <label for="Barrio" class="bmd-label-floating">Sitio web</label>
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
}/*
$Dir = $_POST['UrlVideo'];
$Nueva1 = id_youtube($Dir);
$UrlVideo= "https://www.youtube.com/embed/".$Nueva1;*/

		$Tipo=$_POST['Tipo'];
		$Id_Congreso=$_POST['Id_Congreso'];
		$UrlVideo = $_POST['UrlVideo'];
		$TituloPonencia=$_POST['TituloPonencia'];
		$ResumenPonencia=$_POST['ResumenPonencia'];
		$SitioWeb=$_POST['SitioWeb'];
		$Idioma=$_POST['Idioma'];
		$InsPatro=$_POST['InsPatro'];
		date_default_timezone_set('America/Bogota'); 
		$Fecha = date("Y-m-d");

	
		if ($TituloPonencia!="" && $ResumenPonencia!="" && $Idioma!="" && $Fecha!="") {
				$query2 = $conex->query("SELECT ponencia.IdPonencia FROM ponencia, ponente WHERE ponencia.IdPonencia='$IdPonencia' AND ponente.Id_Congreso='$Id_Congreso' AND ponencia.IdPonencia=ponente.IdPonencia");
				if (mysqli_num_rows($query2)!=0) {
					$ResultadoUrl = str_replace("watch?v=", "embed/", $UrlVideo);
					$Registro_Evento = $conex->query("UPDATE archivosponentes SET Ruta='$ResultadoUrl', Tipo='$Tipo' where IdPonencia='$IdPonencia' AND Id_Congreso='$Id_Congreso'");

					$query3 = $conex->query("UPDATE ponencia, ponente SET ponencia.Titulo='$TituloPonencia', ponencia.Resumen='$ResumenPonencia', ponencia.Idioma='$Idioma', ponencia.InstitucionPatrocinadora='$InsPatro', ponencia.SitioWeb='$SitioWeb', ponencia.Fecha='$Fecha' WHERE ponencia.IdPonencia='$IdPonencia' AND ponente.Id_Congreso='$Id_Congreso' AND ponencia.IdPonencia=ponente.IdPonencia");
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