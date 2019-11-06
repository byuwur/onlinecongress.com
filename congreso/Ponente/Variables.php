<?php 
session_start();
$IdPonente = $_SESSION['IdPonente'];
$Tipo = $_SESSION['Tipo'] ;
if ($Tipo==2) {
	$Sql=$conex->query("SELECT NombresA,Genero FROM asistente WHERE DocumentoA='$IdPonente'");
	$res=mysqli_fetch_assoc($Sql);
	$Nombres = $res['NombresA'];
	$Genero = $res['Genero'];

	if ($Genero=="Masculino") {
		$Genero="Bienvenido";
	}elseif ($Genero=="Femenino") {
		$Genero="Bienvenida";
	}else{
		$Genero="Hola";
	}
}else{
	$Sql=$conex->query("SELECT IdPonencia, Nombres,Genero FROM ponente WHERE IdPonente='$IdPonente'");
	$res=mysqli_fetch_assoc($Sql);
	$IdPonencia = $res['IdPonencia'];
	$Nombres = $res['Nombres'];
	$Genero = $res['Genero'];

	if ($Genero=="Masculino") {
		$Genero="Bienvenido";
	}elseif ($Genero=="Femenino") {
		$Genero="Bienvenida";
	}else{
		$Genero="Hola";
	}
}
?>