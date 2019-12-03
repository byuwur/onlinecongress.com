<?php
$url = "https://fcm.googleapis.com/fcm/send";
$fields = array(
    //'registration_ids' => $tokens, //tokens
    //"condition" => "'dogs' in topics || 'cats' in topics",
    "to" => "/topics/123ADV",
    "notification" => array(
        "title" => "Título de prueba",
        "body" => "Mensaje de prueba"
    )
);
$headers = array('Content-Type: application/json',
    'Authorization:key=AAAAP0LRjNw:APA91bFEmyazfM-zdlZGkHvmhoENIrC87Mq0sKCss2-ooHkiIWMZxrmejEzVpYTEyHWqpp0zLzO4f_-YzEStts8QT4BhDO4WrH7MUEjSMo7cDpqxg-FWjRT2BmPusGXs6LlZCFOREjp5'
);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$result = curl_exec($ch);
if ($result == FALSE)
    die('Curl failed: ' . curl_error($ch));
//else echo "Curl success: " . $result;
curl_close($ch);
?>
