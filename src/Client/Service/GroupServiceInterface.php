<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Group\Group;
use Activiti\Client\Model\Group\GroupList;
use Activiti\Client\Model\Group\GroupMember;
use Activiti\Client\Model\Group\GroupQuery;

interface GroupServiceInterface
{
    /**
     * Get a single group.
     *
     * @see https://www.activiti.org/userguide/#_get_a_single_group
     *
     * @param string $groupId The id of the group to get
     * @return Group
     */
    public function getGroup($groupId);

    /**
     * Get a list of groups.
     *
     * @see https://www.activiti.org/userguide/#_get_a_list_of_groups
     *
     * @param GroupQuery|null $query The group list parameters (pagination, filtering and sorting)
     * @return GroupList
     */
    public function getGroupList(GroupQuery $query = null);

    /**
     * Create a group.
     *
     * @see https://www.activiti.org/userguide/#_create_a_group
     *
     * @param string $groupId
     * @param string $name
     * @param string $type
     * @return Group
     */
    public function createGroup($groupId, $name, $type);

    /**
     * Update a group.
     *
     * @see https://www.activiti.org/userguide/#_update_a_group
     *
     * @param string $groupId The id of the group to update
     * @param string $name
     * @param string $type
     * @return Group
     */
    public function updateGroup($groupId, $name, $type);

    /**
     * Delete a group.
     *
     * @see https://www.activiti.org/userguide/#_delete_a_group
     *
     * @param string $groupId The id of the group to delete
     * @return void
     */
    public function deleteGroup($groupId);

    /**
     * Add a member to a group.
     *
     * @see https://www.activiti.org/userguide/#_add_a_member_to_a_group
     *
     * @param string $groupId The id of the group to add a member to
     * @param string $userId The id of the user to add
     * @return GroupMember
     */
    public function addMember($groupId, $userId);

    /**
     * Delete a member from a group.
     *
     * @see https://www.activiti.org/userguide/#_delete_a_member_from_a_group
     *
     * @param string $groupId The id of the group to remove a member from
     * @param string $userId The id of the user to remove
     * @return void
     */
    public function deleteMember($groupId, $userId);
}
