<?php 
include("conexion.php");
include("Variables.php");
include("Head.php");
$Consul = $conex->query("SELECT Id_Congreso, Img FROM cronograma WHERE Id_Congreso='$Id_Congreso'");
$Id=mysqli_fetch_assoc($Consul);
if (mysqli_num_rows($Consul)=="") {
  $Registro = $conex->query("INSERT INTO cronograma VALUES('$Id_Congreso','')");
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
<div class="container">
  <div class="col-xs-12 col-sm-12">
    <div class="well">
      <h1 style="text-align:center;">IMAGEN CRONOGRAMA</h1>
      <hr style="color:#0277bd; background:#0277bd; width:30%;" class="center-block">
      <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
          <p style="text-align: center;">Elija una imagen donde se encuentre el diseño del cronograma con los días en que se va a realizar el congreso.</p>
          <form action="UploadCronograma.php" class="dropzone" id="myDrop1">
            <h2 style="text-align:center; color:#0277bd;">IMAGEN</h2>
            <div class="form-group label-floating">
              <input type="file" name="archivo">
            </div>
            <input type="hidden" id="Id_Congreso" name="Id_Congreso" <?php echo 'value="'.$Id_Congreso.'"';?>>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
           <div class="alert alert-danger" role="alert">El formato de la imagen debe de ser solo .JPG, su peso no debe superar 3 Mb y sus medidas deben ser de 1074 píxeles de ancho.</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('Footer.php');
?>

<script type="text/javascript">
  jQuery(document).ready(function($){
    Dropzone.options.myDrop1={
      maxFileSize:5,
      acceptedFiles: 'image/jpeg',

      init: function() {
        this.on("success", function(file, responseText) {
        });
        }
    }
  });
</script>
