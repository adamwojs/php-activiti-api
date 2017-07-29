<?php

namespace Activiti\Tests\Client\Service;

use Activiti\Client\ModelFactoryInterface;
use Activiti\Client\Model\ProcessDefinition\ProcessDefinitionQuery;
use Activiti\Client\Model\ProcessDefinition\ProcessDefinitionUpdate;
use Activiti\Client\ObjectSerializerInterface;
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

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessDefinitionService($client)
            ->getProcessDefinitionList(new ProcessDefinitionQuery([
            ]));

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('repository/process-definitions');
    }

    public function testGetProcessDefinition()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expected = [
            'id' => $processDefinitionId,
            'url' => 'http://localhost:8182/repository/process-definitions/' . urlencode($processDefinitionId),
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

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessDefinitionService($client)
            ->getProcessDefinition($processDefinitionId);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('repository/process-definitions/' . urlencode($processDefinitionId));
    }

    public function testUpdate()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expected = [
            'id' => $processDefinitionId,
            'url' => 'http://localhost:8182/repository/process-definitions/' . urlencode($processDefinitionId),
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

        $data = new ProcessDefinitionUpdate();
        $data->setCategory('Examples (changed)');

        $payload = [
            'category' => 'Examples (changed)',
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessDefinitionService($client, $this->createObjectSerializerMock($data, $payload))
            ->update($processDefinitionId, $data);

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('repository/process-definitions/' . urlencode($processDefinitionId));
        $this->assertRequestJsonPayload($payload);
    }

    public function testGetResourceData()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expected = '(Some binary data)';

        $client = $this->createClient(new Response(200, [], $expected));
        $actual = $this
            ->createProcessDefinitionService($client)
            ->getResourceData($processDefinitionId);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('repository/process-definitions/' . urlencode($processDefinitionId) . '/resourcedata');
        $this->assertEquals($expected, $actual);
    }

    public function testSuspend()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expected = [
            'id' => $processDefinitionId,
            'url' => 'http://localhost:8182/repository/process-definitions/' . urlencode($processDefinitionId),
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

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessDefinitionService($client)
            ->suspend($processDefinitionId, false, new \DateTime('2013-04-15T00:42:12Z'));

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('repository/process-definitions/' . urlencode($processDefinitionId));
        $this->assertRequestJsonPayload($payload);
    }

    public function testActivate()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expected = [
            'id' => $processDefinitionId,
            'url' => 'http://localhost:8182/repository/process-definitions/' . urlencode($processDefinitionId),
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

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessDefinitionService($client)
            ->activate($processDefinitionId, false, new \DateTime('2013-04-15T00:42:12Z'));

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('repository/process-definitions/' . urlencode($processDefinitionId));
        $this->assertRequestJsonPayload($payload);
    }

    public function testGetCandidateStarters()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';

        $expected = [
            [
                'url' => 'http://localhost:8182/repository/process-definitions/' . urlencode($processDefinitionId) . '/identitylinks/groups/admin',
                'user' => null,
                'group' => 'admin',
                'type' => 'candidate',
            ],
            [
                'url' => 'http://localhost:8182/repository/process-definitions/' . urlencode($processDefinitionId) . '/identitylinks/users/kermit',
                'user' => 'kermit',
                'group' => null,
                'type' => 'candidate',
            ],
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessDefinitionService($client)
            ->getCandidateStarters($processDefinitionId);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('repository/process-definitions/' . urlencode($processDefinitionId) . '/identitylinks');
    }

    public function testAddUserCandidateStarter()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';
        $userId = 'kermit';

        $expected = [
            'url' => 'http://localhost:8182/repository/process-definitions/' . urlencode($processDefinitionId) . '/identitylinks/users/kermit',
            'user' => 'kermit',
            'group' => null,
            'type' => 'candidate',
        ];

        $payload = [
            'userId' => $userId,
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 201));
        $actual = $this
            ->createProcessDefinitionService($client)
            ->addUserCandidateStarter($processDefinitionId, $userId);

        $this->assertRequestMethod('POST');
        $this->assertRequestUri('repository/process-definitions/' . urlencode($processDefinitionId) . '/identitylinks');
        $this->assertRequestJsonPayload($payload);
    }

    public function testAddGroupCandidateStarter()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';
        $groupId = 'sales';

        $expected = [
            'url' => 'http://localhost:8182/repository/process-definitions/' . urlencode($processDefinitionId) . '/identitylinks/groups/sales',
            'user' => null,
            'group' => 'sales',
            'type' => 'candidate',
        ];

        $payload = [
            'groupId' => $groupId,
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 201));
        $actual = $this
            ->createProcessDefinitionService($client)
            ->addGroupCandidateStarter($processDefinitionId, $groupId);

        $this->assertRequestMethod('POST');
        $this->assertRequestUri('repository/process-definitions/' . urlencode($processDefinitionId) . '/identitylinks');
        $this->assertRequestJsonPayload($payload);
    }

    public function testDeleteCandidateStarter()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';
        $family = 'users';
        $identityId = 'kermit';

        $expectedUri = 'repository/process-definitions/'
            . urlencode($processDefinitionId)
            . '/identitylinks/'
            . $family
            . '/'
            . $identityId;

        $client = $this->createClient(new Response(204));
        $actual = $this
            ->createProcessDefinitionService($client)
            ->deleteCandidateStarter($processDefinitionId, $family, $identityId);

        $this->assertRequestMethod('DELETE');
        $this->assertRequestUri($expectedUri);
        $this->assertNull($actual);
    }

    public function testGetCandidateStarter()
    {
        $processDefinitionId = 'oneTaskProcess:1:4';
        $family = 'users';
        $identityId = 'kermit';

        $expectedUri = 'repository/process-definitions/'
            . urlencode($processDefinitionId)
            . '/identitylinks/'
            . $family
            . '/'
            . $identityId;

        $expected = [
            'url' => 'http://localhost:8182/' . $expectedUri,
            'user' => $identityId,
            'group' => null,
            'type' => 'candidate',
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessDefinitionService($client)
            ->getCandidateStarter($processDefinitionId, $family, $identityId);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri($expectedUri);
    }

    private function createProcessDefinitionService(ClientInterface $client, ObjectSerializerInterface $objectSerializer = null)
    {
        $modelFactory = $this->createMock(ModelFactoryInterface::class);
        if ($objectSerializer === null) {
            $objectSerializer = $this->createMock(ObjectSerializerInterface::class);
        }

        return new ProcessDefinitionService($client, $modelFactory, $objectSerializer);
    }
}
