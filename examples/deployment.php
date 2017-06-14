<?php

require_once __DIR__.'/../vendor/autoload.php';

use Activiti\Client\Model\Deployment\Criteria;
use Activiti\Client\Service\DeploymentService;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit'
    ]
]);

$deployment = new DeploymentService($client);
var_dump($deployment->create($argv[1]));
