<?php

namespace Activiti\Client\Model\ProcessInstance;

use Activiti\Client\Model\ValueObject;

class ProcessInstance extends ValueObject
{
    public $id;
    public $url;
    public $businessKey;
    public $suspended;
    public $ended;
    public $processDefinitionId;
    public $processDefinitionUrl;
    public $processDefinitionKey;
    public $activityId;
    public $variables;
    public $tenantId;
    public $name;
    public $completed;
}
