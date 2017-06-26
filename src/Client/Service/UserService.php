<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\User\UserCreate;
use Activiti\Client\Model\User\UserQuery;
use Activiti\Client\Model\User\UserUpdate;
use Psr\Http\Message\StreamInterface;

class UserService extends AbstractService implements UserServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getUser($userId)
    {
        return $this->gateway->execute('identity/user-get', [
            'userId' => $userId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getUsersList(UserQuery $query)
    {
        return $this->gateway->execute('identity/user-list', (array)$query);
    }

    /**
     * @inheritdoc
     */
    public function createUser(UserCreate $data)
    {
        return $this->gateway->execute('identity/user-create', (array)$data);
    }

    /**
     * @inheritdoc
     */
    public function updateUser($userId, UserUpdate $data)
    {
        return $this->gateway->execute('identity/user-update', (array)$data + [
                'userId' => $userId
            ]);
    }

    /**
     * @inheritdoc
     */
    public function deleteUser($userId)
    {
        $this->gateway->execute('identity/user-delete', [
            'userId' => $userId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getUserPicture($userId)
    {
        throw new \Exception("Missing implementation of " . __METHOD__);
    }

    /**
     * @inheritdoc
     */
    public function setUserPicture($userId, $picture)
    {
        throw new \Exception("Missing implementation of " . __METHOD__);
    }

    /**
     * @inheritdoc
     */
    public function getUserInfo($userId, $key)
    {
        return $this->gateway->execute('identity/user-info-get', [
            'userId' => $userId,
            'key' => $key
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getUserInfoList($userId)
    {
        return $this->gateway->execute('identity/user-info-list', [
            'userId' => $userId
        ]);
    }

    /**
     * @inheritdoc
     */
    public function updateUserInfo($userId, $key, $value)
    {
        return $this->gateway->execute('identity/user-info-update', [
            'userId' => $userId,
            'key' => $key,
            'value' => $value
        ]);
    }

    /**
     * @inheritdoc
     */
    public function createUserInfo($userId, $key, $value)
    {
        return $this->gateway->execute('identity/user-info-create', [
            'userId' => $userId,
            'key' => $key,
            'value' => $value
        ]);
    }

    /**
     * @inheritdoc
     */
    public function deleteUserInfo($userId, $key)
    {
        $this->gateway->execute('identity/user-info-delete', [
            'userId' => $userId,
            'key' => $key
        ]);
    }
}
