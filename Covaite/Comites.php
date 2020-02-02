<?php
include('Head.php');
include('Nav.php');
include("conexion.php");
include('Idc.php');?>
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
				<?php
					$Sql1=$conex->query("SELECT Id_Comite, Comite FROM comite WHERE Id_Congreso='$Idc'");
					while ($Resultado1=mysqli_fetch_assoc($Sql1)) {
						echo '
							<div class="card">
						    	<div class="card-header" id="headingTwo">
						        	<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#'.$Resultado1[Id_Comite].'" aria-expanded="false" aria-controls="collapseTwo">
						           	<h4><b>'.$Resultado1[Comite].'</b></h4>
						        	</button>
						    	</div>
						    	<div id="'.$Resultado1[Id_Comite].'" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						      	<div class="card-body">
						      		<ul style="color: #818181; font-size: 16px;">';

						      			$Sql2=$conex->query("SELECT Descripcion FROM info_comites WHERE Id_Comite=$Resultado1[Id_Comite] AND Id_Congreso='$Idc'");
										while ($Resultado2=mysqli_fetch_assoc($Sql2)) {
											echo '<li>'.$Resultado2[Descripcion].'</li>';
										}
									echo '
									<ul>
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