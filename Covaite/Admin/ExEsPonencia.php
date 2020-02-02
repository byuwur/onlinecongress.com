<?php 
include("Variables.php");
include("conexion.php");
include("Head.php");
$Tipo=$_GET['T'];
date_default_timezone_set('America/Bogota'); 
$Fecha = date("Y-m-d");
$A1 = substr($Fecha, 0, 4); 
$M1 = substr($Fecha, 5, 2); 
$D1 = substr($Fecha, 8, 2);

$meses1 = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$Fecha1=date($D1)." de ".$meses1[date($M1)-1]. " del ".date($A1);
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div class="container" style="font-family: Arial">
  <div class="row">
    <div class="col-xs-12 col-sm-12" style="margin-top: 60px;">
      <div class="" id="testing">
        <br>
        <h1 style="text-align: center; font-family: Arial;">Estadística de las 
      <?php
        if ($Tipo==0) {
          echo "ponencias";
        }else{
          echo "conferencias";
        }
      ?>
         con más participación</h1>
          <div id='piechart' style='width: 100%; height: 580px; min-height: 300px'></div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Título ponencia</th>
              <th scope="col">Ponente</th>
              <th scope="col">Participaciones</th>
            </tr>
          </thead>
          <tbody>
<?php
$Sql3=$conex->query("SELECT payload.*, ponencia.Titulo, ponente.Nombres, ponente.Apellidos from (
    SELECT COUNT(IdComentario) AS comentarios, IdPonencia FROM `comentarios` 
    GROUP BY `IdPonencia`
) as payload
inner join ponencia on ponencia.IdPonencia = payload.IdPonencia
inner join ponente on ponente.IdPonencia = payload.IdPonencia  WHERE ponencia.Tipo='$Tipo' AND ponente.Id_Congreso='$Id_Congreso' order by comentarios desc");

$Contador=1;

while ($Resultado=mysqli_fetch_assoc($Sql3)) {
  echo '
    <tr>
      <th style="text-align:center" scope="row">'.$Contador.'</th>
      <td>'.$Resultado[Titulo].'</td>
      <td>'.$Resultado[Nombres].' '.$Resultado[Apellidos].'</td>
      <td style="text-align:center">'.$Resultado[comentarios].'</td>
    </tr>
  ';
  $Contador=$Contador+1;
}
?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top: 80px">
    <form method="post" id="make_pdf" action="create_pdf.php">
      <input type="hidden" name="hidden_html" id="hidden_html" />
      <div class='col-xs-12 col-sm-3'>
          <input name='create_pdf' id='create_pdf' type='button' value='Exportar PDF' style='margin-top: -90px; height: 50px;'class='btn btn-danger btn-raised'>
      </div>
    </form>
     <div class='col-xs-12 col-sm-3'>
        <a style='margin-top: -90px; height: 50px;'class='btn btn-success btn-raised' <?php echo "href='EstadisticasPonencias.php?T=$Tipo'"?>>Exportar Excel<a/>
      </div>
    <br>
  </div>
</div>
<script>
$(document).ready(function(){
 $('#create_pdf').click(function(){
  $('#hidden_html').val($('#testing').html());
  $('#make_pdf').submit();
 });
});
</script>
<?php 
date_default_timezone_set('America/Bogota'); 
$Año = date("Y");
$Fecha2=$Año."-01-01";
/*
$Sql1=$conex->query("SELECT IdPonencia FROM comentarios WHERE Id_Congreso='$Id_Congreso'");

while ($Ponencias=mysqli_fetch_assoc($Sql1)){
  $Sql2=$conex->query("SELECT COUNT(*) as cant FROM comentarios WHERE Id_Congreso='$Id_Congreso' AND IdPonencia='$Ponencias[IdPonencia]' Anno>='$Fecha2'");/*
    $Conteo=mysqli_fetch_array($Sql2);
}*/

$Conteo=2;
?>
<script type="text/javascript">
  google.charts.load("current", {"packages":["controls", "corechart", "bar"]}).then(function () {
        var data = google.visualization.arrayToDataTable([
      
      ["",
<?php 
date_default_timezone_set('America/Bogota'); 
$Año = date("Y");
$Fecha2=$Año."-01-01";
$Contador=0;/*
$Sql1=$conex->query("SELECT payload.*, Titulo from (
    SELECT COUNT(IdComentario) AS comentarios, IdPonencia FROM `comentarios` 
    GROUP BY `IdPonencia`
) as payload
inner join ponencia on ponencia.IdPonencia = payload.IdPonencia
order by comentarios desc LIMIT 2");*/

$Sql1=$conex->query("SELECT payload.*, ponencia.Titulo, ponente.Nombres, ponente.Apellidos from (
    SELECT COUNT(IdComentario) AS comentarios, IdPonencia FROM `comentarios` 
    GROUP BY `IdPonencia`
) as payload
inner join ponencia on ponencia.IdPonencia = payload.IdPonencia
inner join ponente on ponente.IdPonencia = payload.IdPonencia  WHERE ponencia.Tipo='$Tipo' AND ponente.Id_Congreso='$Id_Congreso' order by comentarios desc LIMIT 10");

$Array_Id_Ponencias= array();

  while ($Ponencias=mysqli_fetch_assoc($Sql1)){
      echo "'$Ponencias[Nombres] ".$Ponencias[Apellidos]."' , { role: 'annotation'},";
      array_push($Array_Id_Ponencias, $Ponencias[comentarios]);
      $Contador=$Contador+1;
    } 
    echo '],';

    echo "['Participación', ";  

for ($i = 0; $i < $Contador; $i++) {
    echo $Array_Id_Ponencias[$i].",".$Array_Id_Ponencias[$i].",";
}
echo "]]);";

?> 
    var Container = document.getElementById('piechart');
    var chart = new google.visualization.ColumnChart(Container);

  google.visualization.events.addListener(chart, 'ready', function(){
     Container.innerHTML = '<img src="' + chart.getImageURI() + '" class="img-responsive">';
  });
chart.draw(data, {
    chartArea: {
      left: 50,
      height: '300',
      width: '85%',
    },
    legend: {position: 'top', maxLines: 5}
  });
});
</script>
<?php include 'Footer.php';?>