<?php 
$Nombres = $_POST['Nombres'];
$Apellidos = $_POST['Apellidos'];
$Remitente = $_POST['Email'];
$Mensaje = $_POST['Comen'];
$Destino = "comitetecnico@covaite.com";
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
			                	<a href="http://weapp.com.co/Covaite">
					              <img src="http://weapp.com.co/Covaite/Img_Web/Logo.png">
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