<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\BinaryVariable;
use Activiti\Client\Model\IdentityLink;
use Activiti\Client\Model\IdentityLinkList;
use Activiti\Client\Model\ProcessInstance\ProcessInstance;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceCreate;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceList;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceQuery;
use Activiti\Client\Model\Variable;
use Activiti\Client\Model\VariableCreate;
use Activiti\Client\Model\VariableList;
use Activiti\Client\Model\VariableUpdate;

interface ProcessInstanceServiceInterface
{
    /**
     * Get a process instance.
     *
     * @see https://www.activiti.org/userguide/#_get_a_process_instance
     *
     * @param string $processInstanceId The id of the process instance to get
     * @return ProcessInstance
     */
    public function getProcessInstance($processInstanceId);

    /**
     * List of process instances.
     *
     * @see https://www.activiti.org/userguide/#restProcessInstancesGet
     *
     * @param ProcessInstanceQuery $query
     * @return ProcessInstanceList
     */
    public function getProcessInstanceList(ProcessInstanceQuery $query);

    /**
     * Delete a process instance.
     *
     * @see https://www.activiti.org/userguide/#_delete_a_process_instance
     *
     * @param string $processInstanceId The id of the process instance to delete
     */
    public function deleteProcessInstance($processInstanceId);

    /**
     * Activate a process instance.
     *
     * @see https://www.activiti.org/userguide/#_activate_or_suspend_a_process_instance
     *
     * @param string $processInstanceId The id of the process instance to activate.
     * @return ProcessInstance
     */
    public function activate($processInstanceId);

    /**
     * Suspend a process instance.
     *
     * @see https://www.activiti.org/userguide/#_activate_or_suspend_a_process_instance
     *
     * @param string $processInstanceId The id of the process instance to suspend.
     * @return ProcessInstance
     */
    public function suspend($processInstanceId);

    /**
     * Start a process instance.
     *
     * @see https://www.activiti.org/userguide/#_start_a_process_instance
     *
     * @param ProcessInstanceCreate $data Process data
     * @return ProcessInstance
     */
    public function start(ProcessInstanceCreate $data);

    /**
     * Get diagram for a process instance.
     *
     * @see https://www.activiti.org/userguide/#_get_diagram_for_a_process_instance
     *
     * @param string $processInstanceId The id of the process instance to get the diagram for
     * @return mixed
     */
    public function getDiagram($processInstanceId);

    /**
     * Get involved people for process instance.
     *
     * @see https://www.activiti.org/userguide/#_get_involved_people_for_process_instance
     *
     * @param string $processInstanceId The id of the process instance to the links for.
     * @return IdentityLinkList
     */
    public function getIdentityLinks($processInstanceId);

    /**
     * Add an involved user to a process instance.
     *
     * @see https://www.activiti.org/userguide/#_add_an_involved_user_to_a_process_instance
     *
     * @param string $processInstanceId The id of the process instance to the links for
     * @param string $userId The user ID
     * @param string $type The type of link e.g. "participant"
     * @return IdentityLink
     */
    public function addIdentityLink($processInstanceId, $userId, $type);

    /**
     * Remove an involved user to from process instance.
     *
     * @see https://www.activiti.org/userguide/#_remove_an_involved_user_to_from_process_instance
     *
     * @param string $processInstanceId The id of the process instance to the links for
     * @param string $userId The user ID
     * @param string $type The type of link e.g. "participant"
     */
    public function removeIdentityLink($processInstanceId, $userId, $type);

    /**
     * Get a variable for a process instance.
     *
     * @see https://www.activiti.org/userguide/#_get_a_variable_for_a_process_instance
     *
     * @param string $processInstanceId The id of the process instance to the variables for
     * @param string $variableName Name of the variable to get
     * @return Variable
     */
    public function getVariable($processInstanceId, $variableName);

    /**
     * List of variables for a process instance.
     *
     * @see https://www.activiti.org/userguide/#_list_of_variables_for_a_process_instance
     *
     * @param string $processInstanceId The id of the process instance to the variables for.
     * @return VariableList
     */
    public function getVariables($processInstanceId);

    /**
     * Create variables on a process instance.
     *
     * @see https://www.activiti.org/userguide/#_create_or_update_variables_on_a_process_instance
     *
     * @param string $processInstanceId The id of the process instance to the variables for
     * @param VariableCreate[] $variables List of variables to create
     * @return VariableList
     */
    public function createVariables($processInstanceId, array $variables);

    /**
     * Update a single variable on a process instance.
     *
     * @see https://www.activiti.org/userguide/#_update_a_single_variable_on_a_process_instance
     *
     * @param string $processInstanceId  The id of the process instance to the variables for
     * @param string $variableName The name of variable to update
     * @param VariableUpdate $data Variable data
     * @return Variable
     */
    public function updateVariable($processInstanceId, $variableName, VariableUpdate $data);

    /**
     * Updates variables on a process instance.
     *
     * @see https://www.activiti.org/userguide/#_create_or_update_variables_on_a_process_instance
     *
     * @param string $processInstanceId The id of the process instance to the variables for
     * @param VariableUpdate[] $variables List of variables to update
     * @return VariableList
     */
    public function updateVariables($processInstanceId, array $variables);

    /**
     * Create a new binary variable on a process-instance.
     *
     * @see https://www.activiti.org/userguide/#_create_a_new_binary_variable_on_a_process_instance
     *
     * @param string $processInstanceId The id of the process instance to create the new variable for.
     * @param BinaryVariable $binaryVariable The binary variable to create
     * @return BinaryVariable
     */
    public function createBinaryVariable($processInstanceId, BinaryVariable $binaryVariable);

    /**
     * Update an existing binary variable on a process-instance.
     *
     * @see https://www.activiti.org/userguide/#_update_an_existing_binary_variable_on_a_process_instance
     *
     * @param string $processInstanceId The id of the process instance to create the new variable for.
     * @param BinaryVariable $binaryVariable The binary variable to update
     * @return mixed
     */
    public function updateBinaryVariable($processInstanceId, BinaryVariable $binaryVariable);
}
