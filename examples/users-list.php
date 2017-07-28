<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Activiti\Client\Model\ModelFactory;
use Activiti\Client\Model\User\UserQuery;
use Activiti\Client\Service\ObjectSerializer;
use Activiti\Client\Service\ServiceFactory;
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost:8080/activiti-rest/service/',
    'auth' => [
        'kermit', 'kermit',
    ],
]);

$serviceFactory = new ServiceFactory($client, new ModelFactory(), new ObjectSerializer());
$service = $serviceFactory->createUserService();

$query = new UserQuery();
$query->setSize(10);

do {
    $users = $service->getUsersList($query);

    foreach ($users as $i => $user) {
        vprintf("%d. %s %s (%s) <%s>\n", [
            $query->getStart() + $i + 1,
            $user->getFirstName(),
            $user->getLastName(),
            $user->getId(),
            $user->getEmail(),
        ]);
    }

    $query->setStart($query->getStart() + $query->getSize());
} while ($users->getTotal() > $query->getStart());
