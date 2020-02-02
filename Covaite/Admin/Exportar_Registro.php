<?php 
require '../fpdf/fpdf.php';
include("conexion.php");
include("Variables.php");
$Cantidad = $_GET['C'];
$Tipo = $_GET['T'];
date_default_timezone_set('America/Bogota'); 
$FechaHoy=date("Y-m-d");
$Año=date("Y");
if ($Tipo==1) {
	$Participante="CONFERENCISTAS";
	$TipoE = "Conferencia";
}else{
	$Participante="PONENTES";
	$TipoE = "Ponencia";
}
$sql=$conex->query("SELECT ponente.Nombres, ponente.Apellidos, ponente.Email, ponencia.Titulo, ponente.Pais FROM ponente, ponencia WHERE ponente.Tipo='$Tipo' AND ponencia.Tipo='$Tipo' AND ponencia.IdPonencia=ponente.IdPonencia AND ponencia.Titulo!='' AND ponente.Año='$Año' AND ponente.Id_Congreso='$Id_Congreso'");

$pdf= new fpdf('P','mm','A4'); 
$pdf->AddPage();
$pdf->Image('../Img_Web/Logo.png',45,10,110);
$pdf->Ln(45);
$pdf->Cell(75, 55,'', 0, 0,'C');
$pdf->Setfont('Arial', 'B', 14);
$pdf->Cell(30, 6, $Participante, 0, 'C');
$pdf->Setfont('Arial', '', 12);
$pdf->Ln(8);
$pdf->Setfont('Arial', 'B', 12);
$pdf->MultiCell(190, 6,utf8_decode("Cantidad Total: ".$Cantidad), 0,'R');
while ($Resultado=mysqli_fetch_assoc($sql)) {
	$sql2 = $conex->query("SELECT name_pais FROM paises WHERE id=$Resultado[Pais]");
	$Pais=mysqli_fetch_assoc($sql2);
	$pdf->Ln();
	$pdf->Setfont('Arial', 'B', 12);
	$pdf->MultiCell(190, 6,utf8_decode("Nombre Completo"), 0,'L');
	$pdf->Setfont('Arial', '', 12);
	$pdf->MultiCell(190, 6,utf8_decode($Resultado[Nombres]." ".$Resultado[Apellidos]), 0,'L');
	$pdf->Setfont('Arial', 'B', 12);
	$pdf->MultiCell(190, 6,utf8_decode("Email"), 0,'L');
	$pdf->Setfont('Arial', '', 12);
	$pdf->MultiCell(190, 6,utf8_decode($Resultado[Email]), 0,'L');
	$pdf->Setfont('Arial', 'B', 12);
	$pdf->MultiCell(190, 6,utf8_decode("País"), 0,'L');
	$pdf->Setfont('Arial', '', 12);
	$pdf->MultiCell(190, 6,utf8_decode($Pais[name_pais]), 0,'L');
	$pdf->Setfont('Arial', 'B', 12);
	$pdf->MultiCell(190, 6,utf8_decode("Nombre ".$TipoE), 0,'L');
	$pdf->Setfont('Arial', '', 12);
	$pdf->MultiCell(190, 6,utf8_decode($Resultado[Titulo]), 0,'L');
	$pdf->Cell(190, 6,'________________________________________________________________________________', 0, 0,'L', 0);
}
$pdf->Output();

?>