<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Repository\ProcessDefinitionAction;
use Activiti\Client\Model\Repository\ProcessDefinitionQuery;
use Activiti\Client\Model\Repository\ProcessDefinitionUpdate;

class ProcessDefinitionService extends AbstractService implements ProcessDefinitionServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getProcessDefinitionList(ProcessDefinitionQuery $query)
    {
        return $this->gateway->execute('repository/process-definition-list', (array) $query);
    }

    /**
     * @inheritdoc
     */
    public function getProcessDefinition($processDefinitionId)
    {
        return $this->gateway->execute('repository/process-definition-get', [
            'processDefinitionId' => $processDefinitionId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function update($processDefinitionId, ProcessDefinitionUpdate $data)
    {
        return $this->gateway->execute('repository/process-definition-update', (array) $data + [
            'processDefinitionId' => $processDefinitionId,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getResourceData($processDefinitionId)
    {
        return $this->gateway->execute('repository/process-definition-get-resourcedata', [
            'processDefinitionId' => $processDefinitionId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function suspend($processDefinitionId, ProcessDefinitionAction $data = null)
    {
        return $this->gateway->execute('repository/process-definition-suspend', (array) $data + [
            'processDefinitionId' => $processDefinitionId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function activate($processDefinitionId, ProcessDefinitionAction $data = null)
    {
        return $this->gateway->execute('repository/process-definition-activate', (array) $data + [
            'processDefinitionId' => $processDefinitionId
        ]);
    }
}
