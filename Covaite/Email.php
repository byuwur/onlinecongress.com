<?php 
include('Idc.php');
include("conexion.php");
$Sql1=$conex->query("SELECT congreso.Logo, info_congreso.Subdominio, administrador.Email FROM congreso, info_congreso, administrador WHERE congreso.Id_Congreso='$Idc' AND info_congreso.Id_Congreso='$Idc'");
$Resul=mysqli_fetch_assoc($Sql1);

$Nombres = $_POST['Nombres'];
$Apellidos = $_POST['Apellidos'];
$Remitente = $_POST['Email'];
$Mensaje = $_POST['Comen'];
$Destino = $Resul['Email'];
$Asunto = 'Notificación plataforma';
$Cuerpo = '
			        <html>
			        <head>
			          <title></title>
			        </head>
			        <body>
			          <p style="font-size:28px; color:#333"><strong>Remitente: </strong> '.$Nombres.' '.$Apellidos.'</p>
			          <br>
			          <div>
			            <p>Mensaje</p>
			            <p>'.$Mensaje.'</p>
			            <br>
			            <hr style="width:45%; background:#ccc;" align="left">
			            <br>
			            <table>
			              <tr>
			                <td width="250px">
			                	<a href="'.$Resul[Subdominio].'">
					              <img src="'.$Resul[Logo].'">
					            </a>
			                </td>
			              </tr>
			            </table>
			          </body>
			          </html>
			          ';
			          $Cabecera = "MIME-Version: 1.0\r\n";
			          $Cabecera.="Content-type: text/html; charset=iso-8859-1\r\n";
			          $Cabecera.="From: " . $Remitente;

			          @mail($Destino, $Asunto, $Cuerpo, $Cabecera);

 ?>