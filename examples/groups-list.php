<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Activiti\Client\Service\GroupService;
use Activiti\Client\Model\Group\GroupQuery;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit',
    ],
]);

$service = new GroupService($client);

$query = new GroupQuery();
$query->size = 10;

do {
    $groups = $service->getGroupList($query);
    foreach ($groups->data as $i => $group) {
        printf("%s (%s)\n", $group->name, $group->type);
    }

    $query->start += $query->size;
} while ($groups->total > $query->start);
