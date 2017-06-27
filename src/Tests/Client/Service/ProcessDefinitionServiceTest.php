<?php

namespace Activiti\Tests\Client\Service;

use Activiti\Client\Model\IdentityLinkList;
use Activiti\Client\Model\Repository\IdentityLink;
use Activiti\Client\Model\Repository\ProcessDefinition;
use Activiti\Client\Model\Repository\ProcessDefinitionList;
use Activiti\Client\Model\Repository\ProcessDefinitionQuery;
use Activiti\Client\Model\Repository\ProcessDefinitionUpdate;
use Activiti\Client\Service\ProcessDefinitionService;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;

class ProcessDefinitionServiceTest extends AbstractServiceTest
{
    public function testGetProcessDefinitionList()
    {
        $expected = [
            'data' => [
                [
                    'id' => 'oneTaskProcess:1:4',
                    'url' => 'http://localhost:8182/repository/process-definitions/oneTaskProcess%3A1%3A4',
                    'version' => 1,
                    'key' => 'oneTaskProcess',
                    'category' => 'Examples',
                    'suspended' => false,
                    'name' => 'The One Task Process',
                    'description' => 'This is a process for testing purposes',
                    'deploymentId' => '2',
                    'deploymentUrl' => 'http://localhost:8081/repository/deployments/2',
                    'graphicalNotationDefined' => true,
                    'resource' => 'http://localhost:8182/repository/deployments/2/resources/testProcess.xml',
                    'diagramResource' => 'http://localhost:8182/repository/deployments/2/resources/testProcess.png',
                    'startFormDefined' => false,
                ],
            ],
            'total' => 1,
            'start' => 0,
            'sort' => 'name',
            'order' => 'asc',
            'size' => 1,

        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessDefinitionService($client)
            ->getProcessDefinitionList(new ProcessDefinitionQuery([

            ]));

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals('repository/process-definitions', (string)$this->getLastRequest()->getUri());
        $this->assertEquals(new ProcessDefinitionList($expected), $actual);
    }

    public function testGetProcessDefinition()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expected = [
            'id' => $processDefinitionId,
            'url' => 'http://localhost:8182/repository/process-definitions/oneTaskProcess%3A1%3A4',
            'version' => 1,
            'key' => 'oneTaskProcess',
            'category' => 'Examples',
            'suspended' => false,
            'name' => 'The One Task Process',
            'description' => 'This is a process for testing purposes',
            'deploymentId' => '2',
            'deploymentUrl' => 'http://localhost:8081/repository/deployments/2',
            'graphicalNotationDefined' => true,
            'resource' => 'http://localhost:8182/repository/deployments/2/resources/testProcess.xml',
            'diagramResource' => 'http://localhost:8182/repository/deployments/2/resources/testProcess.png',
            'startFormDefined' => false,
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessDefinitionService($client)
            ->getProcessDefinition($processDefinitionId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals('repository/process-definitions/' . urlencode($processDefinitionId), (string)$this->getLastRequest()->getUri());
        $this->assertEquals(new ProcessDefinition($expected), $actual);
    }

    public function testUpdate()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expected = [
            'id' => $processDefinitionId,
            'url' => 'http://localhost:8182/repository/process-definitions/oneTaskProcess%3A1%3A4',
            'version' => 1,
            'key' => 'oneTaskProcess',
            'category' => 'Examples (changed)',
            'suspended' => false,
            'name' => 'The One Task Process',
            'description' => 'This is a process for testing purposes',
            'deploymentId' => '2',
            'deploymentUrl' => 'http://localhost:8081/repository/deployments/2',
            'graphicalNotationDefined' => true,
            'resource' => 'http://localhost:8182/repository/deployments/2/resources/testProcess.xml',
            'diagramResource' => 'http://localhost:8182/repository/deployments/2/resources/testProcess.png',
            'startFormDefined' => false,
        ];

        $payload = [
            'category' => 'Examples (changed)'
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessDefinitionService($client)
            ->update($processDefinitionId, new ProcessDefinitionUpdate($payload));

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('PUT', $this->getLastRequest()->getMethod());
        $this->assertEquals('repository/process-definitions/' . urlencode($processDefinitionId), (string)$this->getLastRequest()->getUri());
        $this->assertJsonStringEqualsJsonString(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new ProcessDefinition($expected), $actual);
    }

    public function testGetResourceData()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expected = "Some binary data";

        $client = $this->createClient([
            new Response(200, [], $expected)
        ]);

        $actual = $this
            ->createProcessDefinitionService($client)
            ->getResourceData($processDefinitionId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals('repository/process-definitions/' . urlencode($processDefinitionId) . '/resourcedata', (string)$this->getLastRequest()->getUri());
        $this->assertEquals($expected, $actual);
    }

    public function testSuspend()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expected = [
            'id' => $processDefinitionId,
            'url' => 'http://localhost:8182/repository/process-definitions/oneTaskProcess%3A1%3A4',
            'version' => 1,
            'key' => 'oneTaskProcess',
            'category' => 'Examples',
            'suspended' => true,
            'name' => 'The One Task Process',
            'description' => 'This is a process for testing purposes',
            'deploymentId' => '2',
            'deploymentUrl' => 'http://localhost:8081/repository/deployments/2',
            'graphicalNotationDefined' => true,
            'resource' => 'http://localhost:8182/repository/deployments/2/resources/testProcess.xml',
            'diagramResource' => 'http://localhost:8182/repository/deployments/2/resources/testProcess.png',
            'startFormDefined' => false,
        ];

        $payload = [
            'action' => 'suspend',
            'includeProcessInstances' => false,
            'date' => '2013-04-15T00:42:12Z',
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessDefinitionService($client)
            ->suspend($processDefinitionId, false, new \DateTime("2013-04-15T00:42:12Z"));

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('PUT', $this->getLastRequest()->getMethod());
        $this->assertEquals('repository/process-definitions/' . urlencode($processDefinitionId), (string)$this->getLastRequest()->getUri());
        $this->assertJsonStringEqualsJsonString(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new ProcessDefinition($expected), $actual);
    }

    public function testActivate()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expected = [
            'id' => $processDefinitionId,
            'url' => 'http://localhost:8182/repository/process-definitions/oneTaskProcess%3A1%3A4',
            'version' => 1,
            'key' => 'oneTaskProcess',
            'category' => 'Examples',
            'suspended' => false,
            'name' => 'The One Task Process',
            'description' => 'This is a process for testing purposes',
            'deploymentId' => '2',
            'deploymentUrl' => 'http://localhost:8081/repository/deployments/2',
            'graphicalNotationDefined' => true,
            'resource' => 'http://localhost:8182/repository/deployments/2/resources/testProcess.xml',
            'diagramResource' => 'http://localhost:8182/repository/deployments/2/resources/testProcess.png',
            'startFormDefined' => false,
        ];

        $payload = [
            'action' => 'activate',
            'includeProcessInstances' => false,
            'date' => '2013-04-15T00:42:12Z',
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessDefinitionService($client)
            ->activate($processDefinitionId, false, new \DateTime("2013-04-15T00:42:12Z"));

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('PUT', $this->getLastRequest()->getMethod());
        $this->assertEquals('repository/process-definitions/' . urlencode($processDefinitionId), (string)$this->getLastRequest()->getUri());
        $this->assertJsonStringEqualsJsonString(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new ProcessDefinition($expected), $actual);
    }

    public function testGetCandidateStarters()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expected = [
            [
                'url' => 'http://localhost:8182/repository/process-definitions/oneTaskProcess%3A1%3A4/identitylinks/groups/admin',
                'user' => NULL,
                'group' => 'admin',
                'type' => 'candidate',
            ],
            [
                'url' => 'http://localhost:8182/repository/process-definitions/oneTaskProcess%3A1%3A4/identitylinks/users/kermit',
                'user' => 'kermit',
                'group' => NULL,
                'type' => 'candidate',
            ],
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessDefinitionService($client)
            ->getCandidateStarters($processDefinitionId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals('repository/process-definitions/' . urlencode($processDefinitionId) . '/identitylinks', (string)$this->getLastRequest()->getUri());
        $this->assertEquals(new IdentityLinkList($expected), $actual);
    }

    public function testAddUserCandidateStarter()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';
        $userId = 'kermit';

        $expected = [
            'url' => 'http://localhost:8182/repository/process-definitions/oneTaskProcess%3A1%3A4/identitylinks/users/kermit',
            'user' => 'kermit',
            'group' => null,
            'type' => 'candidate',
        ];

        $payload = [
            'userId' => $userId
        ];

        $client = $this->createClient([
            new Response(201, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessDefinitionService($client)
            ->addUserCandidateStarter($processDefinitionId, $userId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('POST', $this->getLastRequest()->getMethod());
        $this->assertEquals('repository/process-definitions/' . urlencode($processDefinitionId) . '/identitylinks', (string)$this->getLastRequest()->getUri());
        $this->assertJsonStringEqualsJsonString(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new IdentityLink($expected), $actual);
    }

    public function testAddGroupCandidateStarter()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';
        $groupId = 'sales';

        $expected = [
            'url' => 'http://localhost:8182/repository/process-definitions/oneTaskProcess%3A1%3A4/identitylinks/groups/sales',
            'user' => null,
            'group' => 'sales',
            'type' => 'candidate',
        ];

        $payload = [
            'groupId' => $groupId
        ];

        $client = $this->createClient([
            new Response(201, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessDefinitionService($client)
            ->addGroupCandidateStarter($processDefinitionId, $groupId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('POST', $this->getLastRequest()->getMethod());
        $this->assertEquals('repository/process-definitions/' . urlencode($processDefinitionId) . '/identitylinks', (string)$this->getLastRequest()->getUri());
        $this->assertJsonStringEqualsJsonString(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new IdentityLink($expected), $actual);
    }

    public function testDeleteCandidateStarter()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expectedUri = 'repository/process-definitions/'
            . urlencode($processDefinitionId)
            . '/identitylinks/users/kermit';

        $client = $this->createClient([
            new Response(204)
        ]);

        $actual = $this
            ->createProcessDefinitionService($client)
            ->deleteCandidateStarter($processDefinitionId, 'users', 'kermit');

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('DELETE', $this->getLastRequest()->getMethod());
        $this->assertEquals($expectedUri, (string)$this->getLastRequest()->getUri());
        $this->assertNull($actual);
    }

    public function testGetCandidateStarter()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expected = [
            'url' => 'http://localhost:8182/repository/process-definitions/oneTaskProcess%3A1%3A4/identitylinks/users/kermit',
            'user' => 'kermit',
            'group' => NULL,
            'type' => 'candidate',
        ];

        $expectedUri = 'repository/process-definitions/'
            . urlencode($processDefinitionId)
            . '/identitylinks/users/kermit';

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessDefinitionService($client)
            ->getCandidateStarter($processDefinitionId, 'users', 'kermit');

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals($expectedUri, (string)$this->getLastRequest()->getUri());
        $this->assertEquals(new IdentityLink($expected), $actual);
    }

    private function createProcessDefinitionService(ClientInterface $client)
    {
        return new ProcessDefinitionService($client);
    }
}