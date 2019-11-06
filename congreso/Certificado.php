<?php 
require 'fpdf/fpdf.php';
include("conexion.php");

$Documento = $_GET['Doc'];
$Tipo = $_GET['T'];
date_default_timezone_set('America/Bogota');
$Año=date("Y");

$FechaHoy=date("Y-m-d");
$A = substr($FechaHoy, 0, 4); 
$M = substr($FechaHoy, 5, 2); 
$D = substr($FechaHoy, 8, 2); 

$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$Fecha=date($D)." días del mes de ".$meses[date($M)-1]. " del ".date($A);

$Bandera=0;
if ($Tipo==2) {
	$Sql1=$conex->query("SELECT TipoDocumentoA,DocumentoA,NombresA,ApellidosA FROM Asistente WHERE DocumentoA='$Documento' AND Tipo='$Tipo' AND AñoA='$Año'");
	
	$D=mysqli_fetch_assoc($Sql1);
	$TipoDocumento = $D['TipoDocumentoA'];
	$IdUsuario = $D['DocumentoA'];
	$Nombres = $D['NombresA'];
	$Apellidos = $D['ApellidosA'];
	
	$TipoUsuario="ASISTENTE";
}else{
	if ($Tipo==0) {
		$TipoUsuario="PONENTE";
	}else{
		$TipoUsuario="CONFERENCISTA";
	}
	$Sql1=$conex->query("SELECT TipoDocumento,IdPonente,Nombres,Apellidos FROM Ponente WHERE IdPonente='$Documento' AND Tipo='$Tipo' AND Año='$Año'");
	if (mysqli_num_rows($Sql1)>0 ) {
	$Bandera=1;
}
	$D=mysqli_fetch_assoc($Sql1);
	$TipoDocumento = $D['TipoDocumento'];
	$IdUsuario = $D['IdPonente'];
	$Nombres = $D['Nombres'];
	$Apellidos = $D['Apellidos'];
	
}
$Sql2=$conex->query("SELECT IdUsuario FROM Comentarios WHERE IdUsuario='$Documento' AND TipoU='$Tipo'");
if (mysqli_num_rows($Sql2)>0 ) {
	$Bandera=1;
}
if ($Bandera==1) {

$pdf= new fpdf('P','mm','A4'); 
$pdf->AddPage();
$pdf->Image('Pdf/Certificado.png',0,0,210,295);
$pdf->Ln(75);
$pdf->Setfont('Arial', '', 12);
$pdf->MultiCell(190, 6, utf8_decode('El Instituto Tolimense de Formación Técnica Profesional ITFIP El Espinal Tolima, Colombia, La Universidad Tecnológica Nacional Facultad Regional La Rioja UTN La Rioja Argentina. Y la Escuela Normal de Naucalpan de México.'), 0,'C',0);
$pdf->Ln(7);
$pdf->Setfont('Arial', 'B', 18);
$pdf->MultiCell(190, 6,utf8_decode('CERTIFICAN QUE'), 0, 'C', 0);
$pdf->MultiCell(190, 6,utf8_decode($Nombres.' '.$Apellidos), 0, 'C', 0);
$pdf->Ln(7);
$pdf->Setfont('Arial', '', 12);
$pdf->MultiCell(190, 6,utf8_decode('Participó en el II Congreso Virtual Argentino e Iberoamericano de Tecnología y Educación. Llevado a cabo los días 27 al 31 de Mayo de 2019.  En calidad de:'), 0,'C', 0);
$pdf->Ln(7);
$pdf->Setfont('Arial', 'B', 20);
$pdf->MultiCell(190, 6,utf8_decode($TipoUsuario), 0, 'C', 0);
$pdf->Ln(7);
$pdf->Setfont('Arial', '', 12);
$pdf->MultiCell(190, 6,utf8_decode('Por lo que se le confiere el presente Certificado Digital en: Argentina, Colombia y México. A los '.$Fecha), 0, 'C', 0);

$pdf->Ln(26);
$pdf->Setfont('Arial', 'B', 12);
$pdf->Image('Pdf/FirmaITFIP.png',24,180,70);
$pdf->Image('Pdf/FirmaUTN.png',120,170,60);
$pdf->Ln();
$pdf->Setfont('Arial', '', 12);
$pdf->Cell(95, 6,utf8_decode('Instituto Tolimense de Formación'), 0, 0,'C', 0);
$pdf->Cell(95, 6,utf8_decode('Universidad Tecnológica Nacional'), 0, 0,'C', 0);

$pdf->Ln();
$pdf->Setfont('Arial', '', 12);
$pdf->Cell(95, 6,utf8_decode('Técnica Profesional ITFIP'), 0, 0,'C', 0);
$pdf->Cell(95, 6,utf8_decode('Facultad Regional La Rioja'), 0, 0,'C', 0);

$pdf->Ln(33);
$pdf->Image('Pdf/FirmaNAU.png',70,215,55);
$pdf->Setfont('Arial', 'B', 12);
$pdf->MultiCell(185, 6,utf8_decode('Mtro. Héctor Alejandro Lozada Calvillo'), 0, 'C', 0);
$pdf->Setfont('Arial', '', 12);
$pdf->MultiCell(185, 6,utf8_decode('Director de la Escuela Normal de Naucalpan '), 0, 'C', 0);

$modo="I"; 
$nombre_archivo="Certificado.pdf"; 
$pdf->Output($nombre_archivo,$modo); 
}
?>