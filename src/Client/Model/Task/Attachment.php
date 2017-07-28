<?php

namespace Activiti\Client\Model\Task;

class Attachment
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

    public function getName()
    {
        return $this->data['name'];
    }

    public function getUserId()
    {
        return $this->data['userId'];
    }

    public function getDescription()
    {
        return $this->data['description'];
    }

    public function getType()
    {
        return $this->data['type'];
    }

    public function getTaskUrl()
    {
        return $this->data['taskUrl'];
    }

    public function getProcessInstanceUrl()
    {
        return $this->data['processInstanceUrl'];
    }

    public function getExternalUrl()
    {
        return $this->data['externalUrl'];
    }

    public function getContentUrl()
    {
        return $this->data['contentUrl'];
    }
}
