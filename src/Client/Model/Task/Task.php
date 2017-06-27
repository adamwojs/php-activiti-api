<?php

namespace Activiti\Client\Model\Task;

use Activiti\Client\Model\ValueObject;

class Task extends ValueObject
{
    public $assignee;
    public $createTime;
    public $delegationState;
    public $description;
    public $dueDate;
    public $execution;
    public $id;
    public $name;
    public $owner;
    public $parentTask;
    public $priority;
    public $processDefinition;
    public $processInstance;
    public $suspended;
    public $taskDefinitionKey;
    public $url;
    public $tenantId;
}