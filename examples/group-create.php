<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Activiti\Client\Model\ModelFactory;
use Activiti\Client\Service\ObjectSerializer;
use Activiti\Client\Service\ServiceFactory;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit',
    ],
]);

$group = (new ServiceFactory($client, new ModelFactory(), new ObjectSerializer()))
    ->createGroupService()
    ->createGroup('Group A', 'Type', 'group-a');

dump($group);
