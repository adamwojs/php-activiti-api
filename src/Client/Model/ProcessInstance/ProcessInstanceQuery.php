<?php

namespace Activiti\Client\Model\ProcessInstance;

use Activiti\Client\Model\AbstractQuery;

class ProcessInstanceQuery extends AbstractQuery
{
    private $id;
    private $processDefinitionKey;
    private $processDefinitionId;
    private $businessKey;
    private $involvedUser;
    private $suspended;
    private $superProcessInstanceId;
    private $subProcessInstanceId;
    private $excludeSubprocesses;
    private $includeProcessVariables;
    private $tenantId;
    private $tenantIdLike;
    private $withoutTenantId;
    private $variables;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getProcessDefinitionKey()
    {
        return $this->processDefinitionKey;
    }

    public function setProcessDefinitionKey($processDefinitionKey)
    {
        $this->processDefinitionKey = $processDefinitionKey;
    }

    public function getProcessDefinitionId()
    {
        return $this->processDefinitionId;
    }

    public function setProcessDefinitionId($processDefinitionId)
    {
        $this->processDefinitionId = $processDefinitionId;
    }

    public function getBusinessKey()
    {
        return $this->businessKey;
    }

    public function setBusinessKey($businessKey)
    {
        $this->businessKey = $businessKey;
    }

    public function getInvolvedUser()
    {
        return $this->involvedUser;
    }

    public function setInvolvedUser($involvedUser)
    {
        $this->involvedUser = $involvedUser;
    }

    public function getSuspended()
    {
        return $this->suspended;
    }

    public function setSuspended($suspended)
    {
        $this->suspended = $suspended;
    }

    public function getSuperProcessInstanceId()
    {
        return $this->superProcessInstanceId;
    }

    public function setSuperProcessInstanceId($superProcessInstanceId)
    {
        $this->superProcessInstanceId = $superProcessInstanceId;
    }

    public function getSubProcessInstanceId()
    {
        return $this->subProcessInstanceId;
    }

    public function setSubProcessInstanceId($subProcessInstanceId)
    {
        $this->subProcessInstanceId = $subProcessInstanceId;
    }

    public function getExcludeSubprocesses()
    {
        return $this->excludeSubprocesses;
    }

    public function setExcludeSubprocesses($excludeSubprocesses)
    {
        $this->excludeSubprocesses = $excludeSubprocesses;
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

    public function getVariables()
    {
        return $this->variables;
    }

    public function setVariables($variables)
    {
        $this->variables = $variables;
    }
}
