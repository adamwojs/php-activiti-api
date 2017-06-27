<?php

namespace Activiti\Tests\Client\Service;

use Activiti\Client\Model\BinaryVariable;
use Activiti\Client\Model\IdentityLink;
use Activiti\Client\Model\IdentityLinkList;
use Activiti\Client\Model\ProcessInstance\ProcessInstance;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceCreate;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceList;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceQuery;
use Activiti\Client\Model\ProcessInstance\VariableCreate;
use Activiti\Client\Model\ProcessInstance\VariableUpdate;
use Activiti\Client\Model\Variable;
use Activiti\Client\Model\VariableList;
use Activiti\Client\Service\ProcessInstanceService;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;

class ProcessInstanceServiceTest extends AbstractServiceTest
{
    public function testGetProcessInstance()
    {
        $processInstanceId = 7;

        $expected = [
            'id' => $processInstanceId,
            'url' => 'http://localhost:8182/runtime/process-instances/7',
            'businessKey' => 'myBusinessKey',
            'suspended' => false,
            'processDefinitionUrl' => 'http://localhost:8182/repository/process-definitions/processOne%3A1%3A4',
            'activityId' => 'processTask',
            'tenantId' => NULL,
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->getProcessInstance($processInstanceId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId", (string)$this->getLastRequest()->getUri());
        $this->assertEquals(new ProcessInstance($expected), $actual);
    }

    public function testGetProcessInstanceList()
    {
        $expected = [
            'data' => [
                [
                    'id' => '7',
                    'url' => 'http://localhost:8182/runtime/process-instances/7',
                    'businessKey' => 'myBusinessKey',
                    'suspended' => false,
                    'processDefinitionUrl' => 'http://localhost:8182/repository/process-definitions/processOne%3A1%3A4',
                    'activityId' => 'processTask',
                    'tenantId' => NULL,
                ],
            ],
            'total' => 2,
            'start' => 0,
            'sort' => 'id',
            'order' => 'asc',
            'size' => 2,
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->getProcessInstanceList(new ProcessInstanceQuery([

            ]));

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances", (string)$this->getLastRequest()->getUri());
        $this->assertEquals(new ProcessInstanceList($expected), $actual);
    }

    public function testDeleteProcessInstance()
    {
        $processInstanceId = 7;

        $client = $this->createClient([new Response(204)]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->deleteProcessInstance($processInstanceId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('DELETE', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId", (string)$this->getLastRequest()->getUri());
        $this->assertNull($actual);
    }

    public function testActivate()
    {
        $processInstanceId = 7;

        $expected = [
            'id' => $processInstanceId,
            'url' => 'http://localhost:8182/runtime/process-instances/7',
            'businessKey' => 'myBusinessKey',
            'suspended' => false,
            'processDefinitionUrl' => 'http://localhost:8182/repository/process-definitions/processOne%3A1%3A4',
            'activityId' => 'processTask',
            'tenantId' => NULL,
        ];

        $payload = [
            'action' => 'activate'
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->activate($processInstanceId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('PUT', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId", (string)$this->getLastRequest()->getUri());
        $this->assertJsonStringEqualsJsonString(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new ProcessInstance($expected), $actual);
    }

    public function testSuspend()
    {
        $processInstanceId = 7;

        $expected = [
            'id' => $processInstanceId,
            'url' => 'http://localhost:8182/runtime/process-instances/7',
            'businessKey' => 'myBusinessKey',
            'suspended' => false,
            'processDefinitionUrl' => 'http://localhost:8182/repository/process-definitions/processOne%3A1%3A4',
            'activityId' => 'processTask',
            'tenantId' => NULL,
        ];

        $payload = [
            'action' => 'suspend'
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->suspend($processInstanceId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('PUT', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId", (string)$this->getLastRequest()->getUri());
        $this->assertJsonStringEqualsJsonString(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new ProcessInstance($expected), $actual);
    }

    public function testStart()
    {
        $expected = [
            'id' => 7,
            'url' => 'http://localhost:8182/runtime/process-instances/7',
            'businessKey' => 'myBusinessKey',
            'suspended' => false,
            'processDefinitionUrl' => 'http://localhost:8182/repository/process-definitions/processOne%3A1%3A4',
            'activityId' => 'processTask',
            'tenantId' => NULL,
        ];

        $payload = [
            'processDefinitionId' => 'oneTaskProcess:1:158',
            'businessKey' => 'myBusinessKey',
            'variables' => [
                [
                    'name' => 'myVar',
                    'value' => 'This is a variable',
                ],
            ],
            'processDefinitionKey' => null,
            'message' => null,
            'tenantId' => null
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->start(new ProcessInstanceCreate($payload));

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('POST', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances", (string)$this->getLastRequest()->getUri());
        $this->assertJsonStringEqualsJsonString(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new ProcessInstance($expected), $actual);
    }

    public function testGetDiagram()
    {
        $processInstanceId = 7;

        $expected = '(Some binary data)';

        $client = $this->createClient([
            new Response(200, [], $expected)
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->getDiagram($processInstanceId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId/diagram", (string)$this->getLastRequest()->getUri());
        $this->assertEquals($expected, $actual);
    }

    public function testGetIdentityLinks()
    {
        $processInstanceId = 7;

        $expected = [
            [
                'url' => 'http://localhost:8182/runtime/process-instances/5/identitylinks/users/john/customType',
                'user' => 'john',
                'group' => null,
                'type' => 'customType',
            ],
            [
                'url' => 'http://localhost:8182/runtime/process-instances/5/identitylinks/users/paul/candidate',
                'user' => 'paul',
                'group' => null,
                'type' => 'candidate',
            ],
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->getIdentityLinks($processInstanceId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId/identitylinks", (string)$this->getLastRequest()->getUri());
        $this->assertEquals(new IdentityLinkList($expected), $actual);
    }

    public function testAddIdentityLink()
    {
        $processInstanceId = 5;

        $expected = [
            'url' => 'http://localhost:8182/runtime/process-instances/5/identitylinks/users/john/customType',
            'user' => 'john',
            'group' => NULL,
            'type' => 'customType',
        ];

        $payload = [
            'userId' => 'john',
            'type' => 'customType',
        ];

        $client = $this->createClient([
            new Response(201, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->addIdentityLink($processInstanceId, 'john', 'customType');

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('POST', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId/identitylinks", (string)$this->getLastRequest()->getUri());
        $this->assertJsonStringEqualsJsonString(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new IdentityLink($expected), $actual);
    }

    public function testRemoveIdentityLink()
    {
        $processInstanceId = 7;

        $client = $this->createClient([new Response(204)]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->removeIdentityLink($processInstanceId, 'john', 'customType');

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('DELETE', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId/identitylinks/users/john/customType", (string)$this->getLastRequest()->getUri());
        $this->assertNull($actual);
    }

    public function testGetVariables()
    {
        $processInstanceId = 5;

        $expected = [
            [
                'name' => 'intProcVar',
                'type' => 'integer',
                'value' => 123,
                'scope' => 'local',
            ],
            [
                'name' => 'byteArrayProcVar',
                'type' => 'binary',
                'value' => NULL,
                'valueUrl' => 'http://localhost:8182/runtime/process-instances/5/variables/byteArrayProcVar/data',
                'scope' => 'local',
            ],
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->getVariables($processInstanceId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId/variables", (string)$this->getLastRequest()->getUri());
        $this->assertEquals(new VariableList($expected), $actual);
    }

    public function testGetVariable()
    {
        $processInstanceId = 5;
        $variableName = "intProcVar";

        $expected = [
            'name' => $variableName,
            'type' => 'integer',
            'value' => 123,
            'scope' => 'local',
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->getVariable($processInstanceId, $variableName);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId/variables/$variableName", (string)$this->getLastRequest()->getUri());
        $this->assertEquals(new Variable($expected), $actual);
    }

    public function testCreateVariables()
    {
        $processInstanceId = 5;

        $expected = [
            [
                'name' => 'intProcVar',
                'type' => 'integer',
                'value' => 123,
                'scope' => 'local',
            ],
        ];

        $payload = [
            [
                'name' => 'intProcVar',
                'type' => 'integer',
                'value' => 123
            ],
        ];

        $client = $this->createClient([
            new Response(201, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->createVariables($processInstanceId, [
                new VariableCreate([
                    'name' => 'intProcVar',
                    'type' => 'integer',
                    'value' => 123,
                ])
            ]);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('POST', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId/variables", (string)$this->getLastRequest()->getUri());
        $this->assertJsonStringEqualsJsonString(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new VariableList($expected), $actual);
    }

    public function testUpdateVariable()
    {
        $processInstanceId = 5;
        $variableName = 'intProcVar';

        $expected = [
            'name' => $variableName,
            'type' => 'integer',
            'value' => 123,
            'scope' => 'local',
        ];

        $payload = [
            'name' => $variableName,
            'type' => 'integer',
            'value' => 123
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->updateVariable($processInstanceId, $variableName, new VariableUpdate($payload));

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('PUT', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId/variables/$variableName", (string)$this->getLastRequest()->getUri());
        $this->assertJsonStringEqualsJsonString(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new Variable($expected), $actual);
    }

    public function testUpdateVariables()
    {
        $processInstanceId = 5;

        $expected = [
            [
                'name' => 'intProcVar',
                'type' => 'integer',
                'value' => 666,
                'scope' => 'local',
            ],
        ];

        $payload = [
            [
                'name' => 'intProcVar',
                'type' => 'integer',
                'value' => 666
            ],
        ];

        $client = $this->createClient([
            new Response(201, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->updateVariables($processInstanceId, [
                new VariableUpdate([
                    'name' => 'intProcVar',
                    'type' => 'integer',
                    'value' => 666,
                ])
            ]);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('PUT', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId/variables", (string)$this->getLastRequest()->getUri());
        $this->assertJsonStringEqualsJsonString(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new VariableList($expected), $actual);
    }

    public function testCreateBinaryVariable()
    {
        $processInstanceId = 123;

        $expected = [
            'name' => 'binaryVariable',
            'scope' => 'local',
            'type' => 'binary',
            'value' => null,
            'valueUrl' => 'http://localhost:8182/runtime/process-instances/123/variables/binaryVariable/data',
        ];

        $client = $this->createClient([
            new Response(201, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->createBinaryVariable($processInstanceId, new BinaryVariable([
                'name' => 'binaryVariable',
                'type' => 'binary',
                'file' => stream_for("...")
            ]));

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('POST', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId/variables", (string)$this->getLastRequest()->getUri());
        $this->assertStringStartsWith("multipart/form-data", $this->getLastRequest()->getHeaderLine('Content-Type'));
        $this->assertEquals(new BinaryVariable($expected), $actual);
    }

    public function testUpdateBinaryVariable()
    {
        $processInstanceId = 123;
        $variableName = 'binaryVariable';

        $expected = [
            'name' => $variableName,
            'scope' => 'local',
            'type' => 'binary',
            'value' => null,
            'valueUrl' => 'http://localhost:8182/runtime/process-instances/123/variables/binaryVariable/data',
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createProcessInstanceService($client)
            ->updateBinaryVariable($processInstanceId, new BinaryVariable([
                'name' => 'binaryVariable',
                'type' => 'binary',
                'file' => stream_for("...")
            ]));

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('PUT', $this->getLastRequest()->getMethod());
        $this->assertEquals("runtime/process-instances/$processInstanceId/variables", (string)$this->getLastRequest()->getUri());
        $this->assertStringStartsWith("multipart/form-data", $this->getLastRequest()->getHeaderLine('Content-Type'));
        $this->assertEquals(new BinaryVariable($expected), $actual);
    }

    private function createProcessInstanceService(ClientInterface $client)
    {
        return new ProcessInstanceService($client);
    }
}