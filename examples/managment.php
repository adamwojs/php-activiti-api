<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Activiti\Client\ModelFactory;
use Activiti\Client\ObjectSerializer;
use Activiti\Client\ServiceFactory;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit',
    ],
]);

$serviceFactory = new ServiceFactory($client, new ModelFactory(), new ObjectSerializer());
$managment = $serviceFactory->createManagementService();
var_dump($managment->getEngine());
var_dump($managment->getProperties());
