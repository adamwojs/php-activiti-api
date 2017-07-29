<?php

namespace Activiti\Tests\Client\Service;

use Activiti\Client\ObjectSerializerInterface;
use Activiti\Client\ModelFactoryInterface;
use Activiti\Client\Model\BinaryVariable;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceCreate;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceQuery;
use Activiti\Client\Model\VariableCreate;
use Activiti\Client\Model\VariableUpdate;
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
            'url' => 'http://localhost:8182/runtime/process-instances/' . $processInstanceId,
            'businessKey' => 'myBusinessKey',
            'suspended' => false,
            'processDefinitionUrl' => 'http://localhost:8182/repository/process-definitions/processOne%3A1%3A4',
            'activityId' => 'processTask',
            'tenantId' => null,
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessInstanceService($client)
            ->getProcessInstance($processInstanceId);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId);
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
                    'tenantId' => null,
                ],
            ],
            'total' => 2,
            'start' => 0,
            'sort' => 'id',
            'order' => 'asc',
            'size' => 2,
        ];

        $query = new ProcessInstanceQuery();

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessInstanceService($client)
            ->getProcessInstanceList($query);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('runtime/process-instances');
    }

    public function testDeleteProcessInstance()
    {
        $processInstanceId = 7;

        $client = $this->createClient(new Response(204));
        $actual = $this
            ->createProcessInstanceService($client)
            ->deleteProcessInstance($processInstanceId);

        $this->assertRequestMethod('DELETE');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId);
        $this->assertNull($actual);
    }

    public function testActivate()
    {
        $processInstanceId = 7;

        $expected = [
            'id' => $processInstanceId,
            'url' => 'http://localhost:8182/runtime/process-instances/' . $processInstanceId,
            'businessKey' => 'myBusinessKey',
            'suspended' => false,
            'processDefinitionUrl' => 'http://localhost:8182/repository/process-definitions/processOne%3A1%3A4',
            'activityId' => 'processTask',
            'tenantId' => null,
        ];

        $payload = [
            'action' => 'activate',
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessInstanceService($client)
            ->activate($processInstanceId);

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId);
        $this->assertRequestJsonPayload($payload);
    }

    public function testSuspend()
    {
        $processInstanceId = 7;

        $expected = [
            'id' => $processInstanceId,
            'url' => 'http://localhost:8182/runtime/process-instances/' . $processInstanceId,
            'businessKey' => 'myBusinessKey',
            'suspended' => false,
            'processDefinitionUrl' => 'http://localhost:8182/repository/process-definitions/processOne%3A1%3A4',
            'activityId' => 'processTask',
            'tenantId' => null,
        ];

        $payload = [
            'action' => 'suspend',
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessInstanceService($client)
            ->suspend($processInstanceId);

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId);
        $this->assertRequestJsonPayload($payload);
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
            'tenantId' => null,
        ];

        $payload = [
            'processDefinitionId' => 'oneTaskProcess:1:158',
            'businessKey' => 'myBusinessKey',
            'variables' => [
                [
                    'name' => 'myVar',
                    'type' => 'string',
                    'value' => 'This is a variable',
                ],
            ],
            'processDefinitionKey' => null,
            'message' => null,
            'tenantId' => null,
        ];

        $data = new ProcessInstanceCreate();
        $data->setProcessDefinitionId('oneTaskProcess:1:158');
        $data->setBusinessKey('myBusinessKey');
        $data->setVariables([
            new VariableCreate('myVar', 'string', 'This is a variable')
        ]);
        $data->setProcessDefinitionKey(null);
        $data->setMessage(null);
        $data->setTenantId(null);

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessInstanceService($client, $this->createObjectSerializerMock($data, $payload))
            ->start($data);

        $this->assertRequestMethod('POST');
        $this->assertRequestUri('runtime/process-instances');
        $this->assertRequestJsonPayload($payload);
    }

    public function testGetDiagram()
    {
        $processInstanceId = 7;

        $expected = '(Some binary data)';

        $client = $this->createClient(new Response(200, [], $expected));
        $actual = $this
            ->createProcessInstanceService($client)
            ->getDiagram($processInstanceId);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId . '/diagram');
        $this->assertEquals($expected, $actual);
    }

    public function testGetIdentityLinks()
    {
        $processInstanceId = 7;

        $expected = [
            [
                'url' => 'http://localhost:8182/runtime/process-instances/' . $processInstanceId . '/identitylinks/users/john/customType',
                'user' => 'john',
                'group' => null,
                'type' => 'customType',
            ],
            [
                'url' => 'http://localhost:8182/runtime/process-instances/' . $processInstanceId . '/identitylinks/users/paul/candidate',
                'user' => 'paul',
                'group' => null,
                'type' => 'candidate',
            ],
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessInstanceService($client)
            ->getIdentityLinks($processInstanceId);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId . '/identitylinks');
    }

    public function testAddIdentityLink()
    {
        $processInstanceId = 5;

        $expected = [
            'url' => 'http://localhost:8182/runtime/process-instances/5/identitylinks/users/john/customType',
            'user' => 'john',
            'group' => null,
            'type' => 'customType',
        ];

        $payload = [
            'userId' => 'john',
            'type' => 'customType',
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 201));
        $actual = $this
            ->createProcessInstanceService($client)
            ->addIdentityLink($processInstanceId, 'john', 'customType');

        $this->assertRequestMethod('POST');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId . '/identitylinks');
        $this->assertRequestJsonPayload($payload);
    }

    public function testRemoveIdentityLink()
    {
        $processInstanceId = 7;
        $userId = 'john';
        $type = 'customType';

        $client = $this->createClient(new Response(204));
        $actual = $this
            ->createProcessInstanceService($client)
            ->removeIdentityLink($processInstanceId, $userId, $type);

        $this->assertRequestMethod('DELETE');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId . '/identitylinks/users/' . $userId . '/' . $type);
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
                'value' => null,
                'valueUrl' => 'http://localhost:8182/runtime/process-instances/' . $processInstanceId . '/variables/byteArrayProcVar/data',
                'scope' => 'local',
            ],
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessInstanceService($client)
            ->getVariables($processInstanceId);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId . '/variables');
    }

    public function testGetVariable()
    {
        $processInstanceId = 5;
        $variableName = 'intProcVar';

        $expected = [
            'name' => $variableName,
            'type' => 'integer',
            'value' => 123,
            'scope' => 'local',
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessInstanceService($client)
            ->getVariable($processInstanceId, $variableName);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId . '/variables/' . $variableName);
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
                'value' => 123,
            ],
        ];

        $data = [
            new VariableCreate('intProcVar', 'integer', 123)
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 201));
        $actual = $this
            ->createProcessInstanceService($client, $this->createObjectSerializerMock($data, $payload))
            ->createVariables($processInstanceId, $data);

        $this->assertRequestMethod('POST');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId . '/variables');
        $this->assertRequestJsonPayload($payload);
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
            'value' => 123,
        ];

        $data = new VariableUpdate('intProcVar', 'integer', 123);

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessInstanceService($client, $this->createObjectSerializerMock($data, $payload))
            ->updateVariable($processInstanceId, $variableName, $data);

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId . '/variables/' . $variableName);
        $this->assertRequestJsonPayload($payload);
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
                'value' => 666,
            ],
        ];

        $data = [
            new VariableUpdate('intProcVar', 'integer', 666)
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 201));
        $actual = $this
            ->createProcessInstanceService($client, $this->createObjectSerializerMock($data, $payload))
            ->updateVariables($processInstanceId, $data);

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId . '/variables');
        $this->assertRequestJsonPayload($payload);
    }

    public function testCreateBinaryVariable()
    {
        $processInstanceId = 123;
        $variableName = 'binaryVariable';

        $expected = [
            'name' => $variableName,
            'scope' => 'local',
            'type' => 'binary',
            'value' => null,
            'valueUrl' => 'http://localhost:8182/runtime/process-instances/' . $processInstanceId . '/variables/' . $variableName . '/data',
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 201));
        $actual = $this
            ->createProcessInstanceService($client)
            ->createBinaryVariable($processInstanceId, new BinaryVariable([
                'name' => $variableName,
                'type' => 'binary',
                'file' => stream_for('...'),
            ]));

        $this->assertRequestMethod('POST');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId . '/variables');
        $this->assertRequestContentType('multipart/form-data');
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
            'valueUrl' => 'http://localhost:8182/runtime/process-instances/' . $processInstanceId . '/variables/' . $variableName . '/data',
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createProcessInstanceService($client)
            ->updateBinaryVariable($processInstanceId, new BinaryVariable([
                'name' => $variableName,
                'type' => 'binary',
                'file' => stream_for('...'),
            ]));

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('runtime/process-instances/' . $processInstanceId . '/variables');
        $this->assertRequestContentType('multipart/form-data');
    }

    private function createProcessInstanceService(ClientInterface $client, ObjectSerializerInterface $objectSerializer = null)
    {
        $modelFactory = $this->createMock(ModelFactoryInterface::class);
        if ($objectSerializer === null) {
            $objectSerializer = $this->createMock(ObjectSerializerInterface::class);
        }

        return new ProcessInstanceService($client, $modelFactory, $objectSerializer);
    }
}
