<?php

require_once __DIR__.'/../vendor/autoload.php';

use Activiti\Client\GuzzleGateway;
use Activiti\Client\Service\ManagementService;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit'
    ]
]);

$managment = new ManagementService(new GuzzleGateway($client));
dump($managment->getEngine());
dump($managment->getProperties());
