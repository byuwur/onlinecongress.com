<?php
include('Head.php');
include('Nav.php');
include("conexion.php");
include('Idc.php'); ?>
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
		<?php
			$Sql1=$conex->query("SELECT Id_Pregunta, Pregunta, Respuesta FROM preguntas_frecuentes WHERE Id_Congreso='$Idc'");
			while ($Result=mysqli_fetch_assoc($Sql1)) {
				echo '
				<div class="card">
			    	<div class="card-header" id="headingTwo">
			        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#'.$Result[Id_Pregunta].'" aria-expanded="false" aria-controls="'.$Result[Id_Pregunta].'">
			           	<h4>'.$Result[Pregunta].'</h4>
			        	</button>
			    	</div>
			    	<div id="'.$Result[Id_Pregunta].'" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
			      	<div class="card-body">
			      		<p>
			      			'.$Result[Respuesta].'
			      		</p>
			      	</div>
			    	</div>
			  	</div>

				';
			}
		?>
			  	
			</div>
		</div>
	</div>
</div>
<br>
<?php include('footer.php');?>