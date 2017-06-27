<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Activiti\Client\Service\ManagementService;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit'
    ]
]);

$managment = new ManagementService($client);
dump($managment->getEngine());
dump($managment->getProperties());
