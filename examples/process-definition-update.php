<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Activiti\Client\ModelFactory;
use Activiti\Client\Model\ProcessDefinition\ProcessDefinitionUpdate;
use Activiti\Client\ObjectSerializer;
use Activiti\Client\ServiceFactory;
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

$data = new ProcessDefinitionUpdate();
$data->setCategory($category);

var_dump($service->update($id, $data));
