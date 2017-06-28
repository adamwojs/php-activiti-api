<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\ProcessDefinition\ProcessDefinitionQuery;
use Activiti\Client\Model\ProcessDefinition\ProcessDefinitionUpdate;

interface ProcessDefinitionServiceInterface
{
    public function getProcessDefinitionList(ProcessDefinitionQuery $query);

    public function getProcessDefinition($processDefinitionId);

    public function update($processDefinitionId, ProcessDefinitionUpdate $data);

    public function getResourceData($processDefinitionId);

    public function suspend($processDefinitionId, $includeProcessInstances = null, \DateTime $date = null);

    public function activate($processDefinitionId, $includeProcessInstances = null, \DateTime $date = null);

    public function getCandidateStarters($processDefinitionId);

    public function addUserCandidateStarter($processDefinitionId, $userId);

    public function addGroupCandidateStarter($processDefinitionId, $groupId);

    public function deleteCandidateStarter($processDefinitionId, $family, $identityId);

    public function getCandidateStarter($processDefinitionId, $family, $identityId);
}
