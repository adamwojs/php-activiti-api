<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Activiti\Client\ModelFactory;
use Activiti\Client\ObjectSerializer;
use Activiti\Client\ServiceFactory;
use Activiti\Client\Model\ProcessDefinition\ProcessDefinitionQuery;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit',
    ],
]);

$serviceFactory = new ServiceFactory($client, new ModelFactory(), new ObjectSerializer());
$service = $serviceFactory->createProcessDefinitionService();

var_dump($service->getProcessDefinitionList(new ProcessDefinitionQuery()));
