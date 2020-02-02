<?php 
include('Head.php');
include('Nav.php');
include("conexion.php");
include('Idc.php');?>

<div class="container" style="margin-top: 10%">
  <div class="row">
    <h2 class="section-heading" style="text-align: center;">AUSPICIANTES</h2>
    <hr class="section-heading-spacer center-block" style="background:#ff5722; width:20%">
    <div class="col-xs-12">
      <a target="_blank" class="thumb">
<?php
$Consul = $conex->query("SELECT Img FROM auspiciantes WHERE Id_Congreso='$Idc'");
$Result=mysqli_fetch_assoc($Consul);
      echo '<img class="center-block img-responsive" src="'.$Result[Img].'">';
?>
      </a>
    </div>
  </div>
</div>
<br>
<br>
<?php include('footer.php');?>