<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Activiti\Client\Model\ModelFactory;
use Activiti\Client\Model\ProcessDefinition\ProcessDefinitionUpdate;
use Activiti\Client\Service\ObjectSerializer;
use Activiti\Client\Service\ServiceFactory;
use GuzzleHttp\Client;

$id = $argv[1];
$category = $argv[2];

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit',
    ],
]);

$serviceFactory = new ServiceFactory($client, new ModelFactory(), new ObjectSerializer());
$service = $serviceFactory->createProcessDefinitionService();

dump($service->update($id, new ProcessDefinitionUpdate([
    'category' => $category,
])));
