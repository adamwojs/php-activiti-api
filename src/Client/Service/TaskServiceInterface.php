<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\IdentityLink;
use Activiti\Client\Model\IdentityLinkList;
use Activiti\Client\Model\Task\Attachment;
use Activiti\Client\Model\Task\AttachmentList;
use Activiti\Client\Model\Task\Comment;
use Activiti\Client\Model\Task\CommentList;
use Activiti\Client\Model\Task\Event;
use Activiti\Client\Model\Task\EventList;
use Activiti\Client\Model\Task\Task;
use Activiti\Client\Model\Task\TaskList;
use Activiti\Client\Model\Task\TaskQuery;
use Activiti\Client\Model\Task\TaskUpdate;
use Activiti\Client\Model\Variable;
use Activiti\Client\Model\VariableList;

interface TaskServiceInterface
{
    /**
     * Query for tasks.
     *
     * @see https://www.activiti.org/userguide/#_query_for_tasks
     *
     * @param TaskQuery|null $query
     * @return TaskList
     */
    public function queryTasks(TaskQuery $query = null);

    /**
     * Get a task.
     *
     * @see https://www.activiti.org/userguide/#_get_a_task
     *
     * @param string $taskId The id of the task to get.
     * @return Task
     */
    public function getTask($taskId);

    /**
     * List of tasks.
     *
     * @see https://www.activiti.org/userguide/#restTasksGet
     *
     * @param TaskQuery|null $query
     * @return TaskList
     */
    public function getTaskList(TaskQuery $query = null);

    /**
     * Update a task.
     *
     * @see https://www.activiti.org/userguide/#_update_a_task
     *
     * @param string $taskId The id of the task to update.
     * @param TaskUpdate $data
     * @return Task
     */
    public function updateTask($taskId, TaskUpdate $data);

    /**
     * Delete a task.
     *
     * @see https://www.activiti.org/userguide/#_delete_a_task
     *
     * @param string $taskId The id of the task to delete.
     * @param bool $cascadeHistory
     * @param bool $deleteReason
     * @return void
     */
    public function deleteTask($taskId, $cascadeHistory = false, $deleteReason = false);

    /**
     * Executes "complete" action on task.
     *
     * @see https://www.activiti.org/userguide/#_task_actions
     *
     * @param string $taskId The id of the task to complete.
     * @param array $variables
     * @return Task
     */
    public function complete($taskId, array $variables = []);

    /**
     * Executes "claim" action on task.
     *
     * @see https://www.activiti.org/userguide/#_task_actions
     *
     * @param string $taskId The id of the task to claim.
     * @param string $assignee
     * @return Task
     */
    public function claim($taskId, $assignee);

    /**
     * Executes "delegate" action on task.
     *
     * @see https://www.activiti.org/userguide/#_task_actions
     *
     * @param string $taskId The id of the task to delegate.
     * @param string $assignee
     * @return Task
     */
    public function delegate($taskId, $assignee);

    /**
     * Executes "resolve" action on task.
     *
     * @see https://www.activiti.org/userguide/#_task_actions
     *
     * @param string $taskId The id of the task to resolve.
     * @return Task
     */
    public function resolve($taskId);

    /**
     * Get all variables for a task.
     *
     * @see https://www.activiti.org/userguide/#_get_all_variables_for_a_task
     *
     * @param string $taskId The id of the task to get variables for.
     * @param string $scope Scope of variables to be returned.
     * @return VariableList
     */
    public function getVariables($taskId, $scope = null);

    /**
     * Get a variable from a task.
     *
     * @see https://www.activiti.org/userguide/#_get_a_variable_from_a_task
     *
     * @param string $taskId The id of the task to get a variable for.
     * @param string $variableName The name of the variable to get.
     * @param string $scope Scope of variable to be returned.
     * @return Variable
     */
    public function getVariable($taskId, $variableName, $scope = null);

    /**
     * Get the binary data for a variable.
     *
     * @see https://www.activiti.org/userguide/#_get_the_binary_data_for_a_variable
     *
     * @param string $taskId The id of the task to get a variable data for.
     * @param string $variableName
     * @param string $scope
     * @return mixed
     */
    public function getBinaryVariable($taskId, $variableName, $scope = null);

    /**
     * Create new variables on a task.
     *
     * @see https://www.activiti.org/userguide/#_create_new_variables_on_a_task
     *
     * @param string $taskId The id of the task to create the new variable for.
     * @param array $variables The variables to create
     * @return VariableList
     */
    public function createVariables($taskId, array $variables);

    /**
     * Delete a variable on a task.
     *
     * @see https://www.activiti.org/userguide/#_delete_a_variable_on_a_task
     *
     * @param string $taskId The id of the task the variable to delete belongs to.
     * @param string $variableName The name of the variable to delete.
     * @param string $scope Scope of variable to delete in.
     * @return void
     */
    public function deleteVariable($taskId, $variableName, $scope = null);

    /**
     * Delete all local variables on a task.
     *
     * @see https://www.activiti.org/userguide/#_delete_all_local_variables_on_a_task
     *
     * @param string $taskId The id of the task the variable to delete belongs to.
     * @return void
     */
    public function deleteLocalVariables($taskId);

    /**
     * Get all identity links for a task.
     *
     * @see https://www.activiti.org/userguide/#_get_all_identity_links_for_a_task
     *
     * @param string $taskId The id of the task to get the identity links for.
     * @return IdentityLinkList
     */
    public function getIdentityLinks($taskId);

