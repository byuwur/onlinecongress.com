<?php 
include("conexion.php");

$Id_Comentario = $_POST['IdComentario'];

$Consulta = $conex->query("DELETE FROM Comentarios WHERE IdComentario='$Id_Comentario'");	
echo json_encode($Result);
?>

