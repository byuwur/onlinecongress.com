<?php 
include("conexion.php");
include("Variables.php");
include("Head.php");
if ($Usuario != ""){
	echo '
<style type="text/css">
  label{
    font-size: 20px;
}
</style>
<div class="container">
  <div class="col-xs-12 col-sm-12">
    <div class="well">
      <h1 style="text-align:center;">LISTADO DE CONGRESOS</h1>
      <hr style="color:#0277bd; background:#0277bd; width:30%;" class="center-block">
      <br
      <br
      <br
      <div class="row">
        <form method="POST" action="">
        <table class="table">
			  <thead style="background: #f2f2f2">
			    <tr>
			      <th scope="col">CODIGO CONGRESO</th>
			      <th scope="col">NOMBRE CONGRESO</th>
			      <th scope="col">ADMINISTRADOR</th>
			      <th scope="col">CORREO</th>
			    </tr>
			  </thead>
			  <tbody>
			  ';
			  $query1=$conex->query("SELECT congreso.Id_Congreso, congreso.Nombre, administrador.NombreCompleto, administrador.Email FROM adminsu, congreso, administrador WHERE adminsu.Documento='$Usuario' AND congreso.Id_Administrador=administrador.Documento");
			  	while ($resultado=mysqli_fetch_assoc($query1)) {
			  		echo "<tr>
					      <td>".$resultado['Id_Congreso']."</td>
					      <td>".$resultado['Nombre']."</td>
					      <td>".$resultado['NombreCompleto']."</td>
					      <td>".$resultado['Email']."</td>
					    </tr>
					    ";
			  	}
			    echo "
			  </tbody>
			</table>
        </form>
      </div>
    </div>
  </div>
</div>
";
include("Footer.php");
}else{
  echo "
    <script type='text/javascript'>
      document.location = '../index.php';
    </script>
  ";
}
?>