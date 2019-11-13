<?php 
include("conexion.php");
include("../Idc.php");
  session_start();
  if (@$_GET['cerrar']) {
    session_unset(@$_SESSION['IdPonente']);
    session_destroy();
  }
  if ($_POST['Ingresar']) {
    $Tipo = $_POST['T'];
    if ($Tipo==2) {
      $Usuario = $_POST['Usuario'];
      $Password2 = $_POST['Password'];
      $Password = md5($_POST['Password']);
      date_default_timezone_set('America/Bogota'); 
      $Año = date("Y");
      if (!empty($Usuario)) {
          if (!empty($Password)) {
            $sql = "SELECT asistente.DocumentoA FROM asistente, registro_asistencia WHERE asistente.DocumentoA='$Usuario' AND asistente.AñoA='$Año' AND asistente.Password='$Password' AND asistente.Tipo='$Tipo' AND registro_asistencia.Id_Congreso='$Idc' AND registro_asistencia.Id_Asistente=asistente.IdAsistente";
            $querie = $conex->query($sql);
            if (mysqli_num_rows($querie)==0){
               echo "
                <div style='display:block;left:0px;' class='Area_Oscura2'>
                  <div class='container'>
                    <div class='row'>
                      <div class='col-sm-4 col-sm-offset-4'>
                        <div class='well' style='margin-top:55%;'>
                          <h4 align='center'>Verifica tus datos ingresados. $Idc</h4>
                          <div class='row'>
                            <div class='col-sm-6 col-sm-offset-3'>
                                <a href='index.php?T=$Tipo' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                ";
            }else{
              $Resultado = mysqli_fetch_assoc($querie);
              $_SESSION['IdPonente'] = $Resultado['DocumentoA'];
              $_SESSION['Tipo'] = $Tipo;
              echo "<script type='text/javascript'>window.location='Login.php'</script>";
            }
          }
      }
    }else{
      $Usuario = $_POST['Usuario'];
      $Password2 = $_POST['Password'];
      $Password = md5($_POST['Password']);
      date_default_timezone_set('America/Bogota'); 
      $Año = date("Y");
      if (!empty($Usuario)) {
          if (!empty($Password)) {
            $sql = "SELECT IdPonente FROM ponente WHERE IdPonente='$Usuario' AND Año='$Año' AND Password='$Password' AND Tipo='$Tipo' AND Id_Congreso='$Idc'";
            $querie = $conex->query($sql);
            if (mysqli_num_rows($querie)==0){
               echo "
                <div style='display:block;left:0px;' class='Area_Oscura2'>
                  <div class='container'>
                    <div class='row'>
                      <div class='col-sm-4 col-sm-offset-4'>
                        <div class='well' style='margin-top:55%;'>
                          <h4 align='center'>Verifica tus datos ingresados.</h4>
                          <div class='row'>
                            <div class='col-sm-6 col-sm-offset-3'>
                                <a href='index.php?T=$Tipo' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                ";
            }else{
              $Resultado = mysqli_fetch_assoc($querie);
              $_SESSION['IdPonente'] = $Resultado['IdPonente'];
              $_SESSION['Tipo'] = $Tipo;
              echo "<script type='text/javascript'>window.location='Login.php'</script>";
            }
          }
      }
    }
  }
