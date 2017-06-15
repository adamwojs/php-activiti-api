<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\User\UserCreate;
use Activiti\Client\Model\User\UserQuery;
use Activiti\Client\Model\User\UserUpdate;

interface UserServiceInterface
{
    public function getUser($userId);

    public function getUsersList(UserQuery $query);

    public function createUser(UserCreate $data);

    public function updateUser($userId, UserUpdate $data);

    public function deleteUser($userId);
}
