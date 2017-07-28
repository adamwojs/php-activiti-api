<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Activiti\Client\Model\ModelFactory;
use Activiti\Client\Service\ManagementService;
use Activiti\Client\Service\ObjectSerializer;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit',
    ],
]);

$managment = new ManagementService($client, new ModelFactory(), new ObjectSerializer());
dump($managment->getEngine());
dump($managment->getProperties());
