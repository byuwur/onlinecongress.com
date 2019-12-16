<?php 
include("conexion.php");

$IdPonencia = $_POST['IdPonencia'];

$Consulta = $conex->query("SELECT IdComentario, IdUsuario, Comentario, Fecha FROM Comentarios WHERE IdPonencia='$IdPonencia' ORDER BY Fecha DESC, IdComentario DESC");	
$con=1;
$Result = array();
if (mysqli_num_rows($Consulta)>0) {
	while($Comen=mysqli_fetch_array($Consulta)){
		$Validador=0;
		$ID=$Comen[IdUsuario];
		$ConsultaPonente=$conex->query("SELECT Nombres, Apellidos FROM Ponente WHERE IdPonente='$ID'");
		if (mysqli_num_rows($ConsultaPonente)>0) {
			$R = mysqli_fetch_assoc($ConsultaPonente);
			$Nombres = $R[Nombres];
			$Apellidos = $R[Apellidos];
			$Validador=1;
		}
		if ($Validador==0) {
			$ConsultaAutor=$conex->query("SELECT NombresA, ApellidosA FROM Autores WHERE IdAutor='$ID'");
			if (mysqli_num_rows($ConsultaAutor)>0) {
				$R2 = mysqli_fetch_assoc($ConsultaAutor);
				$Nombres = $R2[NombresA];
				$Apellidos = $R2[ApellidosA];
				$Validador=1;
			}
		}/*
		if ($Validador==0) {
			$ConsultaAutor=$conex->query("SELECT NombresA, ApellidosA FROM Autores WHERE IdAutor='$Comen['IdUsuario']'");
			if (mysqli_num_rows($ConsultaAutor)>0) {
				$R = mysqli_fetch_assoc($ConsultaAutor);
				$Nombres = $R['Nombres'];
				$Apellidos = $R['Apellidos'];
				$Validador=1;
			}
		}*/
	    $Result[$con] = array('IdUsuario'=>$ID,'IdComentario' => $Comen['IdComentario'], 'Nombres' => $Nombres, 'Apellidos' => $Apellidos,'Comentario' => $Comen['Comentario'], 'Fecha' => $Comen['Fecha']);
		$con=$con+1;
	}
	echo json_encode($Result);
}
?>

