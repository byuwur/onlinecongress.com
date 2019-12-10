<?php 
include("conexion.php");
include('Head.php');
echo '
	<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
';
$IdPonencia = $_GET['P'];
$Usuario = $_GET['U'];
$Tipo = $_GET['T'];
$sql=$conex->query("SELECT ArchivosPonentes.Ruta, ArchivosPonentes.Tipo, Ponente.IdPonente,Ponente.Nombres, Ponente.Apellidos, Ponente.NivelFormacion, Ponencia.Titulo FROM ArchivosPonentes, Ponente, Ponencia WHERE ArchivosPonentes.IdPonencia='$IdPonencia' AND Ponencia.IdPonencia='$IdPonencia' AND Ponente.IdPonencia='$IdPonencia'");
$Resultado=mysqli_fetch_assoc($sql);
$IdPonente=$Resultado['IdPonente'];
echo '
<input type="hidden" id="IdPonencia" value="'.$IdPonencia.'">
<input type="hidden" id="Usuario" value="'.$Usuario.'">
<input type="hidden" id="IdPonente" value="'.$IdPonente.'">
<input type="hidden" id="TipoU" value="'.$TipoU.'">
<div class="container">
	<div class="">';
		echo "<h2>".$Resultado['Titulo']."</h2>";
		$Url = $Resultado['Ruta'];
		if ($Resultado['Tipo']=="Video") {
			$ResultadoUrl = str_replace("watch?v=", "embed/", $Url);
			echo '
			<br>
			<br>
			<iframe width="560" height="515" style="height:515px" src="'.$ResultadoUrl.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			';
		}else {
			echo '<iframe src="'.$Resultado['Ruta'].'" style="width:100%; height:500px; margin-top:30px;" frameborder="0"> </iframe>';
		}
	echo '
	<div class="row">
		<div class="col-xs-12 col-sm-offset-10 col-sm-2">
			<a class="btn btn-raised btn-info" style="height:50px; color:#fff" href="MasInfoPonencia.php?P='.$IdPonencia.'&U='.$Usuario.'">Ver Información</a>
		</div>
	</div>
	</div>
</div>';?>
<script type="text/javascript">
	//setInterval('Cargar()',5000);
	$(document).ready(function(){
	
      	var Ponencia = document.getElementById("IdPonencia").value;
      	var Usuario = document.getElementById("Usuario").value;
      	var IdPonente = document.getElementById("IdPonente").value;
      	var TipoU = document.getElementById("TipoU").value;
   		var data = {IdPonencia:Ponencia,TipoU:TipoU};

   		$.ajax({
			url: 'Services/Comentarios.php',
			type: 'POST',
			data: data,
			dataType: "json",
			beforeSend: function(){
				console.log('enviando datos a la BD.... :)');
			}
			}).done(function(Result) {
				var dataJson = eval(Result);
				var Cont=9000001;
				var Cont2=20000001;
				var ContD="";
				for(var i in dataJson){
					Cont = Cont+1;
					Cont2 = Cont2+1;
					var div = document.createElement('div');
					div.setAttribute("class","col-xs-12 comentarios");
					div.id = Cont;
					var input = document.createElement('input');
					input.type="hidden";
					input.value=dataJson[i].IdComentario;
					var h3 = document.createElement('h3');
					var span = document.createElement('span');
					span.setAttribute("class","badge badge-info");
					span.style.background="#03a9f4";
					span.style.marginLeft="5px";
					h3.innerText=dataJson[i].Nombres;
					h3.id=Cont2;
					if (IdPonente==dataJson[i].IdUsuario) {
						span.innerText=" *Autor";
					}
					var p = document.createElement('p');
					p.innerText=dataJson[i].Comentario;
					var h5 = document.createElement('h5');
					h5.innerText=dataJson[i].Fecha;
					var hr = document.createElement('hr');

					document.getElementById("Contenedor").appendChild(div);

					document.getElementById(Cont).appendChild(h3);
					document.getElementById(Cont2).appendChild(span);
					document.getElementById(Cont).appendChild(p);
					document.getElementById(Cont).appendChild(h5);
					if (Usuario==dataJson[i].IdUsuario || IdPonente==Usuario) {
						var a = document.createElement('a');
						var IdA = dataJson[i].IdComentario;
						a.id=IdA;	
						a.name=dataJson[i].IdComentario;					
						a.onclick = function(){
							Id_Comentario = $(this,"a").attr("name");
							EliminarComentario();
						}
						var img = document.createElement('img');
						img.setAttribute("src","img/Eliminar.svg");
						img.setAttribute("title","Eliminar Comentario");
						img.setAttribute("style","margin-top:-60px;margin-left:95%; cursor:pointer");
						document.getElementById(Cont).appendChild(a);
						document.getElementById(IdA).appendChild(img);
					}
					document.getElementById(Cont).appendChild(hr);

				}
			});
  });
