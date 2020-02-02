<?php 
include("conexion.php");

$Id_Congreso = $_POST['Id_Congreso'];
$IdPonencia = $_POST['IdPonencia'];
$TipoU = $_POST['TipoU'];

$Consulta = $conex->query("SELECT IdComentario, IdUsuario, Comentario, TipoU, Fecha FROM comentarios WHERE IdPonencia='$IdPonencia' AND Id_Congreso='$Id_Congreso' ORDER BY Fecha DESC, IdComentario DESC");
 date_default_timezone_set('America/Bogota'); 
  $Año=date("Y");	
$con=1;
$Result = array();
if (mysqli_num_rows($Consulta)>0) {
	while($Comen=mysqli_fetch_array($Consulta)){
		$ID=$Comen[IdUsuario];
		$TU=$Comen[TipoU];
		if ($TU==2) {
			$ConsultaAsistente=$conex->query("SELECT asistente.NombresA, asistente.ApellidosA FROM asistente, registro_asistencia WHERE asistente.DocumentoA='$ID' AND registro_asistencia.Id_Congreso='$Id_Congreso' AND asistente.DocumentoA=registro_asistencia.Id_Asistente AND registro_asistencia.Anno='$Año'");
			if (mysqli_num_rows($ConsultaAsistente)>0) {
				$R = mysqli_fetch_assoc($ConsultaAsistente);
				$Nombres = $R[NombresA];
				$Apellidos = $R[ApellidosA];
			}
		}else{
			$ConsultaPonente=$conex->query("SELECT Nombres, Apellidos FROM ponente WHERE IdPonente='$ID' AND Id_Congreso='$Id_Congreso'");
			if (mysqli_num_rows($ConsultaPonente)>0) {
				$R = mysqli_fetch_assoc($ConsultaPonente);
				$Nombres = $R[Nombres];
				$Apellidos = $R[Apellidos];
			}
		}
	    $Result[$con] = array('IdUsuario'=>$ID,'IdComentario' => $Comen['IdComentario'], 'Nombres' => $Nombres, 'Apellidos' => $Apellidos,'Comentario' => $Comen['Comentario'], 'Fecha' => $Comen['Fecha']);
		$con=$con+1;
	}
	echo json_encode($Result);
}
?>

