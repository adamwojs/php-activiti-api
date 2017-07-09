<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Deployment\Deployment;
use Activiti\Client\Model\Deployment\DeploymentList;
use Activiti\Client\Model\Deployment\DeploymentQuery;
use GuzzleHttp\ClientInterface;
use function GuzzleHttp\uri_template;

class DeploymentService extends AbstractService implements DeploymentServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getDeploymentList(DeploymentQuery $query = null)
    {
        return $this->call(function (ClientInterface $client) use ($query) {
            return $client->request('GET', 'repository/deployments', [
                'query' => (array)$query,
            ]);
        }, DeploymentList::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getDeployment($deploymentId)
    {
        return $this->call(function (ClientInterface $client) use ($deploymentId) {
            $uri = uri_template('repository/deployments/{deploymentId}', [
                'deploymentId' => $deploymentId,
            ]);

            return $client->request('GET', $uri);
        }, Deployment::class);
    }

    /**
     * {@inheritdoc}
     */
    public function createDeployment($deployment)
    {
        return $this->call(function (ClientInterface $client) use ($deployment) {
            return $client->request('POST', 'repository/deployments', [
                'multipart' => [
                    [
                        'name' => 'deployment',
                        'contents' => $deployment,
                    ],
                ],
            ]);
        }, Deployment::class);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($deploymentId)
    {
        $this->call(function (ClientInterface $client) use ($deploymentId) {
            $uri = uri_template('repository/deployments/{deploymentId}', [
                'deploymentId' => $deploymentId,
            ]);

            return $client->request('DELETE', $uri);
        });
    }
}
