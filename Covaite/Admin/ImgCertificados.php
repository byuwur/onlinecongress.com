<?php 
include("conexion.php");
include("Variables.php");
include("Head.php");
$Consul = $conex->query("SELECT Id_Congreso, Img FROM certificados WHERE Id_Congreso='$Id_Congreso'");
$Id=mysqli_fetch_assoc($Consul);
if (mysqli_num_rows($Consul)=="") {
  $Registro = $conex->query("INSERT INTO certificados VALUES('$Id_Congreso','')");
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
      <h1 style="text-align:center;">IMAGEN CERTIFICADOS</h1>
      <hr style="color:#0277bd; background:#0277bd; width:30%;" class="center-block">
      <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
          <p style="text-align: center;">Elija una imagen donde se encuentre el diseño de los certificados, los certificados se generan en tamaño carta y verticalmente</p>
          <form action="UploadCertificados.php" class="dropzone" id="myDrop1">
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
           <div class="alert alert-danger" role="alert">El formato de la imagen debe de ser solo .JPG, su peso no debe superar 3 Mb y sus medidas deben ser de 1281 píxeles de ancho y 1738 píxeles de largo.</div>
        </div>
      </div>
      <?php 
      if ($Id[Img]!="") {
          echo '
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <a onclick="Generar()" style="height: 50px" type="button" class="btn btn-info btn-raised" style="color: #fff" id="BtnGuardar">Ver ejemplo del certificado</a>
            </div>
          </div>
          ';
      }
      ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalConfirmacion" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 5%;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carga completa
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" id="MensajeRegistro">
        La imagen del certificado se ha cargado completamente. ¿Desea ver un certificado de ejemplo?
      </div>
      <div class="row">
        <div class="col-sm-3 col-sm-offset-6">
          <button style="height: 50px" type="button" class="btn btn-raised btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-sm-3">
          <a onclick="Generar()" style="height: 50px" type="button" class="btn btn-info btn-raised" id="BtnGuardar">Aceptar</a>
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
          $("#ModalConfirmacion").modal("show");
        });
        }
    }
  });
  function Generar(){
    var Id_Congreso=$("#Id_Congreso").val();
    var Url='Exportar_Certificado.php?Doc=0&T=10&Id='+Id_Congreso;
    window.open(Url);
  }
</script>
