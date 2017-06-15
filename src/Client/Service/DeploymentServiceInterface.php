<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Deployment\DeploymentQuery;

interface DeploymentServiceInterface
{
    public function getDeploymentList(DeploymentQuery $query = null);

    public function getDeployment($deploymentId);

    public function createDeployment($deployment);

    public function delete($deploymentId);
}
