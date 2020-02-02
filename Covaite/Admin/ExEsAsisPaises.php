<?php 
include("Variables.php");
include("conexion.php");
include("Head.php");

date_default_timezone_set('America/Bogota'); 
$Fecha = date("Y");
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div class="container" style="font-family: Arial">
  <div class="row">
    <div class="col-xs-12 col-sm-12" style="margin-top: 60px;">
      <div class="" id="testing">
        <br>
        <h1 style="text-align: center; font-family: Arial;">Estadística de participaciones por paises</h1>
          <div id='piechart' style='width: 100%; height: 500px; min-height: 300px'></div>
      </div>
    </div>
  </div>
  <div class="row">
    <form method="post" id="make_pdf" action="create_pdf.php">
      <input type="hidden" name="hidden_html" id="hidden_html" />
      <div class='col-xs-12 col-sm-3'>
          <input name='create_pdf' id='create_pdf' type='button' value='Exportar PDF' style='margin-top: -90px; height: 50px;'class='btn btn-success btn-raised'>
      </div>
    </form>
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

$Sql1=$conex->query("SELECT DISTINCT comentarios.IdUsuario, paises.name_pais FROM asistente, paises, comentarios, registro_asistencia WHERE registro_asistencia.Id_Asistente=comentarios.IdUsuario AND asistente.DocumentoA=comentarios.IdUsuario AND asistente.DocumentoA=registro_asistencia.Id_Asistente AND paises.id=asistente.Pais AND registro_asistencia.Id_Congreso='$Id_Congreso'");
$Paises=array();
while ($Activos=mysqli_fetch_assoc($Sql1)) {
  array_push($Paises, $Activos[name_pais]);
}
$conteo=array_count_values($Paises);
$PaisesNoduplicados=array_values(array_unique($Paises));
$CuantosPaises=count($PaisesNoduplicados);
?>
<script type="text/javascript">
  google.charts.load("current", {"packages":["controls", "corechart", "bar"]}).then(function () {
        var data = google.visualization.arrayToDataTable([
      
      ["",

      <?php
      for ($i=0; $i < $CuantosPaises; $i++) { 
        $Pais2=$PaisesNoduplicados[$i];
        echo "'$Pais2', { role: 'annotation'},";
      }

    echo '],';

    echo "['Participación por paises', ";  
      for ($o=0; $o < $CuantosPaises; $o++) { 
          $Pais3=$PaisesNoduplicados[$o];
          echo $conteo[$Pais3].",".$conteo[$Pais3].",";
        } 
      ?>
      ]]);

  
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