<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Task\TaskQuery;
use Activiti\Client\Model\Task\TaskUpdate;
use Activiti\Client\Model\VariableList;

interface TaskServiceInterface
{
    public function getTask($taskId);

    public function getTaskList(TaskQuery $query = null);

    public function updateTask($taskId, TaskUpdate $data);

    public function deleteTask($taskId, $cascadeHistory = false, $deleteReason = false);

    public function complete($taskId, array $variables = []);

    public function claim($taskId, $assignee);

    public function delegate($taskId, $assignee);

    public function resolve($taskId);

    public function getVariables($taskId, $scope = null);

    public function getVariable($taskId, $variableName, $scope = null);

    public function getBinaryVariable($taskId, $variableName, $scope = null);

    public function createVariables($taskId, VariableList $variables);

    public function deleteVariable($taskId, $variableName, $scope = null);

    public function deleteLocalVariables($taskId);

    public function getIdentityLinks($taskId);

    public function getUsersIdentityLinks($taskId);

    public function getGroupsIdentityLinks($taskId);

    public function getIdentityLink($taskId, $family, $identityId, $type);

    public function createIdentityLink($taskId, $userId, $type);

    public function deleteIdentityLink($taskId, $family, $identityId, $type);

    public function createComment($taskId, $message, $saveProcessInstanceId = false);

    public function getComments($taskId);

    public function getComment($taskId, $commentId);

    public function deleteComment($taskId, $commentId);

    public function getEvents($taskId);

    public function getEvent($taskId, $eventId);

    public function createAttachment($taskId, $name, $data, $description = null, $type = null);

    public function getAttachments($taskId);

    public function getAttachment($taskId, $attachmentId);

    public function deleteAttachment($taskId, $attachmentId);
}