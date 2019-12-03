<?php 
include("../conectar_bd.php");
include('Head.php');
echo '
	<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
';
$IdPonencia = $_GET['P'];
$Usuario = $_GET['U'];
$TipoU = $_GET['TU'];
$Idc = $_GET['IDC'];
$sql=$conex->query("SELECT archivosponentes.Ruta, archivosponentes.Tipo, ponente.IdPonente,ponente.Nombres, ponente.Apellidos, ponente.NivelFormacion, ponencia.Titulo FROM archivosponentes, ponente, ponencia WHERE archivosponentes.IdPonencia='$IdPonencia' AND ponencia.IdPonencia='$IdPonencia' AND ponente.IdPonencia='$IdPonencia' AND archivosponentes.Id_Congreso='$Idc' AND ponente.Id_Congreso='$Idc' AND ponente.IdPonencia=ponencia.IdPonencia AND ponente.Id_Congreso=archivosponentes.Id_Congreso");
$Resultado=mysqli_fetch_assoc($sql);
$IdPonente=$Resultado['IdPonente'];

$Sql1=$conex->query("SELECT Participacion FROM participacion WHERE Id_Congreso='$Idc' ");
$R=mysqli_fetch_assoc($Sql1);
$Parti=$R['Participacion'];

echo '
<input type="hidden" id="IdPonencia" value="'.$IdPonencia.'">
<input type="hidden" id="Usuario" value="'.$Usuario.'">
<input type="hidden" id="IdPonente" value="'.$IdPonente.'">
<input type="hidden" id="TipoU" value="'.$TipoU.'">
<input type="hidden" id="Parti" value="'.$Parti.'">
<input type="hidden" id="Id_Congreso" value="'.$Idc.'">
';?>
<script type="text/javascript">
	//setInterval('Cargar()',5000);
	$(document).ready(function(){
		var Id_Congreso = document.getElementById("Id_Congreso").value;
      	var Ponencia = document.getElementById("IdPonencia").value;
      	var Usuario = document.getElementById("Usuario").value;
      	var IdPonente = document.getElementById("IdPonente").value;
      	var TipoU = document.getElementById("TipoU").value;
      	var Parti1 = document.getElementById("Parti").value;
   		var data = {Id_Congreso:Id_Congreso,IdPonencia:Ponencia,TipoU:TipoU};

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
					h3.innerText=dataJson[i].Nombres+' '+dataJson[i].Apellidos;
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
					if (Parti1==1) {
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
					}
					document.getElementById(Cont).appendChild(hr);

				}
			});
  });
</script>
<?php

if ($Parti==1) {
echo '
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h2>Comentarios</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
			    <textarea  class="form-control" id="ComentarioNuevo" rows="3" placeholder="Crear nuevo comentario"></textarea>
			</div>
		</div>
		<div class="col-xs-12 col-sm-2">
			<a class="btn btn-raised" style="height:50px; background: #818181; color:#fff" onclick="AgregarComentario()">Enviar</a>
		</div>
	</div>
</div>';
}
?>
<div class="container">
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
		var Id_Congreso=$("#Id_Congreso").val();
		var Comentario=$("#ComentarioNuevo").val();
		var IdPonencia=$("#IdPonencia").val();
		var IdPonente=$("#IdPonente").val();
		var Usuario=$("#Usuario").val();
		var TipoU=$("#TipoU").val();
		Bandera=1;
		if (Comentario!="") {
			var data={Id_Congre:Id_Congreso,NComentario:Comentario,IdP:IdPonencia,IdU:Usuario,TipoU:TipoU};
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
      	var Id_Congreso = document.getElementById("Id_Congreso").value;
      	var Usuario = document.getElementById("Usuario").value;
      	var IdPonente = document.getElementById("IdPonente").value;
      	var TipoU = document.getElementById("TipoU").value;
      	var Parti = document.getElementById("Parti").value;
   		var data = {Id_Congreso:Id_Congreso,IdPonencia:Ponencia,TipoU:TipoU};

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
					var span = document.createElement('span');
					span.setAttribute("class","badge badge-info");
					span.style.background="#03a9f4";
					span.style.marginLeft="5px";
					h3.innerText=dataJson[i].Nombres+' '+dataJson[i].Apellidos;
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
					if (Parti==1) {
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
					}
					document.getElementById(Cont).appendChild(hr);

				}
			});
  }

	function EliminarComentario(){
		Bandera=2;
		var IdPonencia = $("#IdPonencia").val();
		var Id_Cong=$("#Id_Congreso").val();
      	var Usuario = document.getElementById("Usuario").value;
      	var TipoU = document.getElementById("TipoU").value;
   		var data = {IdCong:Id_Cong,IdComentario:Id_Comentario,IdPonencia:IdPonencia};

   		$.ajax({
			url: 'EliminarComentario.php',
			type: 'POST',
			data: data,
			dataType: "json",
			beforeSend: function(){
				console.log('enviando datos a la BD.... :)');
			}
			}).done(function(Result) {
				document.location = 'Ponencia.php?U='+Usuario+'&P='+IdPonencia+'&TU='+TipoU;
		});
  }
</script>
<?php include('footer.php');?>