<?php

namespace Activiti\Client\Model\Deployment;

class ResourceData
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

    public function getContentUrl()
    {
        return $this->data['contentUrl'];
    }

    public function getMediaType()
    {
        return $this->data['mediaType'];
    }

    public function getType()
    {
        return $this->data['type'];
    }
}
