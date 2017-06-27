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
        $expected = [
            'id' => 'testgroup',
            'url' => 'http://localhost:8182/identity/groups/testgroup',
            'name' => 'Test group',
            'type' => 'Test type',
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $result = $this
            ->createGroupService($client)
            ->getGroup('testgroup');

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals('identity/groups/testgroup', (string)$this->getLastRequest()->getUri());
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

        $client = $this->createClient([
            new Response(200, [], json_encode($expectedResult))
        ]);
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

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals($expectedUri, (string)$this->getLastRequest()->getUri());
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

        $client = $this->createClient([
            new Response(201, [], json_encode($expected))
        ]);
        $result = $this
            ->createGroupService($client)
            ->createGroup(new GroupCreate($payload));

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('POST', $this->getLastRequest()->getMethod());
        $this->assertEquals('identity/groups', (string)$this->getLastRequest()->getUri());
        $this->assertEquals(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new Group($expected), $result);
    }

    public function testUpdateGroup()
    {
        $expected = [
            'id' => 'testgroup',
            'url' => 'http://localhost:8182/identity/groups/testgroup',
            'name' => 'Test group (changed)',
            'type' => 'Test type (changed)',
        ];

        $payload = [
            'name' => 'Test group (changed)',
            'type' => 'Test type (changed)',
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);
        $result = $this
            ->createGroupService($client)
            ->updateGroup('testgroup', new GroupUpdate($payload));

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('PUT', $this->getLastRequest()->getMethod());
        $this->assertEquals('identity/groups/testgroup', (string)$this->getLastRequest()->getUri());
        $this->assertEquals(json_encode($payload), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new Group($expected), $result);
    }

    public function testDeleteGroup()
    {
        $client = $this->createClient([new Response(204)]);
        $result = $this
            ->createGroupService($client)
            ->deleteGroup('testgroup');

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('DELETE', $this->getLastRequest()->getMethod());
        $this->assertEquals('identity/groups/testgroup', (string)$this->getLastRequest()->getUri());
        $this->assertNull($result);
    }

    public function testAddMember()
    {
        $expected = [
            'userId' => 'kermit',
            'groupId' => 'sales',
            'url' => 'http://localhost:8182/identity/groups/sales/members/kermit'
        ];

        $client = $this->createClient([new Response(201, [], json_encode($expected))]);
        $result = $this
            ->createGroupService($client)
            ->addMember('sales', 'kermit');

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('POST', $this->getLastRequest()->getMethod());
        $this->assertEquals('identity/groups/sales/members', (string)$this->getLastRequest()->getUri());
        $this->assertEquals(json_encode([
            'userId' => 'kermit'
        ]), $this->getLastRequest()->getBody()->getContents());
        $this->assertEquals(new GroupMember($expected), $result);
    }

    public function testDeleteMember()
    {
        $client = $this->createClient([new Response(204)]);
        $result = $this
            ->createGroupService($client)
            ->deleteMember('sales', 'kermit');

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('DELETE', $this->getLastRequest()->getMethod());
        $this->assertEquals('identity/groups/sales/members/kermit', (string)$this->getLastRequest()->getUri());
        $this->assertNull($result);
    }

    private function createGroupService(ClientInterface $client)
    {
        return new GroupService($client);
    }
}


