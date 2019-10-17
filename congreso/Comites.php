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
			           	<h4><b>COMITÉ DE HONOR</b></h4>
			        	</button>
			    	</div>
			    	<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
			      	<div class="card-body">
			      		<ul style="color: #818181; font-size: 16px;">
							<li>Rector del Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia <br>Dr. Mario Fernando Díaz Pava.</li>
							<li>Director de la Escuela Normal de Naucalpan en el Estado de México <br> Mtro. Héctor Alejandro Lozada Calvillo.</li>
							<li>Vicerrectora Académica del Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia. <br>Mg. Isabel Ortiz Serrano.</li>
							<li>Subdirectora Administrativa de la Escuela Normal de Naucalpan en el Estado de México. <br>Mtra. Marcela Paz Vieyra.</li>
							<li>Decano Faculitad de Ingeniería del Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia. <br> Mg. Holman Reyes Puentes.  </li>
							<li>Coordinador de la Red de Universidades del Alto Magdalena (RUAM) Colombia. <br>Dr. Henry Alberto Matallana Novoa.</li>
						<ul>
			      	</div>
			    	</div>
			  	</div>
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
			           	<h4><b>COMITÉ DE ORGANIZADOR</b></h4>
			        	</button>
			    	</div>
			    	<div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
					      	<ul style="color: #818181; font-size: 16px;">
								<li>Lic. Iván Artaza Aníbal. Argentina.</li> <!--Coordinador Pedagógico Programa Nacional En FoCo ETP en Instituto Nacional de Educación Tecnológica - INET – -->
								<li>PhD. Alejandro González Barrios. Responsable de vinculación y sinergia con instituciones de educación superior, nacionales e internacionales, Escuela Normal de Naucalpan. México.</li>
								<li>PhD. Julian Vidal Salgado Morales. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Mg. Nayibe Soraya Sánchez León.   Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Ing. José Luis Rodríguez Galeano. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Ing. Melissa Rivera Guzmán. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Lic. Soraya Jiménez Montaña.  Instituto  Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Mg. Libardo Cartagena Yara. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Mg. Bruno Elíseo Ramírez Rengifo. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Mg. Sandra Yasmin Samudio López. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Mg. Gustavo Adolfo Castillo Serrano. Universidad Piloto de Colombia Seccional del Alto Magdalena Colombia.</li>
								<li>PhD. Jennifer Celleri Pacheco. Universidad Técnica de Machala Ecuador.</li>
								<li>Lic. Luis Federico Russo Castore. Universiad Tecnológica Nacional  facultad regional la Rioja y Universidad Nacional de La Rioja</li>
							</ul>
				      	</div>
			    	</div>
			  	</div>
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
			           	<h4><b>COMITÉ CIENTÍFICO Y REVISOR</b></h4>
			        	</button>
			    	</div>
			    	<div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
					      	<ul style="color: #818181; font-size: 16px;">
								<li>Lic. Iván Artaza Aníbal. Argentina</li> <!--Coordinador Pedagógico Programa Nacional En FoCo ETP en Instituto Nacional de Educación Tecnológica - INET – -->
								<li>PhD. Alejandro González Barrios. Responsable de vinculación y sinergia con instituciones de educación superior, nacionales e internacionales, Escuela Normal de Naucalpan. México.</li>
								<li>PhD. Julian Vidal Salgado Morales. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Mg. Nayibe Soraya Sánchez León.   Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Ing. José Luis Rodríguez Galeano. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Ing. Melissa Rivera Guzmán. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Mg. Isabel Ortiz Serrano. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Mg. José Ramón de la Rosa Villavicencio. Escuela Normal de Naucalpan en el Estado de México.</li>
								<li>Mg. Miriam Gómez López. Escuela Normal de Naucalpan en el Estado de México.</li>
								<li>Mg. Emmanuel Rivera Guzmán. Universidad Piloto de Colombia Seccional del Alto Magdalena Colombia.</li>
								<li>Dr. Jorge Roa Mendoza. Escuela Normal de Naucalpan en el Estado de México.</li>
								<li>Mtra. María Antonieta Hernández Leyva. Escuela Normal de Naucalpan en el Estado de México.</li>
								<li>Dra. María Antonieta Isabel Jurado Muñoz. Escuela Normal de Naucalpan en el Estado de México.</li>
								<li>Mg. Libardo Cartagena Yara. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Mg. Jimmy Alexander Vergara Rodríguez. Universidad Piloto de Colombia Seccional del Alto Magdalena Colombia.</li>
								<li>Mg. Bruno Elíseo Ramírez Rengifo. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Mg. Sandra Yasmin Samudio López. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Mg. Edicson Pineda Cadena. Universidad Piloto de Colombia Seccional del Alto Magdalena. Colombia.</li>
								<li>Mg. Gustavo Adolfo Castillo Serrano. Universidad Piloto de Colombia Seccional del Alto Magdalena Colombia.</li>
								<li>PhD. Jennifer Celleri Pacheco, Universidad Técnica de Machala Ecuador.</li>
								<li>Ing. Antonio de Jesús Ramírez Bautista. Escuela Normal de Naucalpan en el Estado de México.</li>
								<li>PhD. Juan Martín Ceballos Almeraya. Instituto Americano Cultural, S. C.</li>
								<li>Mg. Elizabeth Palma Cardoso Instituto Tolimense de Formación Técnica Profesional. ITFIP. Colombia.</li>
								<li>PhD. Javier Gil Quintana. Universidad Católica de Ávila España</li>
								<li>Lic. Luis Federico Russo Castore. Universiad Tecnológica Nacional  facultad regional la Rioja y Universidad Nacional de La Rioja</li>
							</ul>
				      	</div>
			    	</div>
			  	</div>
			  	<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
			           	<h4><b>COMITÉ TÉCNICO</b></h4>
			        	</button>
			    	</div>
			    	<div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      	<div class="card-body">
					      	<ul style="color: #818181; font-size: 16px;">								
								<li>Mg. Nayibe Soraya Sánchez León.   Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Ing. José Luis Rodríguez Galeano. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
								<li>Ing. Melissa Rivera Guzmán. Instituto Tolimense de Formación Técnica Profesional. ITFIP.  Colombia.</li>
							</ul>
				      	</div>
			    	</div>
			  	</div>
			</div>
		</div>
	</div>
</div>
<br>
<?php include('footer.php');?>