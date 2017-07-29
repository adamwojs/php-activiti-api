<?php

namespace Activiti\Tests\Client;

use Activiti\Client\ModelFactoryInterface;
use Activiti\Client\ObjectSerializerInterface;
use Activiti\Client\ServiceFactory;
use Activiti\Client\Service\DeploymentServiceInterface;
use Activiti\Client\Service\GroupServiceInterface;
use Activiti\Client\Service\ManagementServiceInterface;
use Activiti\Client\Service\ProcessDefinitionServiceInterface;
use Activiti\Client\Service\ProcessInstanceServiceInterface;
use Activiti\Client\Service\TaskServiceInterface;
use Activiti\Client\Service\UserServiceInterface;
use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;

class ServiceFactoryTest extends TestCase
{
    public function testCreateDeploymentService()
    {
        $actual = $this
            ->createServiceFactory()
            ->createDeploymentService();

        $this->assertInstanceOf(DeploymentServiceInterface::class, $actual);
    }

    public function testCreateGroupService()
    {
        $actual = $this
            ->createServiceFactory()
            ->createGroupService();

        $this->assertInstanceOf(GroupServiceInterface::class, $actual);
    }

    public function testCreateManagementService()
    {
        $actual = $this
            ->createServiceFactory()
            ->createManagementService();

        $this->assertInstanceOf(ManagementServiceInterface::class, $actual);
    }

    public function testCreateProcessDefinitionService()
    {
        $actual = $this
            ->createServiceFactory()
            ->createProcessDefinitionService();

        $this->assertInstanceOf(ProcessDefinitionServiceInterface::class, $actual);
    }

    public function testCreateProcessInstanceService()
    {
        $actual = $this
            ->createServiceFactory()
            ->createProcessInstanceService();

        $this->assertInstanceOf(ProcessInstanceServiceInterface::class, $actual);
    }

    public function testCreateTaskService()
    {
        $actual = $this
            ->createServiceFactory()
            ->createTaskService();

        $this->assertInstanceOf(TaskServiceInterface::class, $actual);
    }

    public function testCreateUserService()
    {
        $actual = $this
            ->createServiceFactory()
            ->createUserService();

        $this->assertInstanceOf(UserServiceInterface::class, $actual);
    }

    private function createServiceFactory()
    {
        return new ServiceFactory(
            $this->createMock(ClientInterface::class),
            $this->createMock(ModelFactoryInterface::class),
            $this->createMock(ObjectSerializerInterface::class)
        );
    }
}
