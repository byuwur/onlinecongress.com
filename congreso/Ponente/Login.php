<?php 
include("conexion.php");
include("Variables.php");
include("Head.php");
include("../Idc.php");
if ($IdPonente != ""){
    $SqlP=$conex->query("SELECT ponencia.Titulo FROM ponencia, ponente WHERE ponente.IdPonencia='$IdPonencia' AND ponencia.IdPonencia='$IdPonencia' AND ponencia.IdPonencia=ponente.IdPonencia AND ponente.IdPonente='$IdPonente' AND ponente.Id_Congreso='$Idc'");
  $Resultado=mysqli_fetch_assoc($SqlP);
  echo "
<div onclick='Refe_Ex()' class='menu-toggle Area_Oscura Ocultar_A'></div>
<div class='navbar-fixed-top navbar navbar-warning' style='background:#0277bd'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-warning-collapse'>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <a href='#' onclick='Refe_Ex()' class='menu-toggle navbar-brand'>
        <img href='javascript:void(0)' class='img-responsive center-block' src='img/Menu.svg' alt='icon'>
      </a>
    </div>
    <div class='navbar-collapse collapse navbar-warning-collapse'>
      <ul class='nav navbar-nav navbar-right'>
        <li class='dropdown'>
          <a href='javascript:void(0)' data-target='#' class='dropdown-toggle' data-toggle='dropdown'>";
            echo $Genero." ".$Nombres;
          echo "
          <span> </span><b class='caret'></b></a>
          <ul class='dropdown-menu'>";
          echo '
            <li><a href="index.php?cerrar=cerrar&T='.$Tipo.'">Salir</a></li>';
          echo "
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class='container'>
  <div id='wrapper' class='active'>  
    <div id='sidebar-wrapper' style='background:#fff'>
      <div class='row'>
        <div class='container-fluid img-responsive' style='background-image:url(../Img_Web/Logo.png); background-repeat: no-repeat; background-size: 291px 77px; filter: blur(0px); height:110px; width:332px; margin-top:8px'> 
        </div>";
        if ($Resultado['Titulo']!="") {
          echo "
          <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='InfoPonencia.php' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Información ";
                  if ($Tipo==1) {
                    echo "Conferencia";
                    }else{
                          echo "Ponencia";
                    } 
                  echo"</p>
                </div>              
              </div>
            </a>
          </div>
          <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='Ponencia.php?U=$IdPonente&P=$IdPonencia&TU=$Tipo' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Mi ";
                  if ($Tipo==1) {
                    echo "Conferencia";
                    }else{
                          echo "Ponencia";
                    } 
                  echo"</p>
                </div>              
              </div>
            </a>
          </div>";
        }
        if ($Tipo!=2) {
          if ($Resultado['Titulo']!="") {
            echo "<div style='margin-top: 15px;' class='col-xs-12'>
              <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='TodasPonencias.php?U=$IdPonente&T=0&TU=$Tipo' target='iframe_thingy'>
                <div class='row' style='padding-top: 0px;'>
                  <div class='col-xs-9'>
                    <p>Todas las ponencias</p>
                  </div>              
                </div>
              </a>
            </div>
            <div style='margin-top: 15px;' class='col-xs-12'>
              <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='TodasPonencias.php?U=$IdPonente&T=1&TU=$Tipo' target='iframe_thingy'>
                <div class='row' style='padding-top: 0px;'>
                  <div class='col-xs-9'>
                    <p>Todas las conferencias</p>
                  </div>              
                </div>
              </a>
            </div>
            <div style='margin-top: 15px;' class='col-xs-12'>
          <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='Perfil.php?U=$IdPonente&T=$Tipo&P=$IdPonencia' target='iframe_thingy'>
            <div class='row' style='padding-top: 0px;'>
              <div class='col-xs-9'>
                <p>Perfil</p>
              </div>              
            </div>
          </a>
          </div>
            ";
          }
        }else {
          echo "<div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='TodasPonencias.php?U=$IdPonente&T=0&TU=$Tipo' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Todas las ponencias</p>
                </div>              
              </div>
            </a>
          </div>
          <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='TodasPonencias.php?U=$IdPonente&T=1&TU=$Tipo' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Todas las conferencias</p>
                </div>              
              </div>
            </a>
          </div>
        <div style='margin-top: 15px;' class='col-xs-12'>
          <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='PerfilA.php?U=$IdPonente&T=$Tipo&P=$IdPonencia' target='iframe_thingy'>
            <div class='row' style='padding-top: 0px;'>
              <div class='col-xs-9'>
                <p>Perfil</p>
              </div>              
            </div>
          </a>
        </div>";
        }
      echo "
        <div style='margin-top: 15px;' class='col-xs-12'>
          <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='Contrasena.php?U=$IdPonente&Tipo=$Tipo' target='iframe_thingy'>
            <div class='row' style='padding-top: 0px;'>
              <div class='col-xs-9'>
                <p>Contraseña</p>
              </div>              
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
";
  if ($Tipo==2) {
    echo "
          <iframe style='height:90%; margin-top:-20px;' class='foo' scrolling='yes' name='iframe_thingy' src='TodasPonencias.php?U=$IdPonente&T=0&TU=$Tipo'>
          </iframe>";
  }else{
    if ($Resultado['Titulo']=="") {
      if ($Tipo==1) {
        echo "
          <iframe style='height:90%; margin-top:-20px;' class='foo' scrolling='yes' name='iframe_thingy' src='InsertarConferencia.php'>
          </iframe>";
      }else{
       echo "
        <iframe style='height:90%; margin-top:-20px;' class='foo' scrolling='yes' name='iframe_thingy' src='InsertarPonencia.php'>
        </iframe>";
      }
    }else{
        echo "
      <iframe style='height:90%; margin-top:-20px;' class='foo' scrolling='yes' name='iframe_thingy' src='InfoPonencia.php'>
      </iframe>";
    }
  }
}else{
  echo "
    <script type='text/javascript'>
      document.location = '../index.php';
    </script>
  ";
}
include("Footer.php");
?>