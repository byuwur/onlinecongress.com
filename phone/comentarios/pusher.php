<?php
  require __DIR__ . '/vendor/autoload.php';
  include("../conectar_bd.php");
  $Id_Congreso = $_POST['Id_Congre'];
  $Comentario = $_POST['NComentario'];
  $IdPonencia = $_POST['IdP'];
  $IdUsuario = $_POST['IdU'];
  $TipoU = $_POST['TipoU'];

  date_default_timezone_set('America/Bogota'); 
  $Fecha=date("Y-m-d");
  $Año=date("Y");
  $Consulta = $conex->query("INSERT INTO comentarios VALUES(null, '$Id_Congreso', '$IdPonencia','$IdUsuario','$Comentario','$TipoU','$Fecha')");
  if ($TipoU==2) {
     $ConsultaUsuario = $conex->query("SELECT NombresA, ApellidosA FROM asistente WHERE DocumentoA='$IdUsuario' AND TipoU='$TipoU' AND Año='$Año' AND Id_Congreso='$Id_Congreso'");
      $Nombre = mysqli_fetch_assoc($ConsultaUsuario);
      $data['Nombre'] = $Nombre['NombresA'];
  }else{
     $ConsultaUsuario = $conex->query("SELECT Nombres, Apellidos FROM ponente WHERE IdPonente='$IdUsuario' AND TipoU='$TipoU' AND Año='$Año' AND Id_Congreso='$Id_Congreso'");
    $Nombre = mysqli_fetch_assoc($ConsultaUsuario);
    $data['Nombre'] = $Nombre['Nombres'];
  }
  $options = array(
    'cluster' => 'us2',
    'useTLS' => true
  );

  $pusher = new Pusher\Pusher(
    'ad3e2b909ae8d24f7fd9',
    '74586a1d1129cada3a4e',
    '645612',
    $options
  );

  class MyLogger {
    public function log( $msg ) {
      print_r( $msg . "\n" );
    }
  }

  $pusher->set_logger( new MyLogger() );


  $data['message'] = "1";
  $data['UsuarioPublico'] = $IdUsuario;
  $pusher->trigger($IdPonencia, 'my-event', $data);
?>
