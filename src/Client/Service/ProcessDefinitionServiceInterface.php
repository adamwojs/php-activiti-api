<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Repository\ProcessDefinitionAction;
use Activiti\Client\Model\Repository\ProcessDefinitionQuery;
use Activiti\Client\Model\Repository\ProcessDefinitionUpdate;

interface ProcessDefinitionServiceInterface
{
    public function getProcessDefinitionList(ProcessDefinitionQuery $query);

    public function getProcessDefinition($processDefinitionId);

    public function update($processDefinitionId, ProcessDefinitionUpdate $data);

    public function getResourceData($processDefinitionId);

    public function suspend($processDefinitionId, ProcessDefinitionAction $data = null);

    public function activate($processDefinitionId, ProcessDefinitionAction $data = null);

}
