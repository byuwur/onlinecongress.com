<?php
include('Head.php');
include('Nav.php');
include("conexion.php");?>
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
			      		<p>Para la participación en el congreso COVAITE 2019, en cualquiera de sus modalidades: ponente,  conferencistas o asistente.  Se debe cumplir con las siguientes directrices, establecidas por el Comité Organizador.  Por favor, leerlas y respetarlas:</p>
			      		<ul>
							<li>Los resúmenes de comunicación, deben tratar de proyectos originales, sin publicación y centrados en las categorías del congreso COVAITE 2019.</li>
							<li>Pueden presentar al congreso COVAITE 2019: Experiencias en el aula con las TIC, desarrollo tecnológicos para la academia, desarrollo de software empresariales, proyectos de investigación e innovación o temas afines a las categorías del congreso.</li>
							<li>Los resúmenes de comunicación serán valorados por el Comité Científico y Revisor del Congreso. Sólo se presentarán aquellos que fueron aceptados por el comité.</li>
							<li>Para que el resumen o aportación pueda ser finalmente aprobada y socializada en el congreso, será necesario cumplir con las observaciones entregadas por parte de los revisores, en caso de que se presenten (los cambios deben ser entregados nuevamente al comité científico y revisor para ser aprobado su presentación en el congreso).</li>
							<li>Los resúmenes de comunicación pueden presentarse en dos formatos: Comunicación escrita y Comunicación videonarrada.</li>
							<li>Los participantes ponentes del congreso, son quienes deciden en qué formato será presentado el proyecto (comunicación escrita o comunicación videonarrada)  en COVAITE 2019.</li>
							<li>Los resúmenes aceptados, se presentarán en la plataforma web virtual del Congreso COVAITE 2019. De acuerdo a las categorías correspondiente y serán accesibles solamente para aquellos participantes (conferencistas, ponentes y asistentes) que sean registrado en el congreso. Los cuales podrán leerlas, estudiarlas, comentarlas y realizar aportes en el foro virtual correspondiente.  Esto se realizará mientras dure la semana de ejecución del Congreso COVAITE 2019.</li>
							<li>La aceptación de los resúmenes de comunicación, serán dados por el comité científico a través del correo electrónico del autor del proyecto, el cual figura como responsable de la correspondencia.</li>
							<li>La entrega de los resúmenes de comunicación para su revisión, se llevará cabo por medio del email comitecientifico@covaite.com  y será únicamente el autor responsable de la correspondencia quién efectúe el envío.</li>
							<li>En el caso de que el resúmen de comunicación sea aprobado, los autores recibirán por correo electrónico, las instrucciones para el registro de ponentes, autores y la entrega de la presentación del proyecto.</li>
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
				      		<p>Todo resúmen de comunicación, debe cumplir con las siguientes condiciones:</p>
							<h5>COMUNICACIÓN ESCRITA EXTENSA</h5>
							<ul>
								<li>El Título del resúmen de la comunicación, se recomienda un máximo de 13 palabras.</li>
								<li>Datos del autor/autores: nombre y apellidos, institución universitaria donde labora y país.</li>
								<li>Datos del ponente: nombre y apellidos, institución universitaria donde labora y país.</li>
								<li>El resúmen de comunicación debe tener una extensión: 3000 palabras (excluyendo el título del trabajo, datos de autores y bibliografía).  Este no puede exceder de 4 páginas en formato Word. El texto se escribirá en Arial 12, con un espaciado anterior 0 y posterior 6 pt. El interlineado será simple. Cada párrafo se comenzará sin sangría justificado. En un formato A4 (210 mm x 297 mm), se dejarán márgenes laterales, superior e inferior de 25 mm.</li>
								<li>Palabras clave: entre 3 y 6 palabras clave.</li>
								<li>Organización comunicación escrita extensa: Introducción/antecedentes, objetivos y/o hipótesis, desarrollo/metodología, resultados, conclusión y referencias bibliográficas.</li>
								<li>Referencias bibliográficas: Entre 2 y 10 referencias en idioma español e inglés y de acuerdo a las normas APA 6ªEd.</li>
								<li>Tablas y figuras: En caso de ser requeridas para mayor comprensión del texto.</li>
							</ul>
							<br>
							<a href="Pdf/Plantilla_Comunicaciones_Escritas_Extensas_COVAITE 2019.docx"><h5 style="color: #ff5722;"><b>DESCARGAR PLANTILLA AQUÍ</b></h5></a>
							<br>
							<hr>
							<h5>COMUNICACIÓN VIDEONARRADA</h5>
							<ul>
								<li>El formato de esta modalidad de participación es un PPT videonarrado. Deben ser presentadas en la plantilla de exposición de ponencias. Para acceder a ella, da Clic aquí para descargar Plantilla.</li>
								<li>El número máximo de las diapositivas es de 20. El archivo video debe tener una duración máxima de 10 minutos y en formato AVI, MPG4, WMV, MPEG4, MP4, MOV, FLV, MPEGPS y 3GPP, Los cuales son utilizados en YOUTUBE.</li>
								<li>La estructura del contenido para la presentación debe contener:<br>
									* El Título del resúmen de la comunicación, se recomienda un máximo de 13 palabras.<br>
									* Datos del autor/autores: nombre y apellidos, institución universitaria donde labora y país.<br>
									* Introducción/antecedentes.<span></span><br>
									* Objetivos y/o hipótesis.<br>
									* Desarrollo/metodología.<br>
									* Resultados.<br>
									* Conclusión.<br>
									* Referencias bibliográficas.
								</li>
							</ul>
							<br>
							<a href="Pdf/PLANTILLA_COMUNICACION_VIDEONARRADA_COVAITE_2019.pptx"><h5 style="color: #ff5722;"><b>DESCARGAR PLANTILLA AQUÍ</b></h5></a>
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