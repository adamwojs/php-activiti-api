<?php

namespace Activiti\Client\Model\Task;

use Activiti\Client\Model\AbstractQuery;

class TaskQuery extends AbstractQuery
{
    public $name;
    public $nameLike;
    public $description;
    public $priority;
    public $minimumPriority;
    public $maximumPriority;
    public $assignee;
    public $assigneeLike;
    public $owner;
    public $ownerLike;
    public $unassigned;
    public $delegationState;
    public $candidateUser;
    public $candidateGroup;
    public $candidateGroups;
    public $involvedUser;
    public $taskDefinitionKey;
    public $taskDefinitionKeyLike;
    public $processInstanceId;
    public $processInstanceBusinessKey;
    public $processInstanceBusinessKeyLike;
    public $processDefinitionId;
    public $processDefinitionKey;
    public $processDefinitionKeyLike;
    public $processDefinitionName;
    public $processDefinitionNameLike;
    public $executionId;
    public $createdOn;
    public $createdBefore;
    public $createdAfter;
    public $dueOn;
    public $dueBefore;
    public $dueAfter;
    public $withoutDueDate;
    public $withDueDate;
    public $excludeSubTasks;
    public $active;
    public $includeTaskLocalVariables;
    public $includeProcessVariables;
    public $tenantId;
    public $tenantIdLike;
    public $withoutTenantId;
    public $candidateOrAssigned;
    public $category;
    public $taskVariables;
    public $processInstanceVariables;
}