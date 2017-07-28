<?php

namespace Activiti\Client\Model\ProcessInstance;

class ProcessInstanceCreate
{
    private $processDefinitionId;
    private $processDefinitionKey;
    private $message;
    private $businessKey;
    private $tenantId;
    private $variables;

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

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getBusinessKey()
    {
        return $this->businessKey;
    }

    public function setBusinessKey($businessKey)
    {
        $this->businessKey = $businessKey;
    }

    public function getTenantId()
    {
        return $this->tenantId;
    }

    public function setTenantId($tenantId)
    {
        $this->tenantId = $tenantId;
    }

    public function getVariables()
    {
        return $this->variables;
    }

    public function setVariables($variables)
    {
        $this->variables = $variables;
    }
}
