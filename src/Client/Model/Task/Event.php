<?php

namespace Activiti\Client\Model\Task;

class Event
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

    public function getUrl()
    {
        return $this->data['url'];
    }

    public function getAction()
    {
        return $this->data['action'];
    }

    public function getUserId()
    {
        return $this->data['userId'];
    }

    public function getTime()
    {
        return $this->data['time'];
    }

    public function getTaskUrl()
    {
        return $this->data['taskUrl'];
    }

    public function getProcessInstanceUrl()
    {
        return $this->data['processInstanceUrl'];
    }

    public function getMessage()
    {
        return $this->data['message'];
    }
}