</script>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h2>Comentarios</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
			    <label for="exampleTextarea" class="bmd-label-floating">Crear nuevo comentario</label>
			    <textarea  class="form-control" id="ComentarioNuevo" rows="3"></textarea>
			</div>
		</div>
		<div class="col-xs-12 col-sm-2">
			<a class="btn btn-raised" style="height:50px; background: #818181; color:#fff" onclick="AgregarComentario()">Agregar</a>
		</div>
	</div>
	<div class="row" id="Contenedor">
		
	</div>
</div>
<style type="text/css">
	.comentarios:hover{
		background: #f3f3f3;
	}
</style>
<?php
   	$IdPonencia = $_GET['P'];

echo '	
	<script type="text/javascript">
	    Pusher.logToConsole = true;

	    var pusher = new Pusher("ad3e2b909ae8d24f7fd9", {
	      cluster: "us2",
	      forceTLS: true
	    });
	    var channel = pusher.subscribe("'.$IdPonencia.'");
	    channel.bind("my-event", function(data) {
		    Cargar();
	    });
	</script>';
?>

<script type="text/javascript">
	var Bandera=0;
    function AgregarComentario(){
		var Comentario=$("#ComentarioNuevo").val();
		var IdPonencia=$("#IdPonencia").val();
		var IdPonente=$("#IdPonente").val();
		var Usuario=$("#Usuario").val();
		var TipoU=$("#TipoU").val();
		Bandera=1;
		if (Comentario!="") {
			var data={NComentario:Comentario,IdP:IdPonencia,IdU:Usuario,TipoU:TipoU};
			 $.ajax({
				url: 'pusher.php',
				type: 'POST',
				data: data,
				dataType : 'json',
	          success : function(json) {
	          }  
	        });
		}
	}

var Id_Comentario=0;
function Cargar(){
	Cargar2();
	$("#ComentarioNuevo").val("");
}
setTimeout('Cargar2()',5000);

	function Cargar2(){
			
      	var Ponencia = document.getElementById("IdPonencia").value;
      	var Usuario = document.getElementById("Usuario").value;
      	var IdPonente = document.getElementById("IdPonente").value;
      	var TipoU = document.getElementById("TipoU").value;
   		var data = {IdPonencia:Ponencia,TipoU:TipoU};

   		$.ajax({
			url: 'Services/Comentarios.php',
			type: 'POST',
			data: data,
			dataType: "json",
			beforeSend: function(){
				console.log('enviando datos a la BD.... :)');
			}
			}).done(function(Result) {
				var dataJson = eval(Result);
				var Cont=9000001;
				var Cont2=20000001;
				var ContD="";
				$("#Contenedor").empty();
				for(var i in dataJson){
					Cont = Cont+1;
					Cont2 = Cont2+1;
					var div = document.createElement('div');
					div.setAttribute("class","col-xs-12 comentarios");
					div.id = Cont;
					var input = document.createElement('input');
					input.type="hidden";
					input.value=dataJson[i].IdComentario;
					var h3 = document.createElement('h3');
					h3.innerText=dataJson[i].Nombres;
					var span = document.createElement('span');
					span.setAttribute("class","badge badge-info");
					span.style.background="#03a9f4";
					span.style.marginLeft="5px";
					h3.innerText=dataJson[i].Nombres;
					h3.id=Cont2;
					if (IdPonente==dataJson[i].IdUsuario) {
						span.innerText=" *Autor";
					}
					var p = document.createElement('p');
					p.innerText=dataJson[i].Comentario;
					var h5 = document.createElement('h5');
					h5.innerText=dataJson[i].Fecha;
					var hr = document.createElement('hr');

					document.getElementById("Contenedor").appendChild(div);

					document.getElementById(Cont).appendChild(h3);
					document.getElementById(Cont2).appendChild(span);
					document.getElementById(Cont).appendChild(p);
					document.getElementById(Cont).appendChild(h5);
					if (Usuario==dataJson[i].IdUsuario || IdPonente==Usuario) {
						var a = document.createElement('a');
						var IdA = dataJson[i].IdComentario;
						a.id=IdA;

						a.name=dataJson[i].IdComentario;
						a.onclick = function(){
							Id_Comentario = $(this,"a").attr("name");
							EliminarComentario();
						}
						var img = document.createElement('img');
						img.setAttribute("src","img/Eliminar.svg");
						img.setAttribute("title","Eliminar Comentario");
						img.setAttribute("style","margin-top:-60px;margin-left:95%; cursor:pointer");
						document.getElementById(Cont).appendChild(a);
						document.getElementById(IdA).appendChild(img);
					}
					document.getElementById(Cont).appendChild(hr);

				}
			});
  }

	function EliminarComentario(){
		Bandera=2;
		var IdPonencia = $("#IdPonencia").val();
   		var data = {IdComentario:Id_Comentario,IdPonencia:IdPonencia};

   		$.ajax({
			url: 'EliminarComentario.php',
			type: 'POST',
			data: data,
			dataType: "json",
			success : function(json) {
	          } 
		});
  }
</script>
<?php include('footer.php');?>