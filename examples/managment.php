<?php

require_once __DIR__.'/../vendor/autoload.php';

use Activiti\Client\ManagementService;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit'
    ]
]);

$managment = new ManagementService($client);
var_dump($managment->getEngine());
var_dump($managment->getProperties());
