<?php
include('Head.php');
include('Nav.php');
include("conexion.php");
include("Idc.php");?>
<style type="text/css">
	p,ul{
		color: #818181; 
		font-size: 16px;
	}
	ul{
		margin-left:40px;
	}
	button{
		width: 100%;
	}
	h4{
		text-align: left;
		font-weight: bold;
	}
	.btn-link:focus, .btn-link:hover {
      text-decoration: none;
	}
	a{
		color: #818181;
		text-decoration: none;
	}
	a:hover, a:focus {
    text-decoration: none;
    color: #333;
    cursor: pointer;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<div class="container">
	<div class="row" style="margin-top: 150px;">
		<div class="col-xs-12">
			<div id="accordion">
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			           	<h4><b>REGLAS DE PARTICIPACIÓN</b></h4>
			        	</button>
			    	</div>
			    	<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
			      	<div class="card-body">
			      		<p></p>
			      		<ul>
			      		<?php
			      		$Sql1=$conex->query("SELECT Regla FROM reglas_participacion WHERE Id_Congreso='$Idc'");
			      		while ($RSql1=mysqli_fetch_assoc($Sql1)) {
			      			echo '
			      				<li>
			      				'.$RSql1[Regla].'
			      				</li>
			      			';
			      		}

			      		?>
						<ul>
			      	</div>
			    	</div>
			  	</div>
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
			           	<h4><b>CONDICIONES PARA LA ELABORACIÓN DE LOS RESÚMENES</b></h4>
			        	</button>
			    	</div>
			    	<div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
							<h5>COMUNICACIÓN VIDEONARRADA</h5>
							<ul>
								<?php
						      		$Sql2=$conex->query("SELECT Condicion, Url_Pdf FROM condiciones WHERE Id_Congreso='$Idc'");
						      		while ($RSql2=mysqli_fetch_assoc($Sql2)) {
						      			echo '
						      				<li>
						      				'.$RSql2[Condicion].'
						      				</li>
						      			';
						      			if ($RSql2[Url_Pdf]!="") {
						      				$Url2=$RSql2[Url_Pdf];
						      			}
						      		}

						      	?>
							</ul>
							<br>
							<a <?php
								echo '
									href="'.$Url2.'"
								';
							?>><h5 style="color: #ff5722;"><b>DESCARGAR PLANTILLA AQUÍ</b></h5></a>
							<br>
				      	</div>
			    	</div>
			  	</div>
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
			           		<h4>Cronograma</h4>
			        	</button>
			    	</div>
			    	<div id="collapse7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
				      		<?php
				      			$Sql3=$conex->query("SELECT Img FROM cronograma WHERE Id_Congreso='$Idc'");
						      		$RSql3=mysqli_fetch_assoc($Sql3);
						    	echo '<img class="img-responsive" src="'.$RSql3[Img].'">';
				      		?>
				      	</div>
			    	</div>
			  	</div>

			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
			           	<h4><b>CÓMO TRABAJAR EN LA PLATAFORMA COVAITE</b></h4>
			        	</button>
			    	</div>
			    	<div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
				      		<p>Para tener una experiencia fluida y sin problemas de navagación en la plataforma COVAITE se recomienda utilizar el navegador Google Chrome.</p>
				      		<p>Para una mayor comprensión en el uso de la plataforma del  II congreso virtual Argentino e Iberoamericano de tecnología y educación.  Los participantes pueden acceder a los manuales de acuerdo a las modalidades: ponente, conferencista o asistente.</p>
				      		<br>
							<a target="_blank" href="Pdf/MANUALASISTENTECOVAITE2019.pdf"><h5 style="color: #ff5722;"><b>DESCARGAR MANUAL DE NAVEGACIÓN DE ASISTENTE AQUÍ</b></h5></a>
							<br>
							<a target="_blank" href="Pdf/MANUALPONENTECOVAITE2019.pdf"><h5 style="color: #ff5722;"><b>DESCARGAR MANUAL DE NAVEGACIÓN DE PONENTE AQUÍ</b></h5></a>
							<br>
							<a target="_blank" href="Pdf/MANUALCONFERENCISTACOVAITE2019.pdf"><h5 style="color: #ff5722;"><b>DESCARGAR MANUAL DE NAVEGACIÓN DE CONFERENCISTA AQUÍ</b></h5></a>
							<br>
							<a target="_blank" href="Pdf/MANUALCONFERENCISTACOVAITE2019.pdf"><h5 style="color: #ff5722;"><b>DESCARGAR MANUAL DE PARTICIPACIÓN DE PONENCIAS Y CONFERENCISTAS AQUÍ</b></h5></a>
							<br>
							<p>En caso de presentar dudas sobre el uso de la plataforma, pueden comunicarse a los emails: comitetecnico@covaite.com y comiteorganizador@covaite.com .</p>
				      	</div>
			    	</div>
			  	</div>
			</div>
		</div>
	</div>
</div>
<br>
<?php include('footer.php');?>
<style type="text/css">
	a:hover{
		color:#fff;
	}
</style>