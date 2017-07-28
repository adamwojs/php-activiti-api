<?php

namespace Activiti\Client\Model\Deployment;

class Deployment
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

    public function getName()
    {
        return $this->data['name'];
    }

    public function getDeploymentTime()
    {
        return $this->data['deploymentTime'];
    }

    public function getCategory()
    {
        return $this->data['category'];
    }

    public function getUrl()
    {
        return $this->data['url'];
    }

    public function getTenantId()
    {
        return $this->data['tenantId'];
    }
}
