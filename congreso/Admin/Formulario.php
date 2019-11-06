<?php 
include("conexion.php");
include("Variables.php");
include("Head.php");?>
<style type="text/css">
  label{
    font-size: 16px;
  }
</style>
<script src="js/dropzone.js"></script>
<link rel="stylesheet" type="text/css" href="css/dropzone.css">

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
  jQuery(document).ready(function($){
    Dropzone.options.myDrop2={
      maxFileSize:5,
      acceptedFiles: 'image/*',

      init: function init(){
        this.on("error", function(){
          alert("Error al cargar el archivo");
        });
      }
    }
  });
  jQuery(document).ready(function($){
    Dropzone.options.myDrop3={
      maxFileSize:5,
      acceptedFiles: 'image/*',

      init: function init(){
        this.on("error", function(){
          alert("Error al cargar el archivo");
        });
      }
    }
  });jQuery(document).ready(function($){
    Dropzone.options.myDrop4={
      maxFileSize:5,
      acceptedFiles: 'image/*',

      init: function init(){
        this.on("error", function(){
          alert("Error al cargar el archivo");
        });
      }
    }
  });
  jQuery(document).ready(function($){
    Dropzone.options.myDrop5={
      maxFileSize:5,
      acceptedFiles: 'image/*',

      init: function init(){
        this.on("error", function(){
          alert("Error al cargar el archivo");
        });
      }
    }
  });
  jQuery(document).ready(function($){
    Dropzone.options.myDrop6={
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
      <h1 style="text-align:center;">FORMULARIO</h1>
      <hr style="color:#0277bd; background:#0277bd; width:30%;" class="center-block">
      <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
          <p style="text-align: center;">Elija el Logo del Congreso</p>
          <form action="upload1.php" class="dropzone" id="myDrop1">
            <h2 style="text-align:center; color:#0277bd;">Logo</h2>
            <div class="form-group label-floating">
              <input type="file" name="archivo">
            </div>
            <input type="hidden" name="Id_Congreso" <?php echo 'value="'.$Id_Congreso.'"';?>>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
           <div class="alert alert-danger" style="color: #fff" role="alert">El formato de la imagen debe de ser .jpg o .png, su peso no debe superar 1 Mb y sus medidas deben ser de 379 píxeles de largo por 100 píxeles de alto.</div>
        </div>
      </div>
      <br> 
      <div class="row">
        <div class="col-sm-6">
          <p style="text-align: center;">Elija imagen de los patrocinadores</p>
          <form action="upload5.php" class="dropzone" id="myDrop5">
            <h2 style="text-align:center; color:#0277bd;">Imagen patrocinadores</h2>
            <div class="form-group label-floating">
              <input type="file" name="archivo">
            </div>
            <input type="hidden" name="Id_Congreso" <?php echo 'value="'.$Id_Congreso.'"';?>>
          </form>
          <div class="col-sm-12">
            <div class="alert alert-danger" style="color: #fff" role="alert">El formato de la imagen debe de ser .jpg o .png, su peso no debe superar 1 Mb y sus medidas deben ser de 1539 píxeles de largo por 732 píxeles de alto.</div>
            </div>
          </div>
          
      <br> 
        <div class="col-sm-6">
          <p style="text-align: center; margin-top: -4px;">Elija imagen de los auspiciantes</p>
          <form action="upload6.php" class="dropzone" id="myDrop6">
            <h2 style="text-align:center; color:#0277bd;">Imagen auspiciantes</h2>
            <div class="form-group label-floating">
              <input type="file" name="archivo">
            </div>
            <input type="hidden" name="Id_Congreso" <?php echo 'value="'.$Id_Congreso.'"';?>>
          </form>
          <div class="col-sm-12">
            <div class="alert alert-danger" style="color: #fff" role="alert">El formato de la imagen debe de ser .jpg o .png, su peso no debe superar 1 Mb y sus medidas deben ser de 1539 píxeles de largo por 732 píxeles de alto.</div>
            </div>
        </div>
      </div><br> 
      <div class="row">
        <div class="col-sm-4">
          <form action="upload2.php" class="dropzone" id="myDrop2">
            <h2 style="text-align:center; color:#0277bd;">Imagen Banner 1</h2>
            <div class="form-group label-floating">
              <input type="file" name="archivo">
            </div>
            <input type="hidden" name="Id_Congreso" <?php echo 'value="'.$Id_Congreso.'"';?>>
          </form>
        </div>
        <div class="col-sm-4">
          <form action="upload3.php" class="dropzone" id="myDrop3">
            <h2 style="text-align:center; color:#0277bd;">Imagen Banner 2</h2>
            <div class="form-group label-floating">
              <input type="file" name="archivo">
            </div>
            <input type="hidden" name="Id_Congreso" <?php echo 'value="'.$Id_Congreso.'"';?>>
          </form>
        </div>
        <div class="col-sm-4">
          <form action="upload4.php" class="dropzone" id="myDrop4">
            <h2 style="text-align:center; color:#0277bd;">Imagen Banner 3</h2>
            <div class="form-group label-floating">
              <input type="file" name="archivo">
            </div>
            <input type="hidden" name="Id_Congreso" <?php echo 'value="'.$Id_Congreso.'"';?>>
          </form>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="alert alert-danger" style="color: #fff" role="alert">El formato de la imagen debe de ser .jpg o .png, su peso no debe superar 1 Mb y sus medidas deben ser de 1539 píxeles de largo por 732 píxeles de alto.</div>
          </div>
        </div>
      </div>
<?php
$Datos=$conex->query("SELECT info_congreso.Texto1, info_congreso.Texto2, info_congreso.Texto3, info_congreso.Que_es, info_congreso.Sobre_Congreso, info_congreso.Quienes, info_congreso.Por_que, info_congreso.Nosotros, info_congreso.Facebook, info_congreso.Twitter, info_congreso.Youtube, congreso.Nombre, congreso.Institucion, congreso.Color FROM info_congreso, congreso WHERE info_congreso.Id_Congreso='$Id_Congreso' AND congreso.Id_Congreso='$Id_Congreso' AND congreso.Id_Congreso=info_congreso.Id_Congreso");
$Info=mysqli_fetch_assoc($Datos);
echo'      
      <form method="POST" action="">
        <br>
        <input type="hidden" name="Id_Congreso" value="'.$Id_Congreso.'">
        <br>
          <div class="form-group">
            <div class="row">
              <div class="form-group col-xs-12 col-sm-4">
                <label for="exampleTextarea1" style="font-size: 16px " class="control-label">Texto Banner 1</label>
                <textarea class="form-control" id="exampleTextarea1" rows="3" name="Texto1">'.$Info[Texto1].'</textarea>
              </div>
              <div class="form-group col-xs-12 col-sm-4">
                <label for="exampleTextarea2" style="font-size: 16px " class="control-label">Texto Banner 2</label>
                <textarea class="form-control" id="exampleTextarea2" rows="3" name="Texto2" >'.$Info[Texto2].'</textarea>
              </div>
              <div class="form-group col-xs-12 col-sm-4">
                <label for="exampleTextarea3" style="font-size: 16px " class="control-label">Texto Banner 3</label>
                <textarea class="form-control" id="exampleTextarea3" rows="3" name="Texto3" >'.$Info[Texto3].'</textarea>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-12">
                <label for="exampleInputEmail1" style="font-size: 16px " class="control-label">Institución</label>
                <input class="form-control" id="exampleInputEmail1" value="'.$Info[
                  Institucion].'" name="Institucion">
              </div>
              <div class="col-xs-12">
                <label style="font-size: 16px ">Siglas del Congreso</label><br>
                <p>'.$Info[Nombre].'</p>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-12">
                <label for="exampleTextarea" style="font-size: 16px " class="control-label">Nombre del Congreso</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" name="Que_es">'.$Info[Que_es].'</textarea>
              </div>
            </div>
            <div class="row">  
              <div class="form-group col-xs-12">
                <label for="exampleTextarea" style="font-size: 16px " class="control-label">Descripción del Congreso</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" name="Sobre_Congreso">'.$Info[Sobre_Congreso].'</textarea>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-12">
                <label for="exampleTextarea" style="font-size: 16px " class="control-label">¿Quiénes pueden participar en el Congreso?</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"  name="Quienes">'.$Info[Quienes].'</textarea>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-12">
                <label for="exampleTextarea" style="font-size: 16px " class="control-label">¿Por qué participar en el Congreso?</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"  name="Por_que">'.$Info[Por_que].'</textarea>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-12">
                <label for="exampleTextarea" style="font-size: 16px " class="control-label">Información del Congreso</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"  name="Nosotros">'.$Info[Nosotros].'</textarea>
              </div>
            </div>           
            <div class="row">
              <div class="form-group col-xs-12">
                <label for="exampleTextarea" style="font-size: 16px " class="control-label">Página de Facebook</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"  name="Facebook">'.$Info[Facebook].'</textarea>
              </div>
            </div> 
            <div class="row">
              <div class="form-group col-xs-12">
                <label for="exampleTextarea" style="font-size: 16px " class="control-label">Página de Twitter</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"  name="Twitter">'.$Info[Twitter].'</textarea>
              </div>
            </div> 
            <div class="row">
              <div class="form-group col-xs-12">
                <label for="exampleTextarea" style="font-size: 16px " class="control-label">Página de YouTube</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"  name="Youtube">'.$Info[Youtube].'</textarea>
              </div>
            </div> 
            <div class="row">
              <div class="col-xs-12">
                <p>Elija el color principal del Congreso</p>
                <input name="Color" type="color" style="width: 100px; height: 50px; margin-left: 0" value="'.$Info[Color].'">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-4 offset-sm-10">
                <input style="height:50px" type="submit" name="Guardar" value="Guardar" class="btn btn-success btn-raised">
              </div>
          </div>
      </form>
      ';
?>    
    </div>
  </div>
</div>
<?php include('footer.php');
if ($_POST['Guardar']) {
    include("conexion.php");
    date_default_timezone_set('America/Bogota'); 
    $Año = date("Y");
    $Id_Congreso=$_POST['Id_Congreso'];
    $Institucion=$_POST['Institucion'];
    $Texto1=$_POST['Texto1'];
    $Texto2=$_POST['Texto2'];
    $Texto3=$_POST['Texto3'];
    $Que_es=$_POST['Que_es'];
    $Sobre_Congreso=$_POST['Sobre_Congreso'];
    $Quienes=$_POST['Quienes'];
    $Por_que=$_POST['Por_que'];
    $Nosotros=$_POST['Nosotros'];
    $Facebook=$_POST['Facebook'];
    $Twitter=$_POST['Twitter'];
    $Youtube=$_POST['Youtube'];
    $Color=$_POST['Color'];
    $Logo=$_POST['Logo'];
    $Actualizar= $conex ->query("UPDATE congreso SET Año='$Año', Institucion='$Institucion', Color='$Color', Logo='$Logo' WHERE Id_Congreso='$Id_Congreso'");
    $Info = $conex->query("UPDATE info_congreso SET Texto1='$Texto1', Texto2='$Texto2', Texto3='$Texto3', Que_es='$Que_es', Sobre_Congreso='$Sobre_Congreso',Quienes='$Quienes', Por_que='$Por_que', Nosotros='$Nosotros', Facebook='$Facebook', Twitter='$Twitter', Youtube='$Youtube' WHERE Id_Congreso='$Id_Congreso'");
    
    echo "
              <div style='display:block;left:0px;' class='Area_Oscura2'>
                <div class='container'>
                  <div class='row'>
                    <div class='col-sm-4 col-sm-offset-4'>
                      <div class='well' style='margin-top:55%;'>
                        <h4 align='center'>La información se ha guardado correctamente.</h4>
                        <div class='row'>
                          <div class='col-sm-6 col-sm-offset-3'>
                             <a href='Formulario.php' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>";

}
?>