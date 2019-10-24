<?php 
include("Head.php");
include("conexion.php");
session_start();
$IdUsuario = $_SESSION['IdPonente'];
/*
$ConsultaL = $conex->query("SELECT Logo from administrador where IDI='$IDI'");
$Logo = mysqli_fetch_assoc($ConsultaL);
*/
$Logos="img/3.jpg";
if ($IdUsuario != ""){
  echo "
<div onclick='Refe_Ex()' class='menu-toggle Area_Oscura Ocultar_A'></div>
<div class='navbar-fixed-top navbar navbar-warning'>
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
            echo $IdUsuario;
          echo "
          <span> </span><b class='caret'></b></a>
          <ul class='dropdown-menu'>
            <li><a href='../logout.php?logout'>Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class='container'>
  <div id='wrapper' class='active'>  
    <div id='sidebar-wrapper'>
      <div class='row'>
        <div class='container-fluid' style='background-image:url(img/Logo.png); background-size:cover; filter: blur(0px); height:150px; width:100%;'>
        </div>
          <div class='row'>
            <div class='col-xs-12'>
                <br>
                ";
                echo "<img style='width:120px; margin-top:-150px; border: solid 1px #fff;' class='' src='".$Logos."'>
            </div>
            <br>
          </div>
        <div style='margin-top: 15px;' class='col-xs-12'>
          <a style='color:#fff; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default' href='CanchasAdmin.php?IdUsuario=$IdUsuario' target='iframe_thingy'>
            <div class='row' style='padding-top: 0px;'>
              <div class='col-xs-9'>
                <p>Canchas Administradas</p>
              </div>
              <div class='col-xs-3'>
                <img class='center-block' id='' src='img/Administradas2.svg' alt='icon'>
              </div>
            </div>
          </a>  
          <a id='Grados' target='iframe_thingy'";$Usuario = $_SESSION['Usuario']; $IDI = $_SESSION['IDI']; 
          echo"href='Asignaturas.php?Usuario=$Usuario&IDI=$IDI' style='color:#fff; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default'>
            <div class='row' style='padding-top: 0px;'>
              <div class='col-xs-9'>
                <p>Reservas</p>
              </div>
              <div class='col-xs-3'>
                <img class='center-block' id='' src='img/Calendario.svg' alt='icon'>
              </div>
            </div>
          </a>
          <a id='Grados' target='iframe_thingy'";$Usuario = $_SESSION['Usuario']; $IDI = $_SESSION['IDI']; 
          echo"href='Seleccionar_Estadistica.php?Usuario=$Usuario&IDI=$IDI' style='color:#fff; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default'>
            <div class='row' style='padding-top: 0px;'>
              <div class='col-xs-9'>
                <p>Estadísticas</p>
              </div>
              <div class='col-xs-3'>
                <img class='center-block' id='' src='img/Estadisticas.svg' alt='icon'>
              </div>
            </div>
          </a>
          <a style='color:#fff; padding: 10px 1px; text-align: left; margin-top: 0px;' class='btn btn-default' data-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample'>
              <div class='row' style='padding-top: 0px;'>
              <div class='col-xs-9'>
                <p>Información Canchas</p>
              </div>
              <div class='col-xs-3'>
                <img class='center-block' id='' src='img/Info.svg' alt='icon'>
              </div>
            </div>
          </a>
          <div class='collapse' id='collapseExample'>
            <div class=''>
              <a id='Grados' target='iframe_thingy'";$Usuario = $_SESSION['Usuario']; $IDI = $_SESSION['IDI']; 
              echo"href='Seleccionar_Estadistica.php?Usuario=$Usuario&IDI=$IDI' style='color:#fff; padding: 10px 1px; text-align: left; margin-top: 0px; width:100%;' class='menu-toggle Ocultar_A btn btn-default'>
                <div class='row' style='padding-top: 0px;'>
                  <div class='col-xs-12'>
                    <p>Cancha 1</p>
                  </div>
                </div>
              </a>
              <a id='Grados' target='iframe_thingy'";$Usuario = $_SESSION['Usuario']; $IDI = $_SESSION['IDI']; 
              echo"href='Seleccionar_Estadistica.php?Usuario=$Usuario&IDI=$IDI' style='color:#fff; padding: 10px 1px; text-align: left; margin-top: 0px; width:100%;' class='menu-toggle Ocultar_A btn btn-default'>
                <div class='row' style='padding-top: 0px;'>
                  <div class='col-xs-12'>
                    <p>Cancha 2</p>
                  </div>
                </div>
              </a>
              <a id='Grados' target='iframe_thingy'";$Usuario = $_SESSION['Usuario']; $IDI = $_SESSION['IDI']; 
              echo"href='Seleccionar_Estadistica.php?Usuario=$Usuario&IDI=$IDI' style='color:#fff; padding: 10px 1px; text-align: left; margin-top: 0px; width:100%;' class='menu-toggle Ocultar_A btn btn-default'>
                <div class='row' style='padding-top: 0px;'>
                  <div class='col-xs-12'>
                    <p>Cancha 3</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <a id='Grados' target='iframe_thingy' href='CrearCancha.php?IdUsuario=$IdUsuario'   style='color:#fff; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default'>
            <div class='row' style='padding-top: 0px;'>
              <div class='col-xs-9'>
                <p>Crear Canchas</p>
              </div>
              <div class='col-xs-3'>
                <img class='center-block' id='' src='img/Crear.svg' alt='icon'>
              </div>
            </div>
          </a>
          <a style='color:#fff; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-default'";$Usuario = $_SESSION['Usuario']; $IDI = $_SESSION['IDI']; echo"href='Boletines.php?Usuario=$Usuario&IDI=$IDI' target='iframe_thingy'>
            <div class='row' style='padding-top: 0px;'>
              <div class='col-xs-9'>
                <p>Perfil</p>
              </div>
              <div class='col-xs-3'>
                <img class='center-block' id='' src='img/Perfil.svg' alt='icon'>
              </div>
            </div>
          </a>
          <a style='color:#fff; padding: 10px 1px; text-align: left; margin-top: 0px;' class='menu-toggle Ocultar_A btn btn-light'";$Usuario = $_SESSION['Usuario']; $IDI = $_SESSION['IDI']; echo"href='Update_Contra.php?Usuario=$Usuario&IDI=$IDI' target='iframe_thingy'>
            <div class='row' style='padding-top: 0px;'>
              <div class='col-xs-9'>
                <p>Cambiar Contraseña</p>
              </div>
              <div class='col-xs-3'>
                <img class='center-block' id='' src='img/Contraseña.svg' alt='icon'>
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
<iframe style='height:90%' class='foo'  scrolling='yes' name='iframe_thingy' src='Bienvenido.php'>
</iframe>";
include("footer.php");
}else{
echo "
  <script type='text/javascript'>
    document.location = '../index.php';
  </script>
";
}
?>