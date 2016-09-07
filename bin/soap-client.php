<?php

use Zend\Soap\Client;

require_once __DIR__ . '/../vendor/autoload.php';

// Accept response compression
$client = new Client(
    'http://soap.tunk.io?wsdl',
    [

    ]
);

$response = $client->sendMail(
    'pekkisx@gmail.com',
    'gaylord.lohiposki@dr-kobros.com',
    'Tussimees',
    'Imaiseepi tussia'
);

var_dump($response);