include('Head.php');?>
    <div class="container">
      <div class="row"> 
        <div class="col-sm-6 col-sm-offset-3">
          <div class="well" style="margin-top: 15%;">
            <?php
            $Sql2=$conex->query("SELECT Logo FROM congreso WHERE Id_Congreso='$Idc'");
            $Resul2=mysqli_fetch_assoc($Sql2);
            echo '
                <img src="'.$Resul2[Logo].'" class="center-block">';             
                $Tipo=$_GET['T'];
                if ($Tipo==1) {
                  echo '
                  <h4 style="text-align: center; color: #333">Confere<strong>ncista</strong></h4>';
                }if ($Tipo==0) {
                  echo '
                  <h4 style="text-align: center; color: #333">Pon<strong>ente</strong></h4>';
                }if ($Tipo==2) {
                  echo '
                  <h4 style="text-align: center; color: #333">Asist<strong>ente</strong></h4>';
                } 
            ?>
            <hr style="width: 20%; background: #ff5722; height: 1px; margin-top: -5px;" class="center-block">
            <div class="form">
              <form method="POST" action="index.php" class="login-form">
                <div class="form-group label-floating">
                  <label class="control-label" for="focusedInput1">Usuario</label>
                  <input type="text" maxlength="30" name="Usuario" class="form-control" required>
                </div>
                <div class="form-group label-floating">
                  <label class="control-label" for="focusedInput1">Contraseña</label>
                  <input name="Password" type="password" maxlength="30"  class="form-control" required>
                </div>
                <input style="text-align: center; height: 50px;" type="submit" name="Ingresar" id="Ingresar" class="btn btn-info btn-raised" value="Ingresar">
                <?php
                $Tipo=$_GET['T'];
                echo '<input type="hidden" name="T" value="'.$Tipo.'">';
              ?>
              </form>
            </div>
            <div class="row">
              <?php
               $Tipo=$_GET['T'];
               
               if ($Tipo==1) {
                   $Sql1=$conex->query("SELECT Ponente FROM inscripciones WHERE Id_Congreso='$Idc'");
                  $A=mysqli_fetch_assoc($Sql1);
                  $Resultado=$A['Ponente'];
                    if ($Resultado==1) {
                       echo '
                        <div class="col-xs-12"><a href="../Inscripcion.php?T='.$Tipo.'" class="center-block" style="text-align: center">¿Aún no registras tu ';
                        echo "conferencia?</a></div>";
                    }
                }
                if ($Tipo==0) {
                  $Sql1=$conex->query("SELECT Ponente FROM inscripciones WHERE Id_Congreso='$Idc'");
                  $A=mysqli_fetch_assoc($Sql1);
                  $Resultado=$A['Ponente'];
                    if ($Resultado==1) {
                      echo '
                        <div class="col-xs-12"><a href="../Inscripcion.php?T='.$Tipo.'" class="center-block" style="text-align: center">¿Aún no registras tu ';
                      echo "ponencia?</a></div>";
                    }
                }
                if ($Tipo==2) {
                  $Sql1=$conex->query("SELECT Asistente FROM inscripciones WHERE Id_Congreso='$Idc'");
                  $A=mysqli_fetch_assoc($Sql1);
                  $Resultado=$A['Asistente'];
                    if ($Resultado==1) {
                      echo '
                        <div class="col-xs-12"><a href="../Registro.php?T='.$Tipo.'" class="center-block" style="text-align: center">¿Aún no registras tu ';
                      echo "asistencia?</a></div>";
                    }
                }       
              ?>
              <div class="col-xs-12">
                <a data-toggle='modal' data-target='#processing-modal' class="center-block" style='cursor: pointer; text-align: center;'>He olvidado mi contraseña</a>
              </div>
              <div class="col-xs-12"><a href="../index.php" class="center-block" style="text-align: center">Volver</a></div>
            </div>
          </div>
        </div>
      </div> 
    </div>
