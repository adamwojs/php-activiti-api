<?php

namespace Activiti\Client\Model\ProcessInstance;

use Activiti\Client\Model\ValueObject;

class ProcessInstanceCreate extends ValueObject
{
    public $processDefinitionId;
    public $processDefinitionKey;
    public $message;
    public $businessKey;
    public $tenantId;
    public $variables;
}
