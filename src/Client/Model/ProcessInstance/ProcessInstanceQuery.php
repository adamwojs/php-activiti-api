<?php

namespace Activiti\Client\Model\ProcessInstance;

use Activiti\Client\Model\AbstractQuery;

class ProcessInstanceQuery extends AbstractQuery
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
    public $variables;
}
