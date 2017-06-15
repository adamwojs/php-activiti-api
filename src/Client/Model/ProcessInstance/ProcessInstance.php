<?php

namespace Activiti\Client\Model\ProcessInstance;

use Activiti\Client\Model\ValueObject;

class ProcessInstance extends ValueObject
{
    public $id;
    public $url;
    public $businessKey;
    public $suspended;
    public $processDefinitionUrl;
    public $activityId;
    public $tenantId;
}
