<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Group\Group;
use Activiti\Client\Model\Group\GroupCreate;
use Activiti\Client\Model\Group\GroupList;
use Activiti\Client\Model\Group\GroupMember;
use Activiti\Client\Model\Group\GroupQuery;
use Activiti\Client\Model\Group\GroupUpdate;
use GuzzleHttp\ClientInterface;
use function GuzzleHttp\uri_template;

class GroupService extends AbstractService implements GroupServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getGroup($groupId)
    {
        return $this->call(function (ClientInterface $client) use ($groupId) {
            $uri = uri_template('identity/groups/{groupId}', [
                'groupId' => $groupId,
            ]);

            return $client->request('GET', $uri);
        }, Group::class);
    }

    /**
     * @inheritdoc
     */
    public function getGroupList(GroupQuery $query = null)
    {
        return $this->call(function (ClientInterface $client) use ($query) {
            return $client->request('GET', 'identity/groups', [
                'query' => (array)$query,
            ]);
        }, GroupList::class);
    }

    /**
     * @inheritdoc
     */
    public function createGroup(GroupCreate $data)
    {
        return $this->call(function (ClientInterface $client) use ($data) {
            return $client->request('POST', 'identity/groups', [
                'json' => (array)$data,
            ]);
        }, Group::class);
    }

    /**
     * @inheritdoc
     */
    public function updateGroup($groupId, GroupUpdate $data)
    {
        return $this->call(function (ClientInterface $client) use ($groupId, $data) {
            $uri = uri_template('identity/groups/{groupId}', [
                'groupId' => $groupId,
            ]);

            return $client->request('PUT', $uri, [
                'json' => (array)$data,
            ]);
        }, Group::class);
    }

    /**
     * @inheritdoc
     */
    public function deleteGroup($groupId)
    {
        $this->call(function (ClientInterface $client) use ($groupId) {
            $uri = uri_template('identity/groups/{groupId}', [
                'groupId' => $groupId,
            ]);

            return $client->request('DELETE', $uri);
        });
    }

    /**
     * @inheritdoc
     */
    public function addMember($groupId, $userId)
    {
        return $this->call(function (ClientInterface $client) use ($groupId, $userId) {
            $uri = uri_template('identity/groups/{groupId}/members', [
                'groupId' => $groupId,
            ]);

            return $client->request('POST', $uri, [
                'json' => [
                    'userId' => $userId,
                ],
            ]);
        }, GroupMember::class);
    }

    /**
     * @inheritdoc
     */
    public function deleteMember($groupId, $userId)
    {
        $this->call(function (ClientInterface $client) use ($groupId, $userId) {
            $uri = uri_template('identity/groups/{groupId}/members/{userId}', [
                'groupId' => $groupId,
                'userId' => $userId,
            ]);

            return $client->request('DELETE', $uri);
        });
    }
}
