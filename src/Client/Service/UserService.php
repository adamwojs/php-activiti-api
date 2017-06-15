<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\User\UserCreate;
use Activiti\Client\Model\User\UserQuery;
use Activiti\Client\Model\User\UserUpdate;

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
        return $this->gateway->execute('identity/user-list', (array) $query);
    }

    /**
     * @inheritdoc
     */
    public function createUser(UserCreate $data)
    {
        return $this->gateway->execute('identity/user-create', (array) $data);
    }

    /**
     * @inheritdoc
     */
    public function updateUser($userId, UserUpdate $data)
    {
        return $this->gateway->execute('identity/user-update', (array) $data + [
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
}
