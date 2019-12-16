<?php 
include("conexion.php");
include("Variables.php");
include("../Idc.php");
include("Head.php");
?>
<style type="text/css">
  label{
    font-size: 16px;
  }
</style>
<script src="js/dropzone.js"></script>
<link rel="stylesheet" type="text/css" href="css/dropzone.css">
<style type="text/css">
  p {
    font-size: 16px; 
  }
</style>

<div class="container">
  <div class="col-xs-12 col-sm-12">
    <form action="" method="POST">
      <div class="well">
        <h1 style="text-align:center;">CONGRESOS</h1>
        <hr style="color:#0277bd; background:#0277bd; width:30%;" class="center-block">
        <div class="row">
          <div class="col-sm-offset-2 col-sm-8">
            <p style="text-align: center;">Elija un congreso en el que quiera participar</p>
            <select id='Url' class="form-control" name="Id_Congreso">
            <?php
                $Congresos=$conex->query("SELECT Nombre, Id_Congreso FROM congreso WHERE Id_Congreso!='$Idc'");
              while ($RCongresos=mysqli_fetch_assoc($Congresos)) {
                  echo'<option value="'.$RCongresos[Id_Congreso].'">'.$RCongresos[Nombre].'</option>';
              }
              ?>
                </select>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
            <input type="submit" name="Aceptar" value="Aceptar" style="height: 50px;" class="btn btn-success btn-raised">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
             <div class="alert alert-danger" role="alert">Al momento de dirigirse a otro congreso sus registros serán automaticamente guardados, pero para ser certificado debe participar en cada uno de esos congresos</div>
          </div>
        </div>
      </div>
      <input type="hidden" name="Id_Asistente" <?php echo 'value="'.$IdPonente.'"';?>>
    </form>
  </div>
</div>
<?php 
if ($_POST['Aceptar']) {
  $Id_Congreso=$_POST['Id_Congreso'];
  $Id_Asistente=$_POST['Id_Asistente'];
  date_default_timezone_set('America/Bogota'); 
  $Anno = date("Y");
  $Sql2=$conex->query("SELECT Subdominio FROM info_congreso WHERE Id_Congreso='$Id_Congreso'");
  $Subdominio=mysqli_fetch_assoc($Sql2);
  $Sql3=$conex->query("SELECT Id_Congreso FROM registro_asistencia WHERE Id_Congreso='$Id_Congreso' AND Id_Asistente='$Id_Asistente'");
  if (mysqli_num_rows($Sql3)==0) {
    $Sql4=$conex->query("INSERT INTO registro_asistencia VALUES('$Id_Congreso', '$Id_Asistente','$Anno','0')");
  }
    echo"
    <script type='text/javascript'>
         top.location.href = '".$Subdominio[Subdominio]."';
    </script>
  ";


}


include('Footer.php');
?>