<?php

namespace Activiti\Tests\Client\Service;

use Activiti\Client\Model\Management\Engine;
use Activiti\Client\Model\Management\EngineProperties;
use Activiti\Client\Service\ManagementService;
use GuzzleHttp\ClientInterface;

class ManagementServiceTest extends AbstractServiceTest
{
    public function testGetEngine()
    {
        $expected = [
            'name' => 'default',
            'version' => '5.15',
            'resourceUrl' => 'file://activiti/activiti.cfg.xml',
            'exception' => null
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));

        $result = $this
            ->createManagementService($client)
            ->getEngine();

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('management/engine');
        $this->assertEquals(new Engine($expected), $result);
    }

    public function testGetProperties()
    {
        $expected = [
            'next.dbid' => '101',
            'schema.history' => 'create(5.15)',
            'schema.version' => '5.15',
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));

        $result = $this
            ->createManagementService($client)
            ->getProperties();

        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals('management/properties', (string)$this->getLastRequest()->getUri());
        $this->assertEquals(new EngineProperties($expected), $result);
    }

    private function createManagementService(ClientInterface $client)
    {
        return new ManagementService($client);
    }
}
