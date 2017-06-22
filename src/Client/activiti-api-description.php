<?php

return [
    'operations' => [
        'identity/group-list' => [
            'httpMethod' => 'GET',
            'uri' => 'identity/groups',
            'responseModel' => 'Activiti\Client\Model\Group\GroupList',
            'parameters' => [
                'id' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'name' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'type' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'nameLike' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'member' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'potentialStarter' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'sort' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
            ],
        ],
        'identity/group-get' => [
            'httpMethod' => 'GET',
            'uri' => 'identity/groups/{groupId}',
            'responseModel' => 'Activiti\Client\Model\Group\Group',
            'parameters' => [
                'groupId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
        ],
        'identity/group-create' => [
            'httpMethod' => 'POST',
            'uri' => 'identity/groups',
            'responseModel' => 'Activiti\Client\Model\Group\Group',
            'parameters' => [
                'id' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
                'name' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
                'type' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
            ],
        ],
        'identity/group-update' => [
            'httpMethod' => 'PUT',
            'uri' => 'identity/groups/{groupId}',
            'responseModel' => 'Activiti\Client\Model\Group\Group',
            'parameters' => [
                'groupId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'name' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
                'type' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
            ],
        ],
        'identity/group-delete' => [
            'httpMethod' => 'DELETE',
            'uri' => 'identity/groups/{groupId}',
            'parameters' => [
                'groupId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
        ],
        'identity/group-add-member' => [
            'httpMethod' => 'POST',
            'uri' => 'identity/groups/{groupId}/members',
            'responseModel' => 'Activiti\Client\Model\Group\GroupMember',
            'parameters' => [
                'groupId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'userId' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
            ],
        ],
        'identity/group-del-member' => [
            'httpMethod' => 'DELETE',
            'uri' => 'identity/groups/{groupId}/members/{userId}',
            'parameters' => [
                'groupId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'userId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
        ],
        'identity/user-list' => [
            'httpMethod' => 'GET',
            'uri' => 'identity/users',
            'responseModel' => 'Activiti\Client\Model\User\UserList',
            'parameters' => [
                'id' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => false,
                ],
                'firstName' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => false,
                ],
                'lastName' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => false,
                ],
                'email' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => false,
                ],
                'firstNameLike' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => false,
                ],
                'lastNameLike' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => false,
                ],
                'emailLike' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => false,
                ],
                'memberOfGroup' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => false,
                ],
                'potentialStarter' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => false,
                ],
                'sort' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => false,
                ],
            ],
        ],
        'identity/user-get' => [
            'httpMethod' => 'GET',
            'uri' => 'identity/users/{userId}',
            'responseModel' => 'Activiti\Client\Model\User\User',
            'parameters' => [
                'userId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
        ],
        'identity/user-create' => [
            'httpMethod' => 'POST',
            'uri' => 'identity/users',
            'responseModel' => 'Activiti\Client\Model\User\User',
            'parameters' => [
                'id' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
                'firstName' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
                'lastName' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
                'email' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
                'password' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
            ],
        ],
        'identity/user-update' => [
            'httpMethod' => 'PUT',
            'uri' => 'identity/users/{userId}',
            'responseModel' => 'Activiti\Client\Model\User\User',
            'parameters' => [
                'userId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'firstName' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
                'lastName' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
                'email' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
                'password' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
            ],
        ],
        'identity/user-delete' => [
            'httpMethod' => 'DELETE',
            'uri' => 'identity/users/{userId}',
            'parameters' => [
                'userId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
        ],
        'management/engine' => [
            'httpMethod' => 'GET',
            'responseModel' => 'Activiti\Client\Model\Management\Engine',
            'uri' => 'management/engine',
        ],
        'management/properties' => [
            'httpMethod' => 'GET',
            'uri' => 'management/properties',
            'responseModel' => 'Activiti\Client\Model\Management\EngineProperties',
        ],
        'repository/process-definition-list' => [
            'httpMethod' => 'GET',
            'uri' => 'repository/process-definitions',
            'responseModel' => 'Activiti\Client\Model\Repository\ProcessDefinitionList',
            'parameters' => [
                'version' => [
                    'type' => 'integer',
                    'location' => 'query',
                    'required' => false,
                ],
                'name' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'nameLike' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'key' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'keyLike' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'resourceName' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'resourceNameLike' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'category' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'categoryLike' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'categoryNotEquals' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'deploymentId' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'startableByUser' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'latest' => [
                    'type' => 'boolean',
                    'location' => 'query',
                    'required' => false,
                ],
                'suspended' => [
                    'type' => 'boolean',
                    'location' => 'query',
                    'required' => false,
                ],
                'sort' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
            ],
        ],
        'repository/process-definition-get' => [
            'httpMethod' => 'GET',
            'uri' => 'repository/process-definitions/{processDefinitionId}',
            'responseModel' => 'Activiti\Client\Model\Repository\ProcessDefinition',
            'parameters' => [
                'processDefinitionId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
        ],
        'repository/process-definition-update' => [
            'httpMethod' => 'PUT',
            'uri' => 'repository/process-definitions/{processDefinitionId}',
            'responseModel' => 'Activiti\Client\Model\Repository\ProcessDefinition',
            'parameters' => [
                'processDefinitionId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'category' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
            ],
        ],
        'repository/process-definition-get-resourcedata' => [
            'httpMethod' => 'GET',
            'uri' => 'repository/process-definitions/{processDefinitionId}/resourcedata',
            'responseModel' => 'Activiti\Client\Model\Deployment\ResourceData',
            'parameters' => [
                'processDefinitionId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
        ],
        'repository/process-definition-suspend' => [
            'httpMethod' => 'PUT',
            'uri' => 'repository/process-definitions/{processDefinitionId}',
            'responseModel' => 'Activiti\Client\Model\Repository\ProcessDefinition',
            'parameters' => [
                'processDefinitionId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'action' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                    'default' => 'suspend',
                    'static' => true,
                ],
                'includeProcessInstances' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'date' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
            ],
        ],
        'repository/process-definition-activate' => [
            'httpMethod' => 'PUT',
            'uri' => 'repository/process-definitions/{processDefinitionId}',
            'responseModel' => 'Activiti\Client\Model\Repository\ProcessDefinition',
            'parameters' => [
                'processDefinitionId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'action' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                    'default' => 'activate',
                    'static' => true,
                ],
                'includeProcessInstances' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'date' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
            ],
        ],
        'repository/deployment-list' => [
            'httpMethod' => 'GET',
            'uri' => 'repository/deployments',
            'responseModel' => 'Activiti\Client\Model\Deployment\DeploymentList',
            'parameters' => [
                'name' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'nameLike' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'category' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'categoryNotEquals' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'tenantId' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'tenantIdLike' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'withoutTenantId' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'sort' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
            ],
        ],
        'repository/deployment-get' => [
            'httpMethod' => 'GET',
            'responseModel' => 'Activiti\Client\Model\Deployment\Deployment',
            'uri' => 'repository/deployments/{deploymentId}',
            'parameters' => [
                'deploymentId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
        ],
        'repository/deployment-create' => [
            'httpMethod' => 'POST',
            'uri' => 'repository/deployments',
            'responseModel' => 'Activiti\Client\Model\Deployment\Deployment',
            'parameters' => [
                'deployment' => [
                    'location' => 'multipart',
                ],
            ],
        ],
        'repository/deployment-delete' => [
            'httpMethod' => 'DELETE',
            'uri' => 'repository/deployments/{deploymentId}',
            'parameters' => [
                'deploymentId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
        ],
        'runtime/process-instance-get' => [
            'httpMethod' => 'GET',
            'responseModel' => 'Activiti\Client\Model\ProcessInstance\ProcessInstance',
            'uri' => 'runtime/process-instances/{processInstanceId}',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
        ],
        'runtime/process-instance-list' => [
            'httpMethod' => 'GET',
            'responseModel' => 'Activiti\Client\Model\ProcessInstance\ProcessInstanceList',
            'uri' => 'runtime/process-instances',
            'parameters' => [
                'id' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'processDefinitionKey' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'processDefinitionId' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'businessKey' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'involvedUser' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'suspended' => [
                    'type' => 'boolean',
                    'location' => 'query',
                    'required' => false,
                ],
                'superProcessInstanceId' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'subProcessInstanceId' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'excludeSubprocesses' => [
                    'type' => 'boolean',
                    'location' => 'query',
                    'required' => false,
                ],
                'includeProcessVariables' => [
                    'type' => 'boolean',
                    'location' => 'query',
                    'required' => false,
                ],
                'tenantId' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'tenantIdLike' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
                'withoutTenantId' => [
                    'type' => 'boolean',
                    'location' => 'query',
                    'required' => false,
                ],
                'sort' => [
                    'type' => 'string',
                    'location' => 'query',
                    'required' => false,
                ],
            ],
        ],
        'query/process-instances' => [
            'httpMethod' => 'POST',
            'responseModel' => 'Activiti\Client\Model\ProcessInstance\ProcessInstanceList',
            'uri' => 'query/process-instances',
            'parameters' => [
                // TODO:
            ],
        ],
        'runtime/process-instance-delete' => [
            'httpMethod' => 'DELETE',
            'uri' => 'runtime/process-instances/{processInstanceId}',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
        ],
        'runtime/process-instance-activate' => [
            'httpMethod' => 'PUT',
            'uri' => 'runtime/process-instances/{processInstanceId}',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'action' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                    'default' => 'activate',
                    'static' => true,
                ],
            ],
        ],
        'runtime/process-instance-suspend' => [
            'httpMethod' => 'PUT',
            'uri' => 'runtime/process-instances/{processInstanceId}',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'action' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                    'default' => 'suspend',
                    'static' => true,
                ],
            ],
        ],
        'runtime/process-instance-start' => [
            'httpMethod' => 'POST',
            'uri' => 'runtime/process-instances',
            'responseModel' => 'Activiti\Client\Model\ProcessInstance\ProcessInstance',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                '$processDefinitionKey' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'message' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'businessKey' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'tenantId' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => false,
                ],
                'variables' => [
                    'type' => 'array',
                    'location' => 'json',
                    'required' => false,
                ],
            ]
        ],
        'runtime/process-instance-diagram' => [
            'httpMethod' => 'GET',
            //'responseModel' => '',
            'uri' => 'runtime/process-instances/{processInstanceId}/diagram',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ]
            ],
        ],
        'runtime/process-instance-identitylinks-get' => [
            'httpMethod' => 'GET',
//            'responseModel' => '',
            'uri' => 'runtime/process-instances/{processInstanceId}/identitylinks',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ]
            ],
        ],
        'runtime/process-instance-identitylinks-add' => [
            'httpMethod' => 'POST',
            'responseModel' => 'Activiti\Client\Model\Repository\IdentityLink',
            'uri' => 'runtime/process-instances/{processInstanceId}/identitylinks',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'userId' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
                'type' => [
                    'type' => 'string',
                    'location' => 'json',
                    'required' => true,
                ],
            ],
        ],
        'runtime/process-instance-identitylinks-del' => [
            'httpMethod' => 'DELETE',
            'responseModel' => 'Activiti\Client\Model\Repository\IdentityLink',
            'uri' => 'runtime/process-instances/{processInstanceId}/identitylinks/users/{userId}/{type}',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'userId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'type' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
        ],
        'runtime/process-instance-variable-list' => [
            'httpMethod' => 'GET',
            // 'responseModel' => '',
            'uri' => 'runtime/process-instances/{processInstanceId}/variables',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ]
            ],
        ],
        'runtime/process-instance-variable-get' => [
            'httpMethod' => 'GET',
            'responseModel' => 'Activiti\Client\Model\ProcessInstance\Variable',
            'uri' => 'runtime/process-instances/{processInstanceId}/variables/{variableName}',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
                'variableName' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
        ],
        'runtime/process-instance-variables-create' => [
            'httpMethod' => 'POST',
            // TODO: 'responseModel' => '',
            'uri' => 'runtime/process-instances/{processInstanceId}/variables',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
            // TODO: Payload
        ],
        'runtime/process-instance-variables-update' => [
            'httpMethod' => 'PUT',
            // TODO: 'responseModel' => '',
            'uri' => 'runtime/process-instances/{processInstanceId}/variables',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
            // TODO: Payload
        ],
        'runtime/process-instance-variable-update' => [
            'httpMethod' => 'PUT',
            'responseModel' => 'Activiti\Client\Model\ProcessInstance\Variable',
            'uri' => 'runtime/process-instances/{processInstanceId}/variables/{variableName}',
            'parameters' => [
                'processInstanceId' => [
                    'type' => 'string',
                    'location' => 'uri',
                    'required' => true,
                ],
            ],
            'variableName' => [
                'type' => 'string',
                'location' => 'uri',
                'required' => true,
            ],
            'name' => [
                'type' => 'string',
                'location' => 'json',
                'required' => true,
            ],
            'type' => [
                'type' => 'string',
                'location' => 'json',
                'required' => true,
            ],
            'value' => [
                'type' => 'string',
                'location' => 'json',
                'required' => true,
            ],
        ],
        'runtime/process-instance-binary-variable-create' => [
            // TODO

        ],
        'runtime/process-instance-binary-variable-update' => [
            // TODO:
        ],
    ],
    'models' => [
        'Activiti\Client\Model\Group\Group' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
        'Activiti\Client\Model\Group\GroupList' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
        'Activiti\Client\Model\Group\GroupMember' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
        'Activiti\Client\Model\User\User' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
        'Activiti\Client\Model\User\UserList' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
        'Activiti\Client\Model\Deployment\Deployment' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
        'Activiti\Client\Model\Deployment\DeploymentList' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
        'Activiti\Client\Model\Deployment\ResourceData' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
        'Activiti\Client\Model\Management\Engine' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
        'Activiti\Client\Model\Management\EngineProperties' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
        'Activiti\Client\Model\Repository\ProcessDefinitionList' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
        'Activiti\Client\Model\Repository\ProcessDefinition' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json',
            ],
        ],
    ],
];
