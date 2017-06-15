<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Group\GroupCreate;
use Activiti\Client\Model\Group\GroupQuery;
use Activiti\Client\Model\Group\GroupUpdate;

class GroupService extends AbstractService implements GroupServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getGroup($groupId)
    {
        return $this->gateway->execute('identity/group-get', [
            'groupId' => $groupId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getGroupList(GroupQuery $query = null)
    {
        return $this->gateway->execute('identity/group-list', (array)$query);
    }

    /**
     * @inheritdoc
     */
    public function createGroup(GroupCreate $data)
    {
        return $this->gateway->execute('identity/group-create', (array)$data);
    }

    /**
     * @inheritdoc
     */
    public function updateGroup($groupId, GroupUpdate $data)
    {
        return $this->gateway->execute('identity/group-update', (array)$data);
    }

    /**
     * @inheritdoc
     */
    public function deleteGroup($groupId)
    {
        $this->gateway->execute('identity/group-delete', [
            'groupId' => $groupId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function addMember($groupId, $userId)
    {
        return $this->gateway->execute('identity/group-add-member', [
            'groupId' => $groupId,
            'userId' => $userId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function deleteMember($groupId, $userId)
    {
        return $this->gateway->execute('identity/group-del-member', [
            'groupId' => $groupId,
            'userId' => $userId
        ]);
    }
}
