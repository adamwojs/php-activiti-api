<?php

namespace Activiti\Tests\Client\Service;


use Activiti\Client\GuzzleGateway;
use Activiti\Client\Model\Management\Engine;
use Activiti\Client\Model\Management\EngineProperties;
use Activiti\Client\Service\ManagementService;
use GuzzleHttp\Psr7\Response;

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

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $service = new ManagementService(new GuzzleGateway($client));
        $result = $service->getEngine();

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals('management/engine', (string)$this->getLastRequest()->getUri());
        $this->assertEquals(new Engine($expected), $result);
    }

    public function testGetProperties()
    {
        $expected = [
            'next.dbid' => '101',
            'schema.history' => 'create(5.15)',
            'schema.version' => '5.15',
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $service = new ManagementService(new GuzzleGateway($client));
        $result = $service->getProperties();

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals('management/properties', (string)$this->getLastRequest()->getUri());
        $this->assertEquals(new EngineProperties($expected), $result);
    }
}
