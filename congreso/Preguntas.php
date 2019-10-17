<?php
include('Head.php');
include('Nav.php');
include("conexion.php");?>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
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
			           	<h4>¿Cómo evoluciona el congreso virtual?</h4>
			        	</button>
			    	</div>
			    	<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
			      	<div class="card-body">
			      		<p>
			      			Congreso Virtual Argentino e Iberoamericano de Tecnología y Educación COVAITE, nació en el 2016 gracias al aporte de docentes independientes provenientes Argentina y Colombia y que, a partir de un trabajo colaborativo y desinteresado, logran contribuir con el enriquecimiento de propuestas educativas relacionadas con el uso responsable y educativo de la Tecnología y en especial de las TIC, como medios para la construcción del conocimiento.
			      		</p>
			      		<p>
			      			COVAITE, logra en su primera versión un total de 51 conferencistas, 52 proyectos socializados por 52 ponentes y con 1350 personas como asistentes. Todos reunidos por la Tecnología ayudando a construir un ambiente reflexión y debate, sobre el uso de la TIC en entornos educativos y sociales, dando a conocer experiencias, herramientas y diferentes temáticas pedagógicas presentadas por destacados profesionales del mundo educativo, investigativo y tecnológico a nivel provincial, nacional e internacional.
			      		</p>
			      		<p>
			      			Para la segunda edición de COVAITE, el equipo organizador del evento, serán docentes e investigadores provenientes Argentina, Colombia y México de las Instituciones de Educación Superior Internacionales: ITFIP Instituto Tolimense de Formación Técnica Profesional de Colombia y Escuela Normal de Naucalpan en el Estado de México. Todos promoviendo el intercambio de los resultados que se generaron en proyectos de investigación, innovación y experiencias desarrolladas en el en el aula de clase apoyadas por Tecnología Educativa.
			      		</p>
			      	</div>
			    	</div>
			  	</div>
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
			           	<h4>¿Quién puede participar como ponente?</h4>
			        	</button>
			    	</div>
			    	<div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
				      		<p>La convocatoria para participar como ponentes, está abierta a todos aquellos estudiantes de postgrado (maestrías y doctorados), docentes e investigadores que se desempeñen en el área de tecnología y educación y pretendan dar a conocer sus experiencias, proyectos, trabajos de investigación o simplemente deseen aportar, desde su conocimiento, a la construcción de una educación de calidad y en igualdad de oportunidades.</p>
				      	</div>
			    	</div>
			  	</div>

			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
			           		<h4>¿Cuáles son las categorías o temáticas de participación?</h4>
			        	</button>
			    	</div>
			    	<div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
				      		<p>
				      			Los ejes temáticos en los que serán enfocadas las ponencias girarán en torno ha: Accesibilidad, inclusión y TIC. 
				      			<ul>
				      				<li>Educación Virtual.</li>
				      				<li>Experiencias áulicas con TIC.</li>
				      				<li>Experiencias de intercambio educativo internacional.</li>
				      				<li>Investigación en el Área de TIC y educación.</li>
				      				<li>Proyectos Institucionales con TIC.</li>
				      				<li>Realidad Virtual, Realidad Aumentada, Impresión 3D.</li>
				      				<li>Recursos didácticos y tecnológicos aplicados a la educación.</li>
				      				<li>Tecnologías móviles en educación.</li>
				      			</ul>
				      		</p>
				      	</div>
			    	</div>
			  	</div>
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
			           		<h4>¿Dónde me inscribo?</h4>
			        	</button>
			    	</div>
			    	<div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
				      		<p>
				      			La apertura de las inscripciones serán recepcionadas en los formularios oficiales del congreso y estarán disponible en <a style="color: #ff5722" href="Inscripcion.php?T=0">www.covaite.com/inscripcion.php</a>
				      		</p>
				      	</div>
			    	</div>
			  	</div>
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
			           		<h4>¿Hasta cuándo hay plazo para enviar el resúmen de la Comunicación?</h4>
			        	</button>
			    	</div>
			    	<div id="collapse6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
				      		<p>
				      			Los interesados en presentar ponencias en el congreso COVAITE 2019, podrán realizar el envío del resúmen de Comunicación hasta el 26 de Abril del 2019.
				      		</p>
				      	</div>
			    	</div>
			  	</div>
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
			           		<h4>¿Hay una programación o agenda del congreso?</h4>
			        	</button>
			    	</div>
			    	<div id="collapse7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
				      		<p>
				      			El cronograma previsto para el congreso COVAITE 2019 es el siguiente:
				      		</p>
				      		<table class="table table-striped">
							  <thead>
							    <tr>
							      <th scope="col">Fechas</th>
							      <th scope="col">Agenda</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      	<td>14 de Enero – 26 de Abril del 2019</td>
							      	<td>Recepción de Papers.<br>
										Apertura convocatoria para recibir Resúmenes de Comunicación o Papers.
									</td>
							    </tr>
							    <tr>
							    	<td>
							    		14 de Enero – 19 de Mayo del 2019
							    	</td>
							    	<td>
							    		Inscripciones gratuitas al congreso virtual COVAITE 2019 (ASISTENTES).
							    	</td>
							    </tr>
							    <tr>
							    	<td>
							    		14 de Enero – 04 de Mayo del 2019
							    	</td>
							    	<td>
							    		Evaluación de los Resúmenes de comunicación.  A medida que van llegando, serán evaluados y confirmada su participación en el Congreso COVAITE 2019.
							    	</td>
							    </tr>
							    <tr>
							    	<td>
							    		05 de Mayo al 13 de Mayo del 2019
							    	</td>
							    	<td>
							    		Los ponentes y conferencistas que fueron aprobados sus proyectos.  Deben entregar el archivo de presentación (comunicación escrita .PDF o comunicación videonarrada), antes del 13 de Mayo del 2019. (PONENTES, AUTORES Y CONFERENCISTAS).
							    	</td>
							    </tr>
							    <tr>
							    	<td>
							    		27 al 31 de Mayo del 2019
							    	</td>
							    	<td>
							    		Inicio del Congreso COVAITE 2019.<br> 
										Presentación de ponencias y conferencias.
							    	</td>
							    </tr>
							    <tr>
							    	<td>
							    		01 al 15 de Junio del 2019
							    	</td>
							    	<td>
							    		Acceso a las ponencias y conferencias del congreso virtual COVAITE 2019 Modalidad Atemporal 
							    	</td>
							    </tr>
							  </tbody>
							</table>
				      	</div>
			    	</div>
			  	</div>
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
			           		<h4>¿Cuál es el formato de participación?</h4>
			        	</button>
			    	</div>
			    	<div id="collapse8" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
				      		<p>
				      			El Formato de presentación de una ponencia deberá ser enviada en formato digital bajo los siguientes tipos de archivos: comunicación escrita .PDF  o comunicación videonarrada.
				      		</p>
				      	</div>
			    	</div>
			  	</div>
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
			           		<h4>¿Cómo funciona el evento?</h4>
			        	</button>
			    	</div>
			    	<div id="collapse9" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
				      		<p>
				      			El evento se desarrollará durante 5 días, entre el 27 al 31 de Mayo del 2019.  Periodo en el cual se publicarán las ponencias en el sitio oficial del congreso y se abrirá un foro de debate sobre la temática propuesta. Los asistentes podrán dejar sus comentarios e interactuar con el docente ponente y con los demás colegas participantes.
				      		</p>
				      	</div>
			    	</div>
			  	</div>
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
			           		<h4>¿Los ponentes, conferencias y asistentes reciben certificado de participación?</h4>
			        	</button>
			    	</div>
			    	<div id="collapse10" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
				      		<p>
				      			Tanto los participantes del evento como los respectivos ponentes, al finalizar el congreso virtual COVAITE 2019, el comité organizador procederá al envío del certificado acreditando su participación, el mismo se enviará de manera digital.
				      		</p>
				      	</div>
			    	</div>
			  	</div>
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
			           		<h4>¿La modalidad es en directo o cómo funcionaría el congreso?</h4>
			        	</button>
			    	</div>
			    	<div id="collapse11" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
				      		<p>
				      			El Congreso se desarrollará bajo la modalidad Virtual y en dos etapas claramente definidas:
				      			<ul>
				      				<li>1- Temporal: Un evento intensivo de 5 días de duración a desarrollarse los días  27 al 31 de Mayo del 2019, en la que se presentarán temáticas en distintos formatos digitales a elección del ponente (comunicación escrita .PDF  o comunicación videonarrada).</li>
				      				<li>2- Atemporal: Después de finalizado el Congreso COVAITE 2019, los participantes contarán con acceso a las ponencias y/o trabajos presentados durante un lapso de 15 días, a fin de rescatar experiencias y apropiarse del material necesario para socializarlo en su entorno educativo más próximo, posterior a ello la plataforma se cerrará definitivamente.</li>
				      			</ul>
				      		</p>
				      	</div>
			    	</div>
			  	</div>

			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
			           		<h4>¿COVAITE 2019, cuenta con políticas de privacidad y cuidado de los datos personales?</h4>
			        	</button>
			    	</div>
			    	<div id="collapse12" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
				      		<a href="Pdf/Politicas.pdf" target="_blanck">VER O DESCARCAR POLÍTICAS AQUÍ</a>
				      	</div>
			    	</div>
			  	</div>
			</div>
		</div>
	</div>
</div>
<br>
<?php include('footer.php');?>