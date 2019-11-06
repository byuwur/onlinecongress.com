<?php
  require __DIR__ . '/vendor/autoload.php';
  include("conexion.php");
 
$Id_Congreso = $_POST['IdCong'];
$Id_Comentario = $_POST['IdComentario'];
$IdPonencia = $_POST['IdPonencia'];

$Consulta = $conex->query("DELETE FROM comentarios WHERE IdComentario='$Id_Comentario' AND Id_Congreso='$Id_Congreso'"); 

$ConsultaComentarios = $conex->query("SELECT IdPonencia FROM comentarios WHERE IdPonencia='$IdPonencia' AND Id_Congreso='Id_Congreso'");
if (mysqli_num_rows($ConsultaComentarios)==0) {
  $Res = array('Bandera' => '0');
  echo json_encode($Res);
}else{
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
  $data['Bandera'] = $Bandera;
  $pusher->trigger($IdPonencia, 'my-event', $data);
}
?>

