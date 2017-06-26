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

    public function getUserPicture($userId);

    public function setUserPicture($userId, $picture);

    public function getUserInfo($userId, $key);

    public function getUserInfoList($userId);

    public function createUserInfo($userId, $key, $value);

    public function updateUserInfo($userId, $key, $value);

    public function deleteUserInfo($userId, $key);
}
