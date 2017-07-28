<?php

namespace Activiti\Client\Model\ProcessInstance;

class ProcessInstance
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getId()
    {
        return $this->data['id'];
    }

    public function getUrl()
    {
        return $this->data['url'];
    }

    public function getBusinessKey()
    {
        return $this->data['businessKey'];
    }

    public function getSuspended()
    {
        return $this->data['suspended'];
    }

    public function getEnded()
    {
        return $this->data['ended'];
    }

    public function getProcessDefinitionId()
    {
        return $this->data['processDefinitionId'];
    }

    public function getProcessDefinitionUrl()
    {
        return $this->data['processDefinitionUrl'];
    }

    public function getProcessDefinitionKey()
    {
        return $this->data['processDefinitionKey'];
    }

    public function getActivityId()
    {
        return $this->data['activityId'];
    }

    public function getVariables()
    {
        return $this->data['variables'];
    }

    public function getTenantId()
    {
        return $this->data['tenantId'];
    }

    public function getName()
    {
        return $this->data['name'];
    }

    public function getCompleted()
    {
        return $this->data['completed'];
    }
}
