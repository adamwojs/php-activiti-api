<?php

namespace Activiti\Tests\Client\Service;

use Activiti\Client\ModelFactoryInterface;
use Activiti\Client\ObjectSerializerInterface;
use Activiti\Client\Model\User\UserCreate;
use Activiti\Client\Model\User\UserQuery;
use Activiti\Client\Model\User\UserUpdate;
use Activiti\Client\Service\UserService;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;

class UserServiceTest extends AbstractServiceTest
{
    public function testGetUser()
    {
        $userId = 'testuser';

        $expected = [
            'id' => $userId,
            'firstName' => 'Fred',
            'lastName' => 'McDonald',
            'url' => 'http://localhost:8182/identity/users/' . $userId,
            'email' => 'no-reply@activiti.org',
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createUserService($client)
            ->getUser($userId);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('identity/users/' . $userId);
    }

    public function testGetUserList()
    {
        $userId = 'testuser';

        $expectedResult = [
            'data' => [
                [
                    'id' => $userId,
                    'firstName' => 'Fred',
                    'lastName' => 'McDonald',
                    'url' => 'http://localhost:8182/identity/users/' . $userId,
                    'email' => 'no-reply@activiti.org',
                ],
            ],
            'total' => 3,
            'start' => 0,
            'sort' => 'id',
            'order' => 'asc',
            'size' => 3,
        ];

        $client = $this->createClient($this->createJsonResponse($expectedResult, 200));
        $actual = $this
            ->createUserService($client)
            ->getUsersList(new UserQuery([
                // TODO: Query parameters
            ]));

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('identity/users');
    }

    public function testCreateUser()
    {
        $expected = [
            'id' => 'testuser',
            'firstName' => 'Fred',
            'lastName' => 'McDonald',
            'url' => 'http://localhost:8182/identity/users/testuser',
            'email' => 'no-reply@activiti.org',
        ];

        $payload = [
            'id' => 'testuser',
            'firstName' => 'Fred',
            'lastName' => 'McDonald',
            'email' => 'no-reply@activiti.org',
            'password' => '123456',
        ];

        $data = new UserCreate();
        $data->setId('testuser');
        $data->setFirstName('Fred');
        $data->setLastName('McDonald');
        $data->setEmail('no-reply@activiti.org');
        $data->setPassword('123456');

        $client = $this->createClient($this->createJsonResponse($expected, 201));
        $actual = $this
            ->createUserService($client, $this->createObjectSerializerMock($data, $payload))
            ->createUser($data);

        $this->assertRequestMethod('POST');
        $this->assertRequestUri('identity/users');
        $this->assertRequestJsonPayload($payload);
    }

    public function testUpdateUser()
    {
        $userId = 'testuser';

        $expected = [
            'id' => $userId,
            'firstName' => 'Fred',
            'lastName' => 'McDonald',
            'url' => 'http://localhost:8182/identity/users/' . $userId,
            'email' => 'no-reply@activiti.org',
        ];

        $payload = [
            'firstName' => 'Fred',
            'lastName' => 'McDonald',
            'email' => 'no-reply@activiti.org',
            'password' => '123456',
        ];

        $data = new UserUpdate();
        $data->setFirstName('Fred');
        $data->setLastName('McDonald');
        $data->setEmail('no-reply@activiti.org');
        $data->setPassword('123456');

        $serializer = $this->createMock(ObjectSerializerInterface::class);
        $serializer
            ->expects($this->once())
            ->method('serialize')
            ->with($data)
            ->willReturn($payload);

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createUserService($client, $serializer)
            ->updateUser($userId, $data);

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('identity/users/' . $userId);
        $this->assertRequestJsonPayload($payload);
    }

    public function testDeleteUser()
    {
        $userId = 'testuser';

        $client = $this->createClient(new Response(204));
        $actual = $this
            ->createUserService($client)
            ->deleteUser($userId);

        $this->assertRequestMethod('DELETE');
        $this->assertRequestUri('identity/users/' . $userId);
        $this->assertNull($actual);
    }

    public function testGetUserPicture()
    {
        $userId = 'kermit';

        $expected = '(Some binary data)';

        $client = $this->createClient(new Response(200, [], $expected));
        $actual = $this
            ->createUserService($client)
            ->getUserPicture($userId);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('identity/users/' . $userId . '/picture');
        $this->assertEquals($expected, $actual);
    }

    public function testSetUserPicture()
    {
        $userId = 'kermit';
        $picture = '(Some binary data)';

        $client = $this->createClient(new Response(204, [], $picture));
        $actual = $this
            ->createUserService($client)
            ->setUserPicture($userId, $picture);

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('identity/users/' . $userId . '/picture');
        $this->assertNull($actual);
    }

    public function testGetUserInfo()
    {
        $userId = 'testuser';
        $key = 'key1';

        $expected = [
            'key' => $key,
            'value' => 'Value 1',
            'url' => 'http://localhost:8182/identity/users/' . $userId . '/info/' . $key,
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createUserService($client)
            ->getUserInfo($userId, $key);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('identity/users/' . $userId . '/info/' . $key);
    }

    public function testGetUserInfoList()
    {
        $userId = 'testuser';

        $expected = [
            [
                'key' => 'key1',
                'url' => 'http://localhost:8182/identity/users/' . $userId . '/info/key1',
            ],
            [
                'key' => 'key2',
                'url' => 'http://localhost:8182/identity/users/' . $userId . '/info/key2',
            ],
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createUserService($client)
            ->getUserInfoList($userId);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('identity/users/' . $userId . '/info');
    }

    public function testCreateUserInfo()
    {
        $userId = 'testuser';
        $key = 'key1';
        $value = 'The value';

        $expected = [
            'key' => $key,
            'value' => $value,
            'url' => 'http://localhost:8182/identity/users/' . $userId . '/info/' . $key,
        ];

        $payload = [
            'key' => $key,
            'value' => $value,
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 201));
        $actual = $this
            ->createUserService($client)
            ->createUserInfo($userId, $key, $value);

        $this->assertRequestMethod('POST');
        $this->assertRequestUri('identity/users/' . $userId . '/info');
        $this->assertRequestJsonPayload($payload);
    }

    public function testUpdateUserInfo()
    {
        $userId = 'testuser';
        $key = 'key1';
        $value = 'The updated value';

        $expected = [
            'key' => $key,
            'value' => $value,
            'url' => 'http://localhost:8182/identity/users/' . $userId . '/info/' . $key,
        ];

        $payload = [
            'value' => $value,
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));
        $actual = $this
            ->createUserService($client)
            ->updateUserInfo($userId, $key, $value);

        $this->assertRequestMethod('PUT');
        $this->assertRequestUri('identity/users/' . $userId . '/info/' . $key);
        $this->assertRequestJsonPayload($payload);
    }

    public function testDeleteUserInfo()
    {
        $userId = 'testuser';
        $key = 'key1';

        $client = $this->createClient(new Response(204));
        $actual = $this
            ->createUserService($client)
            ->deleteUserInfo($userId, $key);

        $this->assertRequestMethod('DELETE');
        $this->assertRequestUri('identity/users/' . $userId . '/info/' . $key);
        $this->assertNull($actual);
    }

    private function createUserService(ClientInterface $client, ObjectSerializerInterface $objectSerializer = null)
    {
        $modelFactory = $this->createMock(ModelFactoryInterface::class);
        if ($objectSerializer === null) {
            $objectSerializer = $this->createMock(ObjectSerializerInterface::class);
        }

        return new UserService($client, $modelFactory, $objectSerializer);
    }
}
