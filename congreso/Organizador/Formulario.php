<?php 
include("conexion.php");
include("Variables.php");
include("Head.php");?>
<style type="text/css">
  label{
    font-size: 16px;
  }
</style>
<div class="container">
  <div class="col-xs-12 col-sm-12">
    <div class="well">
      <h1 style="text-align:center;">CREAR CONGRESO</h1>
      <hr style="color:#0277bd; background:#0277bd; width:30%;" class="center-block">
      <div class="row">
        <form method="POST" action="">
        <div class="form-group">
            <div class="row">
              <div class="form-group col-xs-12 col-sm-6">
                  <label for="exampleSelect1" class="bmd-label-floating">Tipo de documento de identidad</label>
                  <select class="form-control" id="exampleSelect1" name="TipoDocumento">
                  <option>Cédula de ciudadanía</option>
                  <option>Cédula de identidad</option>
                  <option>Carteira de Identidade o Registro Geral</option>
                  <option>Documento único de identidad</option>
                  <option>Documento personal de identificación</option>
                  <option>Tarjeta de identidad</option>
                  <option>Clave única de registro de población y Credencial para Votar o Credencial de Elector</option>
                  <option>Cédula de identidad personal</option>
                  <option>Cédula de identidad civil</option>
                  <option>Cartão de Cidadão</option>
                  <option>Cédula de identidad y electoral</option>
                  <option>Pasaporte</option>
                  </select>
              </div>
              <div class="form-group col-xs-12 col-sm-6" style="margin-top: 22px">
                <label for="exampleInputEmail1" style="font-size: 16px " class="control-label">Documento</label>
                <input class="form-control" type="text" id="exampleInputEmail1" name="Documento">
              </div>
              <div class="form-group col-xs-12">
                <label for="exampleSelect1" style="font-size: 16px " class="control-label">Nombre Completo</label>
                <input class="form-control" type="text" id="exampleSelect1" name="Nombre">
              </div>
              <div class="form-group col-xs-12">
                <label for="exampleSelect1" style="font-size: 16px " class="control-label">Correo Electronico</label>
                <input class="form-control" type="text" id="exampleInputEmail1" name="Email">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-2 col-sm-offset-5">
                <input type="submit" name="Guardar" value="Guardar" class="btn btn-success btn-raised">
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php');
if ($_POST['Guardar']) {
    include("conexion.php");
    $TipoDocumento=$_POST['TipoDocumento'];
    $Documento=$_POST['Documento'];
    $Nombre=$_POST['Nombre'];
    $Email=$_POST['Email'];
    $Password=md5($Documento);
    

    $count = 1;
    while ($count!=0) {
      $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $chars[rand(0, strlen($chars) - 1)];
        }
      $query1 = "SELECT Id_Congreso FROM congreso WHERE Id_Congreso='$randomString'";
      $result = $conex->query($query1);
      $count = mysqli_num_rows($result);
    }

    $A=$conex->query("INSERT INTO administrador VALUES('$TipoDocumento', '$Documento','$Nombre', '$Email', '$Password')");
    $B=$conex->query("INSERT INTO congreso VALUES('$randomString', '$Nombre', '', '#0277bd', '', '', '$Documento')");
    $C=$conex->query("INSERT INTO info_congreso VALUES('$randomString', '', '', '', '', '', '', '', '', '', '', '')");
              $Destino = $Email;
              $Remitente = "comitetecnico@covaite.com";
              $Asunto = 'Notificación plataforma';
              $Cuerpo = '
              <html>
              <head>
                <title></title>
              <meta charset="utf-8">
              </head>
              <body>
                <p style="font-size:28px; color:#333"><strong>Bienvenido: </strong> '.$Nombre.', Su registro ha sido exitoso, ahora pudes ingresar a la plataforma de Online Congress </p>
                <br>
                <div>
                  <p style="font-size:28px; color:#333"><strong>Usuario: </strong> '.$Documento.' </p>
                  <p style="font-size:28px; color:#333"><strong>Código del Congreso: </strong>'.$Randomstring.' </p>                
                  <p style="font-size:28px; color:#333"><strong>Password: </strong>Es su mismo número de usuario '.$Documento.' </p> 
                  <hr style="width:45%; background:#ccc;" align="left">
                  <br>
                  <table>
                    <tr>
                      <td width="250px">
                        <a href="http://weapp.com.co/Covaite">
                        <img src="http://weapp.com.co/Covaite/Img_Web/Logo.png">
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
                        <h4 align='center'>La información se ha guardado correctamente.</h4>
                        <div class='row'>
                          <div class='col-sm-6 col-sm-offset-3'>
                             <a href='Formulario.php?T=0' style='width:100%' class='btn btn-info btn-raised'>Aceptar</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              ";
}
?>