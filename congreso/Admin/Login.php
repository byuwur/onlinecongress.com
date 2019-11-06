<?php 
include("conexion.php");
include("Variables.php");
include("Head.php");
if ($Usuario != ""){
  echo "
<style>
  p{margin: 0 0 10px !important;}
</style>
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
            echo $NombreCompleto;
          echo "
          <span> </span><b class='caret'></b></a>
          <ul class='dropdown-menu'>";
          echo '
            <li><a href="index.php?cerrar=cerrar">Salir</a></li>';
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
        <div class='container-fluid img-responsive' style='background-image:url(../Img_Web/Logo.png); background-repeat: no-repeat; background-size: 291px 77px; filter: blur(0px); height:110px; width:332px; margin-top: 8px'> 
        </div>
        <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='Formulario.php?T=0' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Información del Congreso</p>
                </div>              
              </div>
            </a>
          </div>
          <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='Categoria.php' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Crear Categorías</p>
                </div>              
              </div>
            </a>
          </div>
          <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='Comites.php' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Crear Comités</p>
                </div>              
              </div>
            </a>
          </div>
          <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='Asignar_Comite.php' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Asignar a Comités</p>
                </div>              
              </div>
            </a>
          </div>
        <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='TodasPonencias.php?T=0' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Todas las ponencias</p>
                </div>              
              </div>
            </a>
          </div>
          <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='TodasPonencias.php?T=1' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Todas las conferencias</p>
                </div>              
              </div>
            </a>
          </div>
          <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='Inscripciones.php' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Inscripciones</p>
                </div>              
              </div>
            </a>
          </div>          
          <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='Congreso.php' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Participación Congreso</p>
                </div>              
              </div>
            </a>
          </div>
          <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='Registros.php' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Registros del Congreso</p>
                </div>              
              </div>
            </a>
          </div>
          <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='Contrasena.php' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Cambiar contraseña</p>
                </div>              
              </div>
            </a>
          </div>
          <div style='margin-top: 15px;' class='col-xs-12'>
            <a style='color:#818181; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='Perfil.php' target='iframe_thingy'>
              <div class='row' style='padding-top: 0px;'>
                <div class='col-xs-9'>
                  <p>Editar datos Admin.</p>
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
<iframe style='height:90%; margin-top:-20px;' class='foo' scrolling='yes' name='iframe_thingy' src='TodasPonencias.php?'>
</iframe>";
include("Footer.php");
}else{
  echo "
    <script type='text/javascript'>
      document.location = '../index.php';
    </script>
  ";
}
?>
