<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\User\User;
use Activiti\Client\Model\User\UserCreate;
use Activiti\Client\Model\User\UserInfo;
use Activiti\Client\Model\User\UserInfoList;
use Activiti\Client\Model\User\UserList;
use Activiti\Client\Model\User\UserQuery;
use Activiti\Client\Model\User\UserUpdate;
use GuzzleHttp\ClientInterface;
use function GuzzleHttp\uri_template;

class UserService extends AbstractService implements UserServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getUser($userId)
    {
        return $this->call(function (ClientInterface $client) use ($userId) {
            $uri = uri_template('identity/users/{userId}', [
                'userId' => $userId,
            ]);

            return $client->request('GET', $uri);
        }, User::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getUsersList(UserQuery $query)
    {
        return $this->call(function (ClientInterface $client) use ($query) {
            return $client->request('GET', 'identity/users', [
                'query' => $this->serializer->serialize($query),
            ]);
        }, UserList::class);
    }

    /**
     * {@inheritdoc}
     */
    public function createUser(UserCreate $data)
    {
        return $this->call(function (ClientInterface $client) use ($data) {
            return $client->request('POST', 'identity/users', [
                'json' => $this->serializer->serialize($data),
            ]);
        }, User::class);
    }

    /**
     * {@inheritdoc}
     */
    public function updateUser($userId, UserUpdate $data)
    {
        return $this->call(function (ClientInterface $client) use ($userId, $data) {
            $uri = uri_template('identity/users/{userId}', [
                'userId' => $userId,
            ]);

            return $client->request('PUT', $uri, [
                'json' => $this->serializer->serialize($data),
            ]);
        }, User::class);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteUser($userId)
    {
        $this->call(function (ClientInterface $client) use ($userId) {
            $uri = uri_template('identity/users/{userId}', [
                'userId' => $userId,
            ]);

            return $client->request('DELETE', $uri);
        });
    }

    /**
     * {@inheritdoc}
     */
    public function getUserPicture($userId)
    {
        return $this->call(function (ClientInterface $client) use ($userId) {
            $uri = uri_template('identity/users/{userId}/picture', [
                'userId' => $userId,
            ]);

            return $client->request('GET', $uri);
        });
    }

    /**
     * {@inheritdoc}
     */
    public function setUserPicture($userId, $picture)
    {
        $this->call(function (ClientInterface $client) use ($userId, $picture) {
            $uri = uri_template('identity/users/{userId}/picture', [
                'userId' => $userId,
            ]);

            return $client->request('PUT', $uri, [
                'multipart' => [
                    [
                        'name' => 'picture',
                        'contents' => $picture,
                    ],
                ],
            ]);
        });
    }

    /**
     * {@inheritdoc}
     */
    public function getUserInfo($userId, $key)
    {
        return $this->call(function (ClientInterface $client) use ($userId, $key) {
            $uri = uri_template('identity/users/{userId}/info/{key}', [
                'userId' => $userId,
                'key' => $key,
            ]);

            return $client->request('GET', $uri);
        }, UserInfo::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getUserInfoList($userId)
    {
        return $this->call(function (ClientInterface $client) use ($userId) {
            $uri = uri_template('identity/users/{userId}/info', [
                'userId' => $userId,
            ]);

            return $client->request('GET', $uri);
        }, UserInfoList::class);
    }

    /**
     * {@inheritdoc}
     */
    public function updateUserInfo($userId, $key, $value)
    {
        return $this->call(function (ClientInterface $client) use ($userId, $key, $value) {
            $uri = uri_template('identity/users/{userId}/info/{key}', [
                'userId' => $userId,
                'key' => $key,
            ]);

            return $client->request('PUT', $uri, [
                'json' => [
                    'value' => $value,
                ],
            ]);
        }, UserInfo::class);
    }

    /**
     * {@inheritdoc}
     */
    public function createUserInfo($userId, $key, $value)
    {
        return $this->call(function (ClientInterface $client) use ($userId, $key, $value) {
            $uri = uri_template('identity/users/{userId}/info', [
                'userId' => $userId,
            ]);

            return $client->request('POST', $uri, [
                'json' => [
                    'key' => $key,
                    'value' => $value,
                ],
            ]);
        }, UserInfo::class);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteUserInfo($userId, $key)
    {
        $this->call(function (ClientInterface $client) use ($userId, $key) {
            $uri = uri_template('identity/users/{userId}/info/{key}', [
                'userId' => $userId,
                'key' => $key,
            ]);

            return $client->request('DELETE', $uri);
        });
    }
}
