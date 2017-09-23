<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\User\User;
use Activiti\Client\Model\User\UserCreate;
use Activiti\Client\Model\User\UserInfo;
use Activiti\Client\Model\User\UserInfoList;
use Activiti\Client\Model\User\UserList;
use Activiti\Client\Model\User\UserQuery;
use Activiti\Client\Model\User\UserUpdate;

interface UserServiceInterface
{
    /**
     * Get a single user.
     *
     * @see https://www.activiti.org/userguide/#_get_a_single_user
     *
     * @param string $userId The id of the user to get.
     * @return User
     */
    public function getUser($userId);

    /**
     * Get a list of users.
     *
     * @see https://www.activiti.org/userguide/#_get_a_list_of_users
     *
     * @param UserQuery $query The user list parameters (pagination, filtering and sorting)
     * @return UserList
     */
    public function getUsersList(UserQuery $query);

    /**
     * Create a user.
     *
     * @see https://www.activiti.org/userguide/#_create_a_user
     *
     * @param UserCreate $data
     * @return User
     */
    public function createUser(UserCreate $data);

    /**
     * Update a user.
     *
     * @see https://www.activiti.org/userguide/#_update_a_user
     *
     * @param string $userId The id of the user to update.
     * @param UserUpdate $data
     * @return User
     */
    public function updateUser($userId, UserUpdate $data);

    /**
     * Delete a user.
     *
     * @see https://www.activiti.org/userguide/#_delete_a_user
     *
     * @param string $userId The id of the user to delete.
     * @return void
     */
    public function deleteUser($userId);

    /**
     * Get a user’s picture.
     *
     * @see https://www.activiti.org/userguide/#_get_a_user_s_picture
     *
     * @param string $userId The id of the user to get the picture for.
     * @return mixed
     */
    public function getUserPicture($userId);

    /**
     * Updating a user’s picture.
     *
     * @see https://www.activiti.org/userguide/#_updating_a_user_s_picture
     *
     * @param string $userId The id of the user to get the picture for.
     * @param mixed $picture
     * @return void
     */
    public function setUserPicture($userId, $picture);

    /**
     * Get a user’s info.
     *
     * @see https://www.activiti.org/userguide/#_get_a_user_s_info
     *
     * @param string $userId The id of the user to get the info for.
     * @param string $key The key of the user info to get.
     * @return UserInfo
     */
    public function getUserInfo($userId, $key);

    /**
     * List a user’s info.
     *
     * @see https://www.activiti.org/userguide/#_list_a_user_s_info
     *
     * @param string $userId The id of the user to get the info for.
     * @return UserInfoList
     */
    public function getUserInfoList($userId);

    /**
     * Create a new user’s info entry.
     *
     * @see https://www.activiti.org/userguide/#_create_a_new_user_s_info_entry
     *
     * @param string $userId The id of the user to create the info for.
     * @param string $key The key of the user info.
     * @param mixed $value The value of the user info.
     * @return UserInfo
     */
    public function createUserInfo($userId, $key, $value);

    /**
     * Update a user’s info.
     *
     * @see https://www.activiti.org/userguide/#_update_a_user_s_info
     *
     * @param string $userId The id of the user to create the info for.
     * @param string $key The key of the user info
     * @param mixed $value The value of the user info
     * @return UserInfo
     */
    public function updateUserInfo($userId, $key, $value);

    /**
     * Delete a user’s info.
     *
     * @see https://www.activiti.org/userguide/#_delete_a_user_s_info
     *
     * @param string $userId The id of the user to delete the info for.
     * @param string $key The key of the user info to delete.
     * @return UserInfo
     */
    public function deleteUserInfo($userId, $key);
}
