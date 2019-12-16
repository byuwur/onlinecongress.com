<?php 
include("Variables.php");
include("conexion.php");
include("Head.php");

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
        <h1 style="text-align: center; font-family: Arial;">Estadística de asistentes en línea del día<br><?php echo $Fecha1 ?></h1>
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

$Sql1=$conex->query("SELECT COUNT(*) as cant FROM registro_asistencia WHERE Id_Congreso='$Id_Congreso' AND Estado='1' AND Anno='$Año'");
$Activos=mysqli_fetch_array($Sql1);

$Sql2=$conex->query("SELECT COUNT(*) as cant2 FROM registro_asistencia WHERE Id_Congreso='$Id_Congreso' AND Estado='0' AND Anno='$Año'");
$Inactivos=mysqli_fetch_array($Sql2);

?>
<script type="text/javascript">
  google.charts.load("current", {"packages":["controls", "corechart", "bar"]}).then(function () {
        var data = google.visualization.arrayToDataTable([
      
      ["",
      'Activos', { role: 'annotation'},
      'Inactivos', { role: 'annotation'}],

      [<?php echo "'Asistentes',".$Activos[cant].",".$Activos[cant].",".$Inactivos[cant2].",".$Inactivos[cant2]?>]]);

  
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