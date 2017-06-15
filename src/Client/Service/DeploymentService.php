<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Deployment\DeploymentQuery;
use GuzzleHttp\Command\Guzzle\Description;

class DeploymentService extends AbstractService implements DeploymentServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getDeploymentList(DeploymentQuery $query = null)
    {
        return $this->gateway->execute('repository/deployment-list', (array) $query);
    }

    /**
     * @inheritdoc
     */
    public function getDeployment($deploymentId)
    {
        return $this->gateway->execute('repository/deployment-get', [
            'deploymentId' => $deploymentId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function createDeployment($deployment)
    {
        return $this->gateway->execute('repository/deployment-create', [
            'deployment' => fopen($deployment, 'rb')
        ]);
    }

    /**
     * @inheritdoc
     */
    public function delete($deploymentId)
    {
        return $this->gateway->execute('repository/deployment-delete', [
            'deploymentId' => $deploymentId
        ]);
    }
}
