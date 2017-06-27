<?php

namespace Activiti\Tests\Client\Service;

use Activiti\Client\Exception\ActivitiException;
use Activiti\Client\Model\Task\Task;
use Activiti\Client\Model\Task\TaskUpdate;
use Activiti\Client\Service\TaskService;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;

class TaskServiceTest extends AbstractServiceTest
{
    public function testGetTask()
    {
        $taskId = 123456;

        $expected = [
            'assignee' => 'kermit',
            'createTime' => '2013-04-17T10:17:43.902+0000',
            'delegationState' => 'pending',
            'description' => 'Task description',
            'dueDate' => '2013-04-17T10:17:43.902+0000',
            'execution' => 'http://localhost:8182/runtime/executions/5',
            'id' => '8',
            'name' => 'My task',
            'owner' => 'owner',
            'parentTask' => 'http://localhost:8182/runtime/tasks/9',
            'priority' => 50,
            'processDefinition' => 'http://localhost:8182/repository/process-definitions/oneTaskProcess%3A1%3A4',
            'processInstance' => 'http://localhost:8182/runtime/process-instances/5',
            'suspended' => false,
            'taskDefinitionKey' => 'theTask',
            'url' => 'http://localhost:8182/runtime/tasks/8',
            'tenantId' => null,
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createTaskService($client)
            ->getTask($taskId);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('runtime/tasks/' . $taskId);
        $this->assertEquals(new Task($expected), $actual);
    }

    public function testGetTaskOnNonExistingTaskId()
    {
        $this->expectException(ActivitiException::class);

        $taskId = 123456;

        $client = $this->createClient($this->createActivitiErrorResponse(
            404, "Could not find a task with id '$taskId'."
        ));

        $this
            ->createTaskService($client)
            ->getTask($taskId);
    }

    public function testGetTaskList()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function testGetTaskListWithInvalidQuery()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function testUpdateTask()
    {
        $taskId = 123456;

        $payload = [
            'assignee' => 'assignee',
            'delegationState' => 'resolved',
            'description' => 'New task description',
            'dueDate' => '2013-04-17T13:06:02.438+02:00',
            'name' => 'New task name',
            'owner' => 'owner',
            'parentTaskId' => '3',
            'priority' => 20,
        ];

        $expected = [
            // TODO: Expected value
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createTaskService($client)
            ->updateTask($taskId, new TaskUpdate($payload));

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('runtime/tasks/' . $taskId);
        $this->assertRequestJsonPayload($payload);
        $this->assertEquals(new Task($expected), $actual);
    }

    /**
     * @dataProvider getUpdateFailureResponses
     */
    public function testUpdateFailure($response)
    {
        $this->expectException(ActivitiException::class);

        $this
            ->createTaskService($this->createClient($response))
            ->getTask(1);
    }

    public function testComplete()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function testCompleteFailure()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function testClaim()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function testClaimFailure()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function testClaimWithNonExistingTaskId()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function testClaimConflict()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function testDelegate()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function testDelegateFailure()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function testResolve()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function testResolveFailure()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function testDeleteTask()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function testDeleteTaskWithNonExistingTaskId()
    {
        $this->fail("Missing implementation " . __METHOD__);
    }

    public function getUpdateFailureResponses()
    {
        return [
            [
                'response' => $this->createActivitiErrorResponse(404)
            ],
            [
                'response' => $this->createActivitiErrorResponse(409)
            ]
        ];
    }

    public function getActionFailureResponses()
    {
        return [
            [
                'response' => $this->createActivitiErrorResponse(400)
            ],
            [
                'response' => $this->createActivitiErrorResponse(404)
            ],
            [
                'response' => $this->createActivitiErrorResponse(409)
            ]
        ];
    }

    private function createTaskService(ClientInterface $client)
    {
        return new TaskService($client);
    }
}