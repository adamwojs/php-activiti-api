<?php

namespace Activiti\Client\Service;

interface ServiceFactoryInterface
{
    /**
     * @return DeploymentServiceInterface
     */
    public function createDeploymentService();

    /**
     * @return GroupServiceInterface
     */
    public function createGroupService();

    /**
     * @return ManagementServiceInterface
     */
    public function createManagementService();

    /**
     * @return ProcessDefinitionServiceInterface
     */
    public function createProcessDefinitionService();

    /**
     * @return ProcessInstanceServiceInterface
     */
    public function createProcessInstanceService();

    /**
     * @return TaskServiceInterface
     */
    public function createTaskService();

    /**
     * @return UserServiceInterface
     */
    public function createUserService();
}
