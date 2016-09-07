<?php

use Pekkis\Koulutus\Services\Mailer;
use Zend\Soap\Server;
use Zend\Soap\AutoDiscover;

require_once __DIR__ . '/vendor/autoload.php';

$mailer = new Mailer();

if (isset($_GET['wsdl'])) {
    $autodiscover = new AutoDiscover();
    $autodiscover
        ->setClass(Mailer::class)
        ->setUri('http://soap.tunk.io')
        ->setServiceName('PekkiSpammer');

    $wsdl = $autodiscover->generate();

    $xml = $wsdl->toXML();

    echo $xml;
}


$server = new Server(
    'http://soap.tunk.io?wsdl',
    [

    ]
);
$server->setObject($mailer);
$server->handle();

