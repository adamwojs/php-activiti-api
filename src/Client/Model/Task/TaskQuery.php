<?php

namespace Activiti\Client\Model\Task;

use Activiti\Client\Model\AbstractQuery;

class TaskQuery extends AbstractQuery
{
    private $name;
    private $nameLike;
    private $description;
    private $priority;
    private $minimumPriority;
    private $maximumPriority;
    private $assignee;
    private $assigneeLike;
    private $owner;
    private $ownerLike;
    private $unassigned;
    private $delegationState;
    private $candidateUser;
    private $candidateGroup;
    private $candidateGroups;
    private $involvedUser;
    private $taskDefinitionKey;
    private $taskDefinitionKeyLike;
    private $processInstanceId;
    private $processInstanceBusinessKey;
    private $processInstanceBusinessKeyLike;
    private $processDefinitionId;
    private $processDefinitionKey;
    private $processDefinitionKeyLike;
    private $processDefinitionName;
    private $processDefinitionNameLike;
    private $executionId;
    private $createdOn;
    private $createdBefore;
    private $createdAfter;
    private $dueOn;
    private $dueBefore;
    private $dueAfter;
    private $withoutDueDate;
    private $withDueDate;
    private $excludeSubTasks;
    private $active;
    private $includeTaskLocalVariables;
    private $includeProcessVariables;
    private $tenantId;
    private $tenantIdLike;
    private $withoutTenantId;
    private $candidateOrAssigned;
    private $category;
    private $taskVariables;
    private $processInstanceVariables;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getNameLike()
    {
        return $this->nameLike;
    }

