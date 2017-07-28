<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Group\Group;
use Activiti\Client\Model\Group\GroupList;
use Activiti\Client\Model\Group\GroupMember;
use Activiti\Client\Model\Group\GroupQuery;
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
                'query' => $this->serializer->serialize($query),
            ]);
        }, GroupList::class);
    }

    /**
     * @inheritdoc
     */
    public function createGroup($groupId, $name, $type)
    {
        return $this->call(function (ClientInterface $client) use ($groupId, $name, $type) {
            return $client->request('POST', 'identity/groups', [
                'json' => [
                    'id' => $groupId,
                    'name' => $name,
                    'type' => $type
                ],
            ]);
        }, Group::class);
    }

    /**
     * @inheritdoc
     */
    public function updateGroup($groupId, $name, $type)
    {
        return $this->call(function (ClientInterface $client) use ($groupId, $name, $type) {
            $uri = uri_template('identity/groups/{groupId}', [
                'groupId' => $groupId,
            ]);

            return $client->request('PUT', $uri, [
                'json' => [
                    'name' => $name,
                    'type' => $type
                ],
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
