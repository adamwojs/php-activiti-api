<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\BinaryVariable;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceCreate;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceQuery;
use Activiti\Client\Model\VariableUpdate;

interface ProcessInstanceServiceInterface
{
    public function getProcessInstance($processInstanceId);

    public function getProcessInstanceList(ProcessInstanceQuery $query);

    public function deleteProcessInstance($processInstanceId);

    public function activate($processInstanceId);

    public function suspend($processInstanceId);

    public function start(ProcessInstanceCreate $data);

    public function getDiagram($processInstanceId);

    public function getIdentityLinks($processInstanceId);

    public function addIdentityLink($processInstanceId, $userId, $type);

    public function removeIdentityLink($processInstanceId, $userId, $type);

    public function getVariable($processInstanceId, $variableName);

    public function createVariables($processInstanceId, array $variables);

    public function updateVariable($processInstanceId, $variableName, VariableUpdate $data);

    public function updateVariables($processInstanceId, array $variables);

    public function createBinaryVariable($processInstanceId, BinaryVariable $binaryVariable);

    public function updateBinaryVariable($processInstanceId, BinaryVariable $binaryVariable);
}
