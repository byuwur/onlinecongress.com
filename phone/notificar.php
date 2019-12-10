<?php

include_once 'conectar_bd.php';

$hoy = date("Y-m-d");
$tiempo = date("Y-m-d H:i:s");
//echo "Fecha: $hoy<br>";

$querycongresos = $conex -> query(" SELECT DISTINCT * FROM congreso ");
while ($querycongresosarray = mysqli_fetch_assoc($querycongresos)) {
    $queryponente = $conex -> query(" SELECT DISTINCT * FROM ponente WHERE Id_Congreso = '$querycongresosarray[Id_Congreso]' ");
    while ($queryponentearray = mysqli_fetch_assoc($queryponente)) {
        $querydatosponencia = $conex -> query(" SELECT DISTINCT * FROM ponencia WHERE IdPonencia = '$queryponentearray[IdPonencia]' ");
        $querydatosponenciaarray = mysqli_fetch_assoc($querydatosponencia);
        
        $queryprogponencia = $conex -> query(" SELECT DISTINCT * FROM programacion WHERE IdPonencia = '$queryponentearray[IdPonencia]' ");
        $queryprogponenciaarray = mysqli_fetch_assoc($queryprogponencia);
        
        echo "<br>Ponencia: ".$queryponentearray['IdPonencia']." ($querycongresosarray[Nombre])";

        if ($queryprogponenciaarray['Fecha'] == $hoy) {
            $fields = array(
                //'registration_ids' => $tokens, //tokens
                //"condition" => "'dogs' in topics || 'cats' in topics",
                "to" => "/topics/$querycongresosarray[Id_Congreso]",
                "notification" => array(
                    "title" => "$querycongresosarray[Nombre] ($querycongresosarray[Año])",
                    "body" => "$querydatosponenciaarray[Titulo] está disponible. ¡Ingresa ahora!"
                )
            );
            cURLnotif($fields);
            
            $conex -> query(" INSERT INTO `notificaciones` (`IdCongreso`, `FechaNotificacion`, `Notificacion`) VALUES ('$querycongresosarray[Id_Congreso]', '$tiempo', '$querydatosponenciaarray[Titulo] está disponible.'); ");
        }
    }
}

function cURLnotif ($campos) {
    $url = "https://fcm.googleapis.com/fcm/send";
    $head = array('Content-Type: application/json',
        'Authorization:key=AAAAP0LRjNw:APA91bFEmyazfM-zdlZGkHvmhoENIrC87Mq0sKCss2-ooHkiIWMZxrmejEzVpYTEyHWqpp0zLzO4f_-YzEStts8QT4BhDO4WrH7MUEjSMo7cDpqxg-FWjRT2BmPusGXs6LlZCFOREjp5'
    );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($campos));
    $result = curl_exec($ch);
    if ($result == FALSE)
        die('Curl failed: ' . curl_error($ch));
    //else echo "Curl success: " . $result;
    curl_close($ch);
}
?>