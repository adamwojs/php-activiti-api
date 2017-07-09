<?php

namespace Activiti\Client\Service;

use GuzzleHttp\ClientInterface;

class ServiceFactory implements ServiceFactoryInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function createDeploymentService()
    {
        return new DeploymentService($this->client);
    }

    /**
     * {@inheritdoc}
     */
    public function createGroupService()
    {
        return new GroupService($this->client);
    }

    /**
     * {@inheritdoc}
     */
    public function createManagementService()
    {
        return new ManagementService($this->client);
    }

    /**
     * {@inheritdoc}
     */
    public function createProcessDefinitionService()
    {
        return new ProcessDefinitionService($this->client);
    }

    /**
     * {@inheritdoc}
     */
    public function createProcessInstanceService()
    {
        return new ProcessInstanceService($this->client);
    }

    /**
     * {@inheritdoc}
     */
    public function createTaskService()
    {
        return new TaskService($this->client);
    }

    /**
     * {@inheritdoc}
     */
    public function createUserService()
    {
        return new UserService($this->client);
    }
}
