<?php 
include("conexion.php");
include("Variables.php");
include("Head.php");
$Consul = $conex->query("SELECT Id_Congreso FROM auspiciantes WHERE Id_Congreso='$Id_Congreso'");
if (mysqli_num_rows($Consul)=="") {
  $Registro = $conex->query("INSERT INTO auspiciantes VALUES('$Id_Congreso','')");
}
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
<script type="text/javascript">
  jQuery(document).ready(function($){
    Dropzone.options.myDrop1={
      maxFileSize:5,
      acceptedFiles: 'image/*',

      init: function init(){
        this.on("error", function(){
          alert("Error al cargar el archivo");
        });
      }
    }
  });
</script>

<div class="container">
  <div class="col-xs-12 col-sm-12">
    <div class="well">
      <h1 style="text-align:center;">AUSPICIANTES</h1>
      <hr style="color:#0277bd; background:#0277bd; width:30%;" class="center-block">
      <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
          <p style="text-align: center;">Elija una imagen donde se encuentren todos los auspiciantes del Congreso</p>
          <form action="UploadAuspiciantes.php" class="dropzone" id="myDrop1">
            <h2 style="text-align:center; color:#0277bd;">IMAGEN</h2>
            <div class="form-group label-floating">
              <input type="file" name="archivo">
            </div>
            <input type="hidden" name="Id_Congreso" <?php echo 'value="'.$Id_Congreso.'"';?>>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
           <div class="alert alert-danger" role="alert">El formato de la imagen debe de ser .jpg o .png, su peso no debe superar 1 Mb y sus medidas deben ser de 800 píxeles de ancho.</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('Footer.php');
?>