<?php

namespace Activiti\Tests\Client\Service;

use Activiti\Client\Model\Group\Group;
use Activiti\Client\Model\Group\GroupCreate;
use Activiti\Client\Model\Group\GroupList;
use Activiti\Client\Model\Group\GroupMember;
use Activiti\Client\Model\Group\GroupQuery;
use Activiti\Client\Model\Group\GroupUpdate;
use Activiti\Client\Service\GroupService;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;

class GroupServiceTest extends AbstractServiceTest
{
    public function testGetGroup()
    {
        $groupId = 'testgroup';
        $expected = [
            'id' => $groupId,
            'url' => 'http://localhost:8182/identity/groups/' . $groupId,
            'name' => 'Test group',
            'type' => 'Test type',
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));

        $result = $this
            ->createGroupService($client)
            ->getGroup($groupId);

        $this->assertCount(1, $this->getHistory());
        $this->assertRequestMethod('GET');
        $this->assertRequestUri('identity/groups/' . $groupId);
        $this->assertEquals(new Group($expected), $result);
    }

    public function testGetGroupList()
    {
        $expectedUri = 'identity/groups?id=testgroup&name=Test%20name&type=Test%20type&nameLike=Test%25' .
            '&member=kermit&potentialStarter=kermit&sort=name';

        $expectedResult = [
            'data' => [
                [
                    'id' => 'testgroup',
                    'url' => 'http://localhost:8182/identity/groups/testgroup',
                    'name' => 'Test group',
                    'type' => 'Test type',
                ],
            ],
            'total' => 3,
            'start' => 0,
            'sort' => 'id',
            'order' => 'asc',
            'size' => 3,
        ];

        $client = $this->createClient($this->createJsonResponse($expectedResult, 200));

        $result = $this
            ->createGroupService($client)
            ->getGroupList(new GroupQuery([
                'id' => 'testgroup',
                'type' => 'Test type',
                'member' => 'kermit',
                'name' => 'Test name',
                'nameLike' => 'Test%',
                'potentialStarter' => 'kermit',
                'sort' => 'name'
            ]));

        $this->assertRequestMethod('GET');
        $this->assertRequestUri($expectedUri);
        $this->assertEquals(new GroupList($expectedResult), $result);
    }

    public function testCreateGroup()
    {
        $expected = [
            'id' => 'testgroup',
            'url' => 'http://localhost:8182/identity/groups/testgroup',
            'name' => 'Test group',
            'type' => 'Test type',
        ];

        $payload = [
            'id' => 'testgroup',
            'name' => 'Test group',
            'type' => 'Test type',
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 201));

        $result = $this
            ->createGroupService($client)
            ->createGroup(new GroupCreate($payload));

        $this->assertRequestMethod('POST');
        $this->assertRequestUri('identity/groups');
        $this->assertRequestJsonPayload($payload);
        $this->assertEquals(new Group($expected), $result);
    }

    public function testUpdateGroup()
    {
        $groupId = 'testgroup';

        $expected = [
            'id' => $groupId,
            'url' => 'http://localhost:8182/identity/groups/testgroup',
            'name' => 'Test group (changed)',
            'type' => 'Test type (changed)',
        ];

        $payload = [
            'name' => 'Test group (changed)',
            'type' => 'Test type (changed)',
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));

        $result = $this
            ->createGroupService($client)
            ->updateGroup($groupId, new GroupUpdate($payload));

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('identity/groups/' . $groupId);
        $this->assertRequestJsonPayload($payload);
        $this->assertEquals(new Group($expected), $result);
    }

    public function testDeleteGroup()
    {
        $groupId = 'testgroup';

        $client = $this->createClient(new Response(204));
        $result = $this
            ->createGroupService($client)
            ->deleteGroup($groupId);

        $this->assertRequestMethod('DELETE');
        $this->assertRequestUri('identity/groups/' . $groupId);
        $this->assertNull($result);
    }

    public function testAddMember()
    {
        $groupId = 'sales';
        $userId = 'kermit';

        $expected = [
            'userId' => $userId,
            'groupId' => $groupId,
            'url' => 'http://localhost:8182/identity/groups/' . $groupId . '/members/' . $userId
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 201));

        $result = $this
            ->createGroupService($client)
            ->addMember($groupId, $userId);

        $this->assertRequestMethod('POST');
        $this->assertRequestUri('identity/groups/' . $groupId . '/members');
        $this->assertRequestJsonPayload([
            'userId' => $userId
        ]);
        $this->assertEquals(new GroupMember($expected), $result);
    }

    public function testDeleteMember()
    {
        $groupId = 'sales';
        $userId = 'kermit';

        $client = $this->createClient(new Response(204));
        $result = $this
            ->createGroupService($client)
            ->deleteMember($groupId, $userId);

        $this->assertRequestMethod('DELETE');
        $this->assertRequestUri('identity/groups/' . $groupId . '/members/' . $userId);
        $this->assertNull($result);
    }

    private function createGroupService(ClientInterface $client)
    {
        return new GroupService($client);
    }
}


