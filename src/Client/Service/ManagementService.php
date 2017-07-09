<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Management\Engine;
use Activiti\Client\Model\Management\EngineProperties;
use GuzzleHttp\ClientInterface;

class ManagementService extends AbstractService implements ManagementServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getEngine()
    {
        return $this->call(function (ClientInterface $client) {
            return $client->request('GET', 'management/engine');
        }, Engine::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getProperties()
    {
        return $this->call(function (ClientInterface $client) {
            return $client->request('GET', 'management/properties');
        }, EngineProperties::class);
    }
}
