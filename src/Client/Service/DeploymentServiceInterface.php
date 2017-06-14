<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Deployment\Criteria;

interface DeploymentServiceInterface
{
    public function getList(Criteria $criteria = null);

    public function get($deploymentId);

    public function create($deployment);

    public function delete($deploymentId);

    public function getResources($deploymentId);

    public function getResource($deploymentId, $resourceId);

    public function getResourceContent($deploymentId, $resourceId);
}
