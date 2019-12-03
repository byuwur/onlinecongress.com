<?php
  require __DIR__ . '/vendor/autoload.php';
  include("conexion.php");

 
$Id_Comentario = $_POST['IdComentario'];
$IdPonencia = $_POST['IdPonencia'];

$Consulta = $conex->query("DELETE FROM Comentarios WHERE IdComentario='$Id_Comentario'");	

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
  $pusher->trigger($IdPonencia, 'my-event', $data);
?>

