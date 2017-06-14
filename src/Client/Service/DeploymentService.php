<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Deployment\Criteria;
use GuzzleHttp\Command\Guzzle\Description;

class DeploymentService extends AbstractService implements DeploymentServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getList(Criteria $criteria = null)
    {
        return $this->client->getList((array) $criteria);
    }

    /**
     * @inheritdoc
     */
    public function get($deploymentId)
    {
        return $this->client->getDetails([
            'deploymentId' => $deploymentId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function create($deployment)
    {
        if (!file_exists($deployment)) {
            throw new \InvalidArgumentException("Deployment file $deployment not exists!");
        }

        $file = fopen($deployment, 'rb');
        try {
            return $this->client->create([
                'deployment' => $file
            ]);
        }
        catch(\Exception $e) {
            fclose($file);
        }
    }

    /**
     * @inheritdoc
     */
    public function delete($deploymentId)
    {
        return $this->client->delete([
            'deploymentId' => $deploymentId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getResources($deploymentId)
    {
        return $this->client->getResourceList([
            'deploymentId' => $deploymentId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getResource($deploymentId, $resourceId)
    {
    }

    /**
     * @inheritdoc
     */
    public function getResourceContent($deploymentId, $resourceId)
    {

    }

    /**
     * @inheritdoc
     */
    protected function getServiceDescription()
    {
        return new Description([
            'baseUri' => 'repository/deployments/',
            'operations' => [
                'getList' => [
                    'httpMethod' => 'GET',
                    'responseModel' => 'DeploymentList',
                    'parameters' => [
                        'name' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => false
                        ],
                        'nameLike' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => false
                        ],
                        'category' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => false
                        ],
                        'categoryNotEquals' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => false
                        ],
                        'tenantId' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => false
                        ],
                        'tenantIdLike' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => false
                        ],
                        'withoutTenantId' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => false
                        ],
                        'sort' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => false
                        ]
                    ]
                ],
                'getDetails' => [
                    'httpMethod' => 'GET',
                    'responseModel' => 'Deployment',
                    'uri' => '{deploymentId}',
                    'parameters' => [
                        'deploymentId' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true
                        ]
                    ]
                ],
                'create' => [
                    'httpMethod' => 'POST',
                    'responseModel' => 'Deployment',
                    'parameters' => [
                        'deployment' => [
                            'location' => 'multipart'
                        ]
                    ]
                ],
                'delete' => [
                    'httpMethod' => 'DELETE',
                    'uri' => '{deploymentId}',
                    'parameters' => [
                        'deploymentId' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true
                        ]
                    ]
                ],
                'getResourceList' => [
                    'httpMethod' => 'GET',
                    'responseModel' => 'ResourceList',
                    'uri' => '{deploymentId}/resources',
                    'parameters' => [
                        'deploymentId' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true
                        ]
                    ]
                ],
                'getResource' => [
                    'httpMethod' => 'GET',
                    'responseModel' => 'Resource',
                    'uri' => '{deploymentId}/resources/{resourceId}',
                    'parameters' => [
                        'deploymentId' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true
                        ],
                        'resourceId' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true
                        ]
                    ]
                ],
                'getResourceContent' => [
                    'httpMethod' => 'GET',
                    // TODO:
                    //'responseModel' => 'Resource',
                    'uri' => '{deploymentId}/resourcedata/{resourceId}',
                    'parameters' => [
                        'deploymentId' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true
                        ],
                        'resourceId' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true
                        ]
                    ]
                ]
            ],
            'models' => [
                'Deployment' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ],
                'DeploymentList' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ],
                'Resource' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ],
                'ResourceList' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ],
            ]
        ]);
    }
}
