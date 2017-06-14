<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Management\Engine;
use GuzzleHttp\Command\Guzzle\Description;

class ManagementService extends AbstractService implements ManagementServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getEngine()
    {
        return $this->client->getEngine();
    }

    /**
     * @inheritdoc
     */
    public function getProperties()
    {
        return $this->client->getProperties();
    }

    /**
     * @inheritdoc
     */
    protected function getServiceDescription()
    {
        return new Description([
            'baseUri' => 'management/',
            'operations' => [
                'getEngine' => [
                    'httpMethod' => 'GET',
                    'responseModel' => Engine::class,
                    'uri' => 'engine'
                ],
                'getProperties' => [
                    'httpMethod' => 'GET',
                    'uri' => 'properties',
                    'responseModel' => 'PropertiesResponse',
                ]
            ],
            'models' => [
                Engine::class => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ],
                'PropertiesResponse' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ]
            ]
        ]);
    }
}
