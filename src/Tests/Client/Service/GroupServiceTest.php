<?php

namespace Activiti\Tests\Client\Service;

use Activiti\Client\ModelFactoryInterface;
use Activiti\Client\ObjectSerializerInterface;
use Activiti\Client\Model\Group\GroupQuery;
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
    }

    public function testGetGroupList()
    {
        $expectedUri = 'identity/groups?id=testgroup&name=Test%20name&type=Test%20type' .
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

        $query = new GroupQuery();
        $query->setId('testgroup');
        $query->setType('Test type');
        $query->setMember('kermit');
        $query->setName('Test name');
        $query->setPotentialStarter('kermit');
        $query->setSort('name');

        $client = $this->createClient($this->createJsonResponse($expectedResult, 200));
        $result = $this
            ->createGroupService($client, $this->createObjectSerializerMock($query, [
                'id' => 'testgroup',
                'type' => 'Test type',
                'member' => 'kermit',
                'name' => 'Test name',
                'potentialStarter' => 'kermit',
                'sort' => 'name'
            ]))
            ->getGroupList($query);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri($expectedUri);
    }

    public function testCreateGroup()
    {
        $groupId = 'testgroup';
        $name = 'Test group';
        $type = 'Test type';

        $expected = [
            'id' => $groupId,
            'url' => 'http://localhost:8182/identity/groups/' . $groupId,
            'name' => $name,
            'type' => $type,
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 201));

        $result = $this
            ->createGroupService($client)
            ->createGroup($groupId, $name, $type);

        $this->assertRequestMethod('POST');
        $this->assertRequestUri('identity/groups');
        $this->assertRequestJsonPayload([
            'id' => $groupId,
            'name' => $name,
            'type' => $type,
        ]);
    }

    public function testUpdateGroup()
    {
        $groupId = 'testgroup';
        $name = 'Test group (changed)';
        $type = 'Test type (changed)';

        $expected = [
            'id' => $groupId,
            'url' => 'http://localhost:8182/identity/groups/' . $groupId,
            'name' => $name,
            'type' => $type,
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));

        $result = $this
            ->createGroupService($client)
            ->updateGroup($groupId, $name, $type);

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('identity/groups/' . $groupId);
        $this->assertRequestJsonPayload([
            'name' => $name,
            'type' => $type,
        ]);
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
            'url' => 'http://localhost:8182/identity/groups/' . $groupId . '/members/' . $userId,
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 201));

        $result = $this
            ->createGroupService($client)
            ->addMember($groupId, $userId);

        $this->assertRequestMethod('POST');
        $this->assertRequestUri('identity/groups/' . $groupId . '/members');
        $this->assertRequestJsonPayload([
            'userId' => $userId,
        ]);
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

    private function createGroupService(ClientInterface $client, ObjectSerializerInterface $objectSerializer = null)
    {
        $modelFactory = $this->createMock(ModelFactoryInterface::class);
        if ($objectSerializer === null) {
            $objectSerializer = $this->createMock(ObjectSerializerInterface::class);
        }

        return new GroupService($client, $modelFactory, $objectSerializer);
    }
}
