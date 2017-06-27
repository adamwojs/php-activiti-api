<?php

namespace Activiti\Client\Model\Task;

use Activiti\Client\Model\ValueObject;

class TaskUpdate extends ValueObject
{
    public $assignee;
    public $delegationState;
    public $description;
    public $dueDate;
    public $name;
    public $owner;
    public $parentTaskId;
    public $priority;
}