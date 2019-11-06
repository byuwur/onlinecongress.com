<?php 
require '../fpdf/fpdf.php';
include("conexion.php");
include("Variables.php");

$Cantidad = $_GET['C'];
date_default_timezone_set('America/Bogota'); 
$FechaHoy=date("Y-m-d");
$Año=date("Y");
$sql=$conex->query("SELECT asistente.NombresA, asistente.ApellidosA, asistente.Email, asistente.Pais FROM asistente, registro_asistencia WHERE asistente.AñoA='$Año' AND asistente.IdAsistente=registro_asistencia.Id_Asistente AND registro_asistencia.Id_Congreso='$Id_Congreso'");

$pdf= new fpdf('P','mm','A4'); 
$pdf->AddPage();
$pdf->Image('../Img_Web/Logo.png',45,10,110);
$pdf->Ln(45);
$pdf->Cell(75, 55,'', 0, 0,'C');
$pdf->Setfont('Arial', 'B', 14);
$pdf->Cell(30, 6, "ASISTENTES", 0, 'C');
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
	$pdf->MultiCell(190, 6,utf8_decode($Resultado[NombresA]." ".$Resultado[ApellidosA]), 0,'L');
	$pdf->Setfont('Arial', 'B', 12);
	$pdf->MultiCell(190, 6,utf8_decode("Email"), 0,'L');
	$pdf->Setfont('Arial', '', 12);
	$pdf->MultiCell(190, 6,utf8_decode($Resultado[Email]), 0,'L');
	$pdf->Setfont('Arial', 'B', 12);
	$pdf->MultiCell(190, 6,utf8_decode("País"), 0,'L');
	$pdf->Setfont('Arial', '', 12);
	$pdf->MultiCell(190, 6,utf8_decode($Pais[name_pais]), 0,'L');
	$pdf->Cell(190, 6,'________________________________________________________________________________', 0, 0,'L', 0);
}
$pdf->Output();

?>