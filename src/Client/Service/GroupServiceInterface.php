<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Group\GroupCreate;
use Activiti\Client\Model\Group\GroupQuery;
use Activiti\Client\Model\Group\GroupUpdate;

interface GroupServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getGroup($groupId);

    /**
     * @inheritdoc
     */
    public function getGroupList(GroupQuery $query = null);

    /**
     * @inheritdoc
     */
    public function createGroup(GroupCreate $data);

    /**
     * @inheritdoc
     */
    public function updateGroup($groupId, GroupUpdate $data);

    /**
     * @inheritdoc
     */
    public function deleteGroup($groupId);

    /**
     * @inheritdoc
     */
    public function addMember($groupId, $userId);

    /**
     * @inheritdoc
     */
    public function deleteMember($groupId, $userId);
}
