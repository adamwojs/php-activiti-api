<?php

namespace Activiti\Client\Model\Group;

class GroupMember
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getUserId()
    {
        return $this->data['userId'];
    }

    public function getGroupId()
    {
        return $this->data['groupId'];
    }

    public function getUrl()
    {
        return $this->data['url'];
    }
}
