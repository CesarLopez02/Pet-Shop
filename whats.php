<?php

require 'vendor/autoload.php';

$token =  "GA221201133813";

$client = new GuzzleHttp\Client(['verify' => false ]);

$payload = array(

  "op" => "registermessage",

  "token_qr" => $token,

  "mensajes" => array(

	array("numero" => "","mensaje" => "Se a generado una cita"),

	)

);

$res = $client->request('POST', 'https://script.google.com/macros/s/AKfycbyoBhxuklU5D3LTguTcYAS85klwFINHxxd-FroauC4CmFVvS0ua/exec', [

            'headers' => [

                'Content-Type'     => 'application/json',

                'Accept' => 'application/json'

            ], 'json' =>  $payload

        ]);

echo $res->getStatusCode()."<br>";

echo $res->getBody();

?>