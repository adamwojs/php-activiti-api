<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Activiti\Client\Model\User\UserQuery;
use Activiti\Client\Service\UserService;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit'
    ]
]);

$service = new UserService($client);

$query = new UserQuery();
$query->size = 10;

do {
    $users = $service->getUsersList($query);

    foreach ($users->data as $i => $user) {
        vprintf("%d. %s %s (%s) <%s>\n", [
            $query->start + $i + 1,
            $user->firstName,
            $user->lastName,
            $user->id,
            $user->email
        ]);
    }

    $query->start += $query->size;
} while ($users->total > $query->start);

