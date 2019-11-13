<?php
include('Idc.php');
include("conexion.php");

 if (@$_GET['cerrar']) {
    session_start();
    session_unset(@$_SESSION['IdPonente']);
    session_destroy();
  }
  $Info=$conex->query("SELECT * FROM info_congreso, congreso WHERE info_congreso.Id_Congreso=congreso.Id_Congreso AND info_congreso.Id_Congreso='$Idc' AND congreso.Id_Congreso='$Idc'");
  $ResultadoI=mysqli_fetch_assoc($Info);
  echo '
  <style type="text/css">
    a:hover{
      background: '.$ResultadoI[Color].' !important;
      color:#fff !important;
    }
  </style>';
  ?>
<div class="navbar-fixed-top navbar navbar-info"<?php echo 'style="box-shadow: 0px 0px 10px 0px #818181; background: '.$ResultadoI['Color'].'"';?>>
    <div class="contaid">
      <div class="navbar-header" style="min-height: 100px;">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-warning-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="index.php" style="font-size:14px; color:#fff" class="navbar-brand page-scroll" href="#Inicio">
          <img <?php echo 'src="'.$ResultadoI['Logo'].'"';?> class="img-responsive" style="height: 80px; margin-top:0px;">

        </a>
      </div>
      <div class="navbar-collapse collapse navbar-warning-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
                <a href="javascript:void(0)" data-target="" class='dropdown-toggle' data-toggle="dropdown" style="color:#fff;font-size:14px; min-height: 100px;"><?php echo $ResultadoI['Nombre'];?>
                  <span> </span><b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="Comites.php">COMITÉS</a></li>
                  <li><a href="Normas.php">NORMAS DE PARTICIPACIÓN</a></li>
                  <li><a href="Auspiciantes.php">AUSPICIANTES</a></li>
                </ul>
              </li>
          <li>
        <?php 
          include("conexion.php");
          $Query2=$conex->query("SELECT ponencia.IdPonencia,ponencia.Titulo FROM ponencia, ponente WHERE ponencia.Tipo=1 AND ponencia.Estado=1 AND ponente.Id_Congreso='$Idc' AND ponencia.IdPonencia=ponente.IdPonencia");
          if (mysqli_num_rows($Query2)>0) {
         echo '
          <li class="dropdown">
                <a href="javascript:void(0)" data-target="" class="dropdown-toggle" data-toggle="dropdown" style="color:#fff;font-size:14px; min-height: 100px;">CONFERENCIAS
                  <span> </span><b class="caret"></b>
                </a>
                <ul class="dropdown-menu" style="overflow-y: auto; max-height: 460px;">';
                   while ($RC=mysqli_fetch_assoc($Query2)) {
                     $TituloC = substr($RC['Titulo'], 0, 50);
                     if (strlen($RC['Titulo'])>50) {
                       $Puntos="...";
                     }else{
                      $Puntos="";
                     }
                     echo '<li><a href="InformacionC.php?P='.$RC[IdPonencia].'">'.$TituloC.$Puntos.'</a></li>';
                   }
                   echo "
                </ul>
              </li>";
        }
        ?>
          <li class="dropdown">
                <a href="javascript:void(0)" data-target="" class='dropdown-toggle' data-toggle="dropdown" style="color:#fff;font-size:14px; min-height: 100px;">CATEGORIAS
                  <span> </span><b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <?php 
                  include("conexion.php");
                   $Quer3=$conex->query("SELECT Id, Categoria FROM categorias WHERE Id_Congreso='$Idc'");
                   while ($Cate=mysqli_fetch_assoc($Quer3)) {
                     echo '<li><a href="Categorias.php?C='.$Cate[Id].'">'.$Cate[Categoria].'</a></li>';
                   }
                  ?>
                </ul>
              </li>
          <li>
          <li class="dropdown">
                <a href="javascript:void(0)" data-target="" class='dropdown-toggle' data-toggle="dropdown" style="color:#fff;font-size:14px; min-height: 100px;">PARTICIPA
                  <span> </span><b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="Ponente/index.php?T=0">Ponente</a></li>
                  <li><a href="Ponente/index.php?T=1">Conferencista</a></li>
                  <li><a href="Ponente/index.php?T=2">Asistente</a></li>
                </ul>
              </li>
          <li>

          <!--li>
            <a style="color:#fff;font-size:14px; min-height: 100px; margin-top:0px;" class="btn btn-outline-warning" href="Certificados.php">Certificados</a>
          </li-->

           <li>
            <a style="color:#fff;font-size:14px; min-height: 100px; margin-top:0px;" class="btn btn-outline-warning" href="Contacto.php">CONTACTO</a>
          </li>
        </ul>
      </div>
    </div>
  </div>