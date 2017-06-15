<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\ProcessInstance\BinaryVariable;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceCreate;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceQuery;
use Activiti\Client\Model\ProcessInstance\VariableUpdate;

class ProcessInstanceService extends AbstractService implements ProcessInstanceServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getProcessInstance($processInstanceId)
    {
        return $this->gateway->execute('runtime/process-instance-get', [
            'processInstanceId' => $processInstanceId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getProcessInstanceList(ProcessInstanceQuery $query)
    {
        $command = 'runtime/process-instance-list';
        if (!empty($query->variables)) {
            $command = 'query/process-instances';
        }

        $this->gateway->execute($command, (array)$query);
    }

    /**
     * @inheritdoc
     */
    public function deleteProcessInstance($processInstanceId)
    {
        $this->gateway->execute('runtime/process-instance-delete', [
            'processInstanceId' => $processInstanceId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function activate($processInstanceId)
    {
        return $this->gateway->execute('runtime/process-instance-activate', [
            'processInstanceId' => $processInstanceId,
            'action' => 'activate'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function suspend($processInstanceId)
    {
        return $this->gateway->execute('runtime/process-instance-suspend', [
            'processInstanceId' => $processInstanceId,
            'action' => 'suspend'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function start(ProcessInstanceCreate $data)
    {
        $this->gateway->execute('runtime/process-instance-start', (array)$data);
    }

    /**
     * @inheritdoc
     */
    public function getDiagram($processInstanceId)
    {
        return $this->gateway->execute('runtime/process-instance-diagram', [
            'processInstanceId' => $processInstanceId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getIdentityLinks($processInstanceId)
    {
        return $this->gateway->execute('runtime/process-instance-identitylinks-get', [
            'processInstanceId' => $processInstanceId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function addIdentityLink($processInstanceId, $userId, $type)
    {
        return $this->gateway->execute('runtime/process-instance-identitylinks-add', [
            'processInstanceId' => $processInstanceId,
            'userId' => $userId,
            'type' => $type
        ]);
    }

    /**
     * @inheritdoc
     */
    public function removeIdentityLink($processInstanceId, $userId, $type)
    {
        return $this->gateway->execute('runtime/process-instance-identitylinks-del', [
            'processInstanceId' => $processInstanceId,
            'userId' => $userId,
            'type' => $type
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getVariables($processInstanceId)
    {
        return $this->gateway->execute('runtime/process-instance-variable-list', [
            'processInstanceId' => $processInstanceId,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getVariable($processInstanceId, $variableName)
    {
        return $this->gateway->execute('runtime/process-instance-variable-get', [
            'processInstanceId' => $processInstanceId,
            'variableName' => $variableName
        ]);
    }

    /**
     * @inheritdoc
     */
    public function createVariables($processInstanceId, array $variables)
    {
        return $this->gateway->execute('runtime/process-instance-variables-create', [
            'processInstanceId' => $processInstanceId,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function updateVariables($processInstanceId, array $variables)
    {
        return $this->gateway->execute('runtime/process-instance-variables-update', [
            'processInstanceId' => $processInstanceId,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function updateVariable($processInstanceId, $variableName, VariableUpdate $data)
    {
        return $this->gateway->execute('runtime/process-instance-variable-update', (array)$data + [
            'processInstanceId' => $processInstanceId,
            'variableName' => $variableName
        ]);
    }

    /**
     * @inheritdoc
     */
    public function createBinaryVariable($processInstanceId, BinaryVariable $binaryVariable)
    {
        return $this->gateway->execute('runtime/process-instance-binary-variable-create', (array)$binaryVariable + [
            'processInstanceId' => $processInstanceId,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function updateBinaryVariable($processInstanceId, BinaryVariable $binaryVariable)
    {
        return $this->gateway->execute('runtime/process-instance-binary-variable-update', (array)$binaryVariable + [
            'processInstanceId' => $processInstanceId,
        ]);
    }
}
