<?php

namespace Activiti\Client\Model\Task;

use Activiti\Client\Model\ValueObject;

class Task extends ValueObject
{
    public $id;
    public $url;
    public $owner;
    public $assignee;
    public $delegationState;
    public $name;
    public $description;
    public $createTime;
    public $dueDate;
    public $priority;
    public $suspended;
    public $taskDefinitionKey;
    public $tenantId;
    public $category;
    public $formKey;
    public $parentTaskId;
    public $parentTaskUrl;
    public $executionId;
    public $executionUrl;
    public $processInstanceId;
    public $processInstanceUrl;
    public $processDefinitionId;
    public $processDefinitionUrl;
    public $variables;
}