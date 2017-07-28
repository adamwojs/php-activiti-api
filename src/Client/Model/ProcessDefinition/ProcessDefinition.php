<?php

namespace Activiti\Client\Model\ProcessDefinition;

class ProcessDefinition
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

    public function getVersion()
    {
        return $this->data['version'];
    }

    public function getKey()
    {
        return $this->data['key'];
    }

    public function getCategory()
    {
        return $this->data['category'];
    }

    public function getSuspended()
    {
        return $this->data['suspended'];
    }

    public function getName()
    {
        return $this->data['name'];
    }

    public function getDescription()
    {
        return $this->data['description'];
    }

    public function getDeploymentId()
    {
        return $this->data['deploymentId'];
    }

    public function getDeploymentUrl()
    {
        return $this->data['deploymentUrl'];
    }

    public function getGraphicalNotationDefined()
    {
        return $this->data['graphicalNotationDefined'];
    }

    public function getResource()
    {
        return $this->data['resource'];
    }

    public function getDiagramResource()
    {
        return $this->data['diagramResource'];
    }

    public function getStartFormDefined()
    {
        return $this->data['startFormDefined'];
    }

    public function getTenantId()
    {
        return $this->data['tenantId'];
    }
}
