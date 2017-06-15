<?php

require_once __DIR__.'/../vendor/autoload.php';

use Activiti\Client\GuzzleGateway;
use Activiti\Client\Service\ProcessDefinitionService;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit'
    ]
]);

$service = new ProcessDefinitionService(new GuzzleGateway($client));

dump($service->getResourceData($argv[1]));
