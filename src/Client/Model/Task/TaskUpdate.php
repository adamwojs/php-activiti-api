<?php

namespace Activiti\Client\Model\Task;

class TaskUpdate
{
    private $assignee;
    private $delegationState;
    private $description;
    private $dueDate;
    private $name;
    private $owner;
    private $parentTaskId;
    private $priority;

    public function getAssignee()
    {
        return $this->assignee;
    }

    public function setAssignee($assignee)
    {
        $this->assignee = $assignee;
    }

    public function getDelegationState()
    {
        return $this->delegationState;
    }

    public function setDelegationState($delegationState)
    {
        $this->delegationState = $delegationState;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    public function getParentTaskId()
    {
        return $this->parentTaskId;
    }

    public function setParentTaskId($parentTaskId)
    {
        $this->parentTaskId = $parentTaskId;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function setPriority($priority)
    {
        $this->priority = $priority;
    }
}