    public function setNameLike($nameLike)
    {
        $this->nameLike = $nameLike;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    public function getMinimumPriority()
    {
        return $this->minimumPriority;
    }

    public function setMinimumPriority($minimumPriority)
    {
        $this->minimumPriority = $minimumPriority;
    }

    public function getMaximumPriority()
    {
        return $this->maximumPriority;
    }

    public function setMaximumPriority($maximumPriority)
    {
        $this->maximumPriority = $maximumPriority;
    }

    public function getAssignee()
    {
        return $this->assignee;
    }

    public function setAssignee($assignee)
    {
        $this->assignee = $assignee;
    }

    public function getAssigneeLike()
    {
        return $this->assigneeLike;
    }

    public function setAssigneeLike($assigneeLike)
    {
        $this->assigneeLike = $assigneeLike;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    public function getOwnerLike()
    {
        return $this->ownerLike;
    }

    public function setOwnerLike($ownerLike)
    {
        $this->ownerLike = $ownerLike;
    }

    public function getUnassigned()
    {
        return $this->unassigned;
    }

    public function setUnassigned($unassigned)
    {
        $this->unassigned = $unassigned;
    }

    public function getDelegationState()
    {
        return $this->delegationState;
    }

    public function setDelegationState($delegationState)
    {
        $this->delegationState = $delegationState;
    }

    public function getCandidateUser()
    {
        return $this->candidateUser;
    }

    public function setCandidateUser($candidateUser)
    {
        $this->candidateUser = $candidateUser;
    }

    public function getCandidateGroup()
    {
        return $this->candidateGroup;
    }

    public function setCandidateGroup($candidateGroup)
    {
        $this->candidateGroup = $candidateGroup;
    }

    public function getCandidateGroups()
    {
        return $this->candidateGroups;
    }

    public function setCandidateGroups($candidateGroups)
    {
        $this->candidateGroups = $candidateGroups;
    }

    public function getInvolvedUser()
    {
        return $this->involvedUser;
    }

    public function setInvolvedUser($involvedUser)
    {
        $this->involvedUser = $involvedUser;
    }

    public function getTaskDefinitionKey()
    {
        return $this->taskDefinitionKey;
    }

    public function setTaskDefinitionKey($taskDefinitionKey)
    {
        $this->taskDefinitionKey = $taskDefinitionKey;
    }

    public function getTaskDefinitionKeyLike()
    {
        return $this->taskDefinitionKeyLike;
    }

    public function setTaskDefinitionKeyLike($taskDefinitionKeyLike)
    {
        $this->taskDefinitionKeyLike = $taskDefinitionKeyLike;
    }

    public function getProcessInstanceId()
    {
        return $this->processInstanceId;
    }

    public function setProcessInstanceId($processInstanceId)
    {
        $this->processInstanceId = $processInstanceId;
    }

    public function getProcessInstanceBusinessKey()
    {
        return $this->processInstanceBusinessKey;
    }

    public function setProcessInstanceBusinessKey($processInstanceBusinessKey)
    {
        $this->processInstanceBusinessKey = $processInstanceBusinessKey;
    }

    public function getProcessInstanceBusinessKeyLike()
    {
        return $this->processInstanceBusinessKeyLike;
    }

    public function setProcessInstanceBusinessKeyLike($processInstanceBusinessKeyLike)
    {
        $this->processInstanceBusinessKeyLike = $processInstanceBusinessKeyLike;
    }

    public function getProcessDefinitionId()
    {
        return $this->processDefinitionId;
    }

    public function setProcessDefinitionId($processDefinitionId)
    {
        $this->processDefinitionId = $processDefinitionId;
    }

    public function getProcessDefinitionKey()
    {
        return $this->processDefinitionKey;
    }

    public function setProcessDefinitionKey($processDefinitionKey)
    {
        $this->processDefinitionKey = $processDefinitionKey;
    }

    public function getProcessDefinitionKeyLike()
    {
        return $this->processDefinitionKeyLike;
    }

    public function setProcessDefinitionKeyLike($processDefinitionKeyLike)
    {
        $this->processDefinitionKeyLike = $processDefinitionKeyLike;
    }

    public function getProcessDefinitionName()
    {
        return $this->processDefinitionName;
    }

    public function setProcessDefinitionName($processDefinitionName)
    {
        $this->processDefinitionName = $processDefinitionName;
    }

    public function getProcessDefinitionNameLike()
    {
        return $this->processDefinitionNameLike;
    }

    public function setProcessDefinitionNameLike($processDefinitionNameLike)
    {
        $this->processDefinitionNameLike = $processDefinitionNameLike;
    }

    public function getExecutionId()
    {
        return $this->executionId;
    }

    public function setExecutionId($executionId)
    {
        $this->executionId = $executionId;
    }

    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
    }

    public function getCreatedBefore()
    {
        return $this->createdBefore;
    }

    public function setCreatedBefore($createdBefore)
    {
        $this->createdBefore = $createdBefore;
    }

    public function getCreatedAfter()
    {
        return $this->createdAfter;
    }

    public function setCreatedAfter($createdAfter)
    {
        $this->createdAfter = $createdAfter;
    }

    public function getDueOn()
    {
        return $this->dueOn;
    }

    public function setDueOn($dueOn)
    {
        $this->dueOn = $dueOn;
    }

    public function getDueBefore()
    {
        return $this->dueBefore;
    }

    public function setDueBefore($dueBefore)
    {
        $this->dueBefore = $dueBefore;
    }

    public function getDueAfter()
    {
        return $this->dueAfter;
    }

    public function setDueAfter($dueAfter)
    {
        $this->dueAfter = $dueAfter;
    }

    public function getWithoutDueDate()
    {
        return $this->withoutDueDate;
    }

    public function setWithoutDueDate($withoutDueDate)
    {
        $this->withoutDueDate = $withoutDueDate;
    }

    public function getWithDueDate()
    {
        return $this->withDueDate;
    }

    public function setWithDueDate($withDueDate)
    {
        $this->withDueDate = $withDueDate;
    }

    public function getExcludeSubTasks()
    {
        return $this->excludeSubTasks;
    }

    public function setExcludeSubTasks($excludeSubTasks)
    {
        $this->excludeSubTasks = $excludeSubTasks;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getIncludeTaskLocalVariables()
    {
        return $this->includeTaskLocalVariables;
    }

    public function setIncludeTaskLocalVariables($includeTaskLocalVariables)
    {
        $this->includeTaskLocalVariables = $includeTaskLocalVariables;
    }

    public function getIncludeProcessVariables()
    {
        return $this->includeProcessVariables;
    }

    public function setIncludeProcessVariables($includeProcessVariables)
    {
        $this->includeProcessVariables = $includeProcessVariables;
    }

    public function getTenantId()
    {
        return $this->tenantId;
    }

    public function setTenantId($tenantId)
    {
        $this->tenantId = $tenantId;
    }

    public function getTenantIdLike()
    {
        return $this->tenantIdLike;
    }

    public function setTenantIdLike($tenantIdLike)
    {
        $this->tenantIdLike = $tenantIdLike;
    }

    public function getWithoutTenantId()
    {
        return $this->withoutTenantId;
    }

    public function setWithoutTenantId($withoutTenantId)
    {
        $this->withoutTenantId = $withoutTenantId;
    }

    public function getCandidateOrAssigned()
    {
        return $this->candidateOrAssigned;
    }

    public function setCandidateOrAssigned($candidateOrAssigned)
    {
        $this->candidateOrAssigned = $candidateOrAssigned;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getTaskVariables()
    {
        return $this->taskVariables;
    }

    public function setTaskVariables($taskVariables)
    {
        $this->taskVariables = $taskVariables;
    }

    public function getProcessInstanceVariables()
    {
        return $this->processInstanceVariables;
    }

    public function setProcessInstanceVariables($processInstanceVariables)
    {
        $this->processInstanceVariables = $processInstanceVariables;
    }
}
