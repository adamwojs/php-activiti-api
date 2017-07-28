<?php

namespace Activiti\Client\Model\User;

class User
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getId()
    {
        return $this->data['id'];
    }

    public function getFirstName()
    {
        return $this->data['firstName'];
    }

    public function getLastName()
    {
        return $this->data['lastName'];
    }

    public function getUrl()
    {
        return $this->data['url'];
    }

    public function getEmail()
    {
        return $this->data['email'];
    }

    public function getPictureUrl()
    {
        return $this->data['pictureUrl'];
    }
}
