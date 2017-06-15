<?php

require_once __DIR__.'/../vendor/autoload.php';

use Activiti\Client\GuzzleGateway;
use Activiti\Client\Model\Repository\ProcessDefinitionUpdate;
use Activiti\Client\Service\ProcessDefinitionService;
use GuzzleHttp\Client;

$id = $argv[1];
$category = $argv[2];

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit'
    ]
]);

$service = new ProcessDefinitionService(new GuzzleGateway($client));

dump($service->update($id, new ProcessDefinitionUpdate([
    'category' => $category
])));
