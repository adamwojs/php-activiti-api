<?php

namespace Activiti\Client\Model;

class IdentityLink
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getUrl()
    {
        return $this->data['url'];
    }

    public function getUser()
    {
        return $this->data['user'];
    }

    public function getGroup()
    {
        return $this->data['group'];
    }

    public function getType()
    {
        return $this->data['type'];
    }
}
