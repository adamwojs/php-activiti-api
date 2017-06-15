<?php

namespace Activiti\Client\Model\ProcessInstance;

use Activiti\Client\Model\ValueObject;

class ProcessInstanceQuery extends ValueObject
{
    public $id;
    public $processDefinitionKey;
    public $processDefinitionId;
    public $businessKey;
    public $involvedUser;
    public $suspended;
    public $superProcessInstanceId;
    public $subProcessInstanceId;
    public $excludeSubprocesses;
    public $includeProcessVariables;
    public $tenantId;
    public $tenantIdLike;
    public $withoutTenantId;
    public $sort;
    public $variables;
}
