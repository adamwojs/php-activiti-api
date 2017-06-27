<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\IdentityLinkList;
use Activiti\Client\Model\ProcessInstance\BinaryVariable;
use Activiti\Client\Model\ProcessInstance\ProcessInstance;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceCreate;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceQuery;
use Activiti\Client\Model\ProcessInstance\Variable;
use Activiti\Client\Model\ProcessInstance\VariableUpdate;
use Activiti\Client\Model\Repository\IdentityLink;
use Activiti\Client\Model\VariableList;
use GuzzleHttp\ClientInterface;
use function GuzzleHttp\uri_template;

class ProcessInstanceService extends AbstractService implements ProcessInstanceServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getProcessInstance($processInstanceId)
    {
        return $this->call(function (ClientInterface $client) use ($processInstanceId) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}', [
                'processInstanceId' => $processInstanceId
            ]);

            return $client->request('GET', $uri);
        }, ProcessInstance::class);
    }

    /**
     * @inheritdoc
     */
    public function getProcessInstanceList(ProcessInstanceQuery $query)
    {
        return $this->call(function (ClientInterface $client) use ($query) {
            return $client->request('GET', 'runtime/process-instances', [
                'query' => (array)$query
            ]);
        }, ProcessInstance::class);
    }

    /**
     * @inheritdoc
     */
    public function deleteProcessInstance($processInstanceId)
    {
        $this->call(function (ClientInterface $client) use ($processInstanceId) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}', [
                'processInstanceId' => $processInstanceId
            ]);

            return $client->request('DELETE', $uri);
        });
    }

    /**
     * @inheritdoc
     */
    public function activate($processInstanceId)
    {
        return $this->call(function (ClientInterface $client) use ($processInstanceId) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}', [
                'processInstanceId' => $processInstanceId
            ]);

            return $client->request('PUT', $uri, [
                'json' => [
                    'action' => 'activate'
                ]
            ]);
        }, ProcessInstance::class);
    }

    /**
     * @inheritdoc
     */
    public function suspend($processInstanceId)
    {
        return $this->call(function (ClientInterface $client) use ($processInstanceId) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}', [
                'processInstanceId' => $processInstanceId
            ]);

            return $client->request('PUT', $uri, [
                'json' => [
                    'action' => 'suspend'
                ]
            ]);
        }, ProcessInstance::class);
    }

    /**
     * @inheritdoc
     */
    public function start(ProcessInstanceCreate $data)
    {
        return $this->call(function (ClientInterface $client) use ($data) {
            return $client->request('POST', 'runtime/process-instances', [
                'json' => (array)$data
            ]);
        }, ProcessInstance::class);
    }

    /**
     * @inheritdoc
     */
    public function getDiagram($processInstanceId)
    {
        return $this->call(function (ClientInterface $client) use ($processInstanceId) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}/diagram', [
                'processInstanceId' => $processInstanceId
            ]);

            return $client->request('GET', $uri);
        });
    }

    /**
     * @inheritdoc
     */
    public function getIdentityLinks($processInstanceId)
    {
        return $this->call(function (ClientInterface $client) use ($processInstanceId) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}/identitylinks', [
                'processInstanceId' => $processInstanceId
            ]);

            return $client->request('GET', $uri);
        }, IdentityLinkList::class);
    }

    /**
     * @inheritdoc
     */
    public function addIdentityLink($processInstanceId, $userId, $type)
    {
        return $this->call(function (ClientInterface $client) use ($processInstanceId, $userId, $type) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}/identitylinks', [
                'processInstanceId' => $processInstanceId
            ]);

            return $client->request('POST', $uri, [
                'json' => [
                    'userId' => $userId,
                    'type' => $type
                ]
            ]);
        }, IdentityLink::class);
    }

    /**
     * @inheritdoc
     */
    public function removeIdentityLink($processInstanceId, $userId, $type)
    {
        $this->call(function (ClientInterface $client) use ($processInstanceId, $userId, $type) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}/identitylinks/users/{userId}/{type}', [
                'processInstanceId' => $processInstanceId,
                'userId' => $userId,
                'type' => $type
            ]);

            return $client->request('DELETE', $uri);
        });
    }

    /**
     * @inheritdoc
     */
    public function getVariables($processInstanceId)
    {
        return $this->call(function (ClientInterface $client) use ($processInstanceId) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}/variables', [
                'processInstanceId' => $processInstanceId
            ]);

            return $client->request('GET', $uri);
        }, VariableList::class);
    }

    /**
     * @inheritdoc
     */
    public function getVariable($processInstanceId, $variableName)
    {
        return $this->call(function (ClientInterface $client) use ($processInstanceId, $variableName) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}/variables/{variableName}', [
                'processInstanceId' => $processInstanceId,
                'variableName' => $variableName
            ]);

            return $client->request('GET', $uri);
        }, Variable::class);
    }

    /**
     * @inheritdoc
     */
    public function createVariables($processInstanceId, array $variables)
    {
        return $this->call(function (ClientInterface $client) use ($processInstanceId, $variables) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}/variables', [
                'processInstanceId' => $processInstanceId
            ]);

            return $client->request('POST', $uri, [
                'json' => $variables
            ]);
        }, VariableList::class);
    }

    /**
     * @inheritdoc
     */
    public function updateVariables($processInstanceId, array $variables)
    {
        return $this->call(function (ClientInterface $client) use ($processInstanceId, $variables) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}/variables', [
                'processInstanceId' => $processInstanceId
            ]);

            return $client->request('PUT', $uri, [
                'json' => $variables
            ]);
        }, VariableList::class);
    }

    /**
     * @inheritdoc
     */
    public function updateVariable($processInstanceId, $variableName, VariableUpdate $data)
    {
        return $this->call(function (ClientInterface $client) use ($processInstanceId, $variableName, $data) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}/variables/{variableName}', [
                'processInstanceId' => $processInstanceId,
                'variableName' => $variableName
            ]);

            return $client->request('PUT', $uri, [
                'json' => (array)$data
            ]);
        }, Variable::class);
    }

    /**
     * @inheritdoc
     */
    public function createBinaryVariable($processInstanceId, BinaryVariable $binaryVariable)
    {
        return $this->call(function (ClientInterface $client) use ($processInstanceId, $binaryVariable) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}/variables', [
                'processInstanceId' => $processInstanceId
            ]);

            return $client->request('POST', $uri, [
                'multipart' => [
                    [
                        'name' => 'variable',
                        'contents' => http_request_body_encode([
                            'name' => $binaryVariable->name,
                            'type' => $binaryVariable->type
                        ], [])
                    ],
                    [
                        'name' => 'contents',
                        'contents' => $binaryVariable->file
                    ]
                ]
            ]);
        }, Variable::class);
    }

    /**
     * @inheritdoc
     */
    public function updateBinaryVariable($processInstanceId, BinaryVariable $binaryVariable)
    {
        return $this->call(function (ClientInterface $client) use ($processInstanceId, $binaryVariable) {
            $uri = uri_template('runtime/process-instances/{processInstanceId}/variables', [
                'processInstanceId' => $processInstanceId
            ]);

            return $client->request('PUT', $uri, [
                'multipart' => [
                    [
                        'name' => 'variable',
                        'contents' => http_request_body_encode([
                            'name' => $binaryVariable->name,
                            'type' => $binaryVariable->type
                        ], [])
                    ],
                    [
                        'name' => 'contents',
                        'contents' => $binaryVariable->file
                    ]
                ]
            ]);
        }, Variable::class);
    }
}
