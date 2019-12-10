<?php


require_once("dompdf/dompdf_config.inc.php");


 $file_name = 'google_chart.pdf';
 $html .= $_POST["hidden_html"];
$dompdf=new DOMPDF();
$dompdf->set_paper("A4", "landscape"); 
set_time_limit(0);
$dompdf->load_html(utf8_decode($html));
ini_set("memory_limit","1516M");
$dompdf->render();
$dompdf->stream($file_name);
?>