    /**
     * Get all identity links for a task for users.
     *
     * @see https://www.activiti.org/userguide/#_get_all_identitylinks_for_a_task_for_either_groups_or_users
     *
     * @param string $taskId The id of the task to get the identity links for.
     * @return IdentityLinkList
     */
    public function getUsersIdentityLinks($taskId);

    /**
     * Get all identity links for a task for groups.
     *
     * @see https://www.activiti.org/userguide/#_get_all_identitylinks_for_a_task_for_either_groups_or_users
     *
     * @param string $taskId The id of the task to get the identity links for.
     * @return IdentityLinkList
     */
    public function getGroupsIdentityLinks($taskId);

    /**
     * Get a single identity link on a task.
     *
     * @see https://www.activiti.org/userguide/#_get_a_single_identity_link_on_a_task
     *
     * @param string $taskId The id of the task.
     * @param string $family Either groups or users, depending on what kind of identity is targeted.
     * @param string $identityId The id of the identity.
     * @param string $type The type of identity link.
     * @return IdentityLink
     */
    public function getIdentityLink($taskId, $family, $identityId, $type);

    /**
     * Create an identity link on a task.
     *
     * @see https://www.activiti.org/userguide/#_create_an_identity_link_on_a_task
     *
     * @param string $taskId The id of the task.
     * @param string $family Either groups or users, depending on what kind of identity is targeted.
     * @param string $identityId The id of the identity.
     * @param string $type The type of identity link.
     * @return IdentityLink
     */
    public function createIdentityLink($taskId, $family, $identityId, $type);

    /**
     * Create an identity link on a task.
     *
     * @see https://www.activiti.org/userguide/#_create_an_identity_link_on_a_task
     *
     * @param string $taskId The id of the task.
     * @param string $family Either groups or users, depending on what kind of identity is targeted.
     * @param string $identityId The id of the identity.
     * @param string $type The type of identity link.
     * @return IdentityLink
     */
    public function deleteIdentityLink($taskId, $family, $identityId, $type);

    /**
     * Create a new comment on a task.
     *
     * @see https://www.activiti.org/userguide/#_create_a_new_comment_on_a_task
     *
     * @param string $taskId The id of the task to create the comment for.
     * @param string $message
     * @param bool $saveProcessInstanceId
     * @return Comment
     */
    public function createComment($taskId, $message, $saveProcessInstanceId = false);

    /**
     * Get all comments on a task.
     *
     * @see https://www.activiti.org/userguide/#_get_all_comments_on_a_task
     *
     * @param string $taskId The id of the task to get the comments for.
     * @return CommentList
     */
    public function getComments($taskId);

    /**
     * Get a comment on a task.
     *
     * @see https://www.activiti.org/userguide/#_get_a_comment_on_a_task
     *
     * @param string $taskId The id of the task to get the comment for.
     * @param string $commentId The id of the comment.
     * @return Comment
     */
    public function getComment($taskId, $commentId);

    /**
     * Delete a comment on a task.
     *
     * @see https://www.activiti.org/userguide/#_delete_a_comment_on_a_task
     *
     * @param string $taskId The id of the task to delete the comment for.
     * @param string $commentId The id of the comment.
     * @return void
     */
    public function deleteComment($taskId, $commentId);

    /**
     * Get all events for a task.
     *
     * @see https://www.activiti.org/userguide/#_get_all_events_for_a_task
     *
     * @param string $taskId The id of the task to get the events for.
     * @return EventList
     */
    public function getEvents($taskId);

    /**
     * Get an event on a task
     *
     * @see https://www.activiti.org/userguide/#_get_an_event_on_a_task
     *
     * @param string $taskId Get an event on a task
     * @param string $eventId The id of the event.
     * @return Event
     */
    public function getEvent($taskId, $eventId);

    /**
     * Create a new attachment on a task.
     *
     * @see https://www.activiti.org/userguide/#_create_a_new_attachment_on_a_task_containing_a_link_to_an_external_resource
     * @see https://www.activiti.org/userguide/#_create_a_new_attachment_on_a_task_with_an_attached_file
     *
     * @param string $taskId The id of the task to create the attachment for.
     * @param string $name
     * @param mixed $data
     * @param string $description
     * @param string $type
     * @return Attachment
     */
    public function createAttachment($taskId, $name, $data, $description = null, $type = null);

    /**
     * Get all attachments on a task.
     *
     * @see https://www.activiti.org/userguide/#_get_all_attachments_on_a_task
     *
     * @param string $taskId The id of the task to get the attachments for.
     * @return AttachmentList
     */
    public function getAttachments($taskId);

    /**
     * Get an attachment on a task.
     *
     * @see https://www.activiti.org/userguide/#_get_an_attachment_on_a_task
     *
     * @param string $taskId The id of the task to get the attachment for.
     * @param string $attachmentId The id of the attachment.
     * @return Attachment
     */
    public function getAttachment($taskId, $attachmentId);

    /**
     * Delete an attachment on a task.
     *
     * @see https://www.activiti.org/userguide/#_delete_an_attachment_on_a_task
     *
     * @param string $taskId The id of the task to delete the attachment for.
     * @param string $attachmentId The id of the attachment.
     * @return void
     */
    public function deleteAttachment($taskId, $attachmentId);
}
