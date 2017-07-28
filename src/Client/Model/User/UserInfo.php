<?php

namespace Activiti\Client\Model\User;

class UserInfo
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getKey()
    {
        return $this->data['key'];
    }

    public function getValue()
    {
        return $this->data['value'];
    }

    public function getUrl()
    {
        return $this->data['url'];
    }
}