<?php 
  include('Footer.php');
  echo "
    <div style='height:100%' class='modal modal-static fade' id='processing-modal' role='dialog' aria-hidden='true'>
      <div class='modal-dialog' style='z-index:1054;'>
        <div class='modal-content' style='left:-100px; z-index:1054; height:275px; width: 600px'>
          <div class='modal-body'>
            <div class='row'>
              <form action='' method='POST'>
                <input type='hidden' name='T' value='$Tipo'>
                <div class='col-xs-12 col-sm-12'>
                  <div class='form-group label-floating'>
                    <label class='control-label' for='focusedInput1'>Usuario</label>
                    <input class='form-control' id='focusedInput1' type='text' name='Usuario' required></textarea>
                  </div>
                </div>
                <div class='col-xs-12 col-sm-12'>
                  <div class='form-group label-floating'>
                    <label class='control-label' for='focusedInput2'>Email registrado</label>
                    <input class='form-control' id='focusedInput2' type='Email' name='Email' required>
                  </div>
                </div>
                <div class='col-xs-12 col-sm-6'>
                  <a style='height: 50px;' href='#' data-dismiss='modal' aria-hidden='true' class='btn btn-danger btn-raised' >Cancelar</a>
                </div>
                <div class='col-xs-12 col-sm-6'>
                  <input type='submit' style='height: 50px;' name='Enviar' class='btn btn-info btn-raised' value='Enviar'>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    ";
  if ($_POST['Enviar']) {
    $Usuario = $_POST['Usuario'];
    $Email = $_POST['Email'];
    $Tipo = $_POST['T'];

    $Sql1=$conex->query("SELECT congreso.Nombre,congreso.Logo, info_congreso.Subdominio, administrador.Email FROM congreso, info_congreso, administrador WHERE congreso.Id_Congreso='$Idc' AND info_congreso.Id_Congreso='$Idc'");
      $Resul=mysqli_fetch_assoc($Sql1);

    if ($Tipo==2) {
      $sql1=$conex->query("SELECT IdAsistente, NombresA, ApellidosA FROM asistente WHERE  DocumentoA='$Usuario' AND Email='$Email' AND Id_Congreso='$Idc'");
      $Doc=mysqli_fetch_assoc($sql1);
      $Id=$Doc['IdAsistente'];
      $Nombres=$Doc['NombresA'];
      $Apellidos=$Doc['ApellidosA'];
    }else{
      $sql1=$conex->query("SELECT IdPonencia, Nombres, Apellidos FROM ponente WHERE  IdPonente='$Usuario' AND Email='$Email' AND Id_Congreso='$Idc'");
      $Doc=mysqli_fetch_assoc($sql1);
      $Id=$Doc['IdPonencia'];
      $Nombres=$Doc['Nombres'];
      $Apellidos=$Doc['Apellidos'];
    }
    if (mysqli_num_rows($sql1)!=0) {
      $count = 1;
      while ($count!=0) {
        $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $randomString = '';
          for ($i = 0; $i < 6; $i++) {
              $randomString .= $chars[rand(0, strlen($chars) - 1)];
              $Password=md5($randomString);
          }
          $count=0;
      }

      if ($Tipo==2) {
        $sql2=$conex->query("UPDATE asistente SET Password='$Password' WHERE IdAsistente='$Id' AND Id_Congreso='$Idc'");

        $Destino = $Email;
        $Remitente = "comitetecnico@covaite.com";
        $Asunto = 'Notificación plataforma';
        $Cuerpo = '
          <html>
              <head>
                <title></title>
              </head>
              <body>
                <p style="font-size:28px; color:#333"><strong>Hola: </strong> '.$Nombres.' '.$Apellidos.', Has solicitado el cambio de contraseña, para poder iniciar sesión en '.$Resul[Nombre].' te ha generado la siguiente: </p>
                <br>
                <div>
                  <p style="font-size:28px; color:#333"><strong>Usuario: </strong> '.$Usuario.' </p>
                  <p style="font-size:28px; color:#333"><strong>Contraseña: </strong> '.$randomString.' </p>
                  <p style="font-size:28px; color:#333"><strong>Recuerda ingresar a: </strong><a style="text-decoration:none;" href="'.$Resul[Subdominio].'">'.$Resul[Subdominio].'</a> y actualizar tus datos.</p>
                  <br>
                  <hr style="width:45%; background:#ccc;" align="left">
                  <br>
                  <table>
                      <tr>
                        <td width="250px">
                          <a href="'.$Resul[Subdominio].'">
                            <img src="'.$Resul[Logo].'">
                          </a>
                        </td>
                    </tr>
                  </table>
                </body>
                </html>
                ';
        $Cabecera = "MIME-Version: 1.0\r\n";
        $Cabecera.="Content-type: text/html; charset=iso-8859-1\r\n";
        $Cabecera.="From: " . $Remitente;
        @mail($Destino, $Asunto, $Cuerpo, $Cabecera);

        echo "
        <div style='display:block;left:0px;' class='Area_Oscura2'>
          <div class='container'>
            <div class='row'>
              <div class='col-sm-4 col-sm-offset-4'>
                <div class='well' style='margin-top:55%;'>
                  <h4 align='center'>Se ha enviado un correo electrónico con la nueva contraseña.</h4>
                  <div class='row'>
                    <div class='col-sm-6 col-sm-offset-3'>
                      <a href='index.php?T=$Tipo' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      ";

      }else{
        $sql2=$conex->query("UPDATE ponente SET Password='$Password' WHERE IdPonencia='$Id' AND Id_Congreso='$Idc'");

        $Destino = $Email;
        $Remitente = "comitetecnico@covaite.com";
        $Asunto = 'Notificación plataforma';
        $Cuerpo = '
          <html>
              <head>
                <title></title>
              </head>
              <body>
                <p style="font-size:28px; color:#333"><strong>Hola: </strong> '.$Nombres.' '.$Apellidos.', Has solicitado el cambio de contraseña, para poder iniciar sesion en '.$Resul[Nombre].' te ha generado la siguiente: </p>
                <br>
                <div>
                  <p style="font-size:28px; color:#333"><strong>Usuario: </strong> '.$Usuario.' </p>
                  <p style="font-size:28px; color:#333"><strong>Contraseña: </strong> '.$randomString.' </p>
                  <p style="font-size:28px; color:#333"><strong>Recuerda ingresar a: </strong><a style="text-decoration:none;" href="http://covaite.com">www.covaite.com</a> y actualizar tus datos.</p>
                  <br>
                  <hr style="width:45%; background:#ccc;" align="left">
                  <br>
                  <table>
                    <tr>
                      <td width="250px">
                        <a href="'.$Resul[Subdominio].'">
                        <img src="'.$Resul[Logo].'">
                      </a>
                      </td>
                    </tr>
                  </table>
                </body>
                </html>
                ';
        $Cabecera = "MIME-Version: 1.0\r\n";
        $Cabecera.="Content-type: text/html; charset=iso-8859-1\r\n";
        $Cabecera.="From: " . $Remitente;
        @mail($Destino, $Asunto, $Cuerpo, $Cabecera);
        echo "
        <div style='display:block;left:0px;' class='Area_Oscura2'>
          <div class='container'>
            <div class='row'>
              <div class='col-sm-4 col-sm-offset-4'>
                <div class='well' style='margin-top:55%;'>
                  <h4 align='center'>Se ha enviado un correo electrónico con la nueva contraseña.</h4>
                  <div class='row'>
                    <div class='col-sm-6 col-sm-offset-3'>
                      <a href='index.php?T=$Tipo' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      ";
      }
    }else{
      echo "
        <div style='display:block;left:0px;' class='Area_Oscura2'>
          <div class='container'>
            <div class='row'>
              <div class='col-sm-4 col-sm-offset-4'>
                <div class='well' style='margin-top:55%;'>
                  <h4 align='center'>Usuario o Email no validos.</h4>
                  <div class='row'>
                    <div class='col-sm-6 col-sm-offset-3'>
                      <a href='index.php?T=$Tipo' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      ";
    }
  }
?>
