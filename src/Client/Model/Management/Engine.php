<?php

namespace Activiti\Client\Model\Management;

class Engine
{
    /** @var $data */
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getName()
    {
        return $this->data['name'];
    }

    public function getResourceUrl()
    {
        return $this->data['resourceUrl'];
    }

    public function getException()
    {
        return $this->data['exception'];
    }

    public function getVersion()
    {
        return $this->data['version'];
    }
}
