<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Activiti\Client\Model\Repository\ProcessDefinitionQuery;
use Activiti\Client\Service\ProcessDefinitionService;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit'
    ]
]);

$service = new ProcessDefinitionService($client);

dump($service->getProcessDefinitionList(new ProcessDefinitionQuery()));
