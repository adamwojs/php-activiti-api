<?php

namespace Activiti\Client\Model\User;

class UserInfoList implements \ArrayAccess
{
    /**
     * @var array
     */
    private $userInfos;

    public function __construct(array $userInfos)
    {
        $this->userInfos = $userInfos;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return isset($this->userInfos[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return isset($this->userInfos[$offset]) ? $this->userInfos[$offset] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        throw new \Exception('User infos are readonly.');
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        throw new \Exception('User infos are readonly.');
    }
}
