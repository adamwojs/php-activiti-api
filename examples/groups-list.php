<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Activiti\Client\Model\Group\GroupQuery;
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
$service = $serviceFactory->createGroupService();

$query = new GroupQuery();
$query->setSize(10);

do {
    $groups = $service->getGroupList($query);
    foreach ($groups as $i => $group) {
        printf("%s (%s)\n", $group->getName(), $group->getType());
    }

    $query->setStart($query->getStart() + 10);
} while ($groups->total > $query->getStart());
