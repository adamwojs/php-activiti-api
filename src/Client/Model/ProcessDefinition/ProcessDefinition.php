<?php

namespace Activiti\Client\Model\ProcessDefinition;

use Activiti\Client\Model\ValueObject;

class ProcessDefinition extends ValueObject
{
    public $id;
    public $url;
    public $version;
    public $key;
    public $category;
    public $suspended;
    public $name;
    public $description;
    public $deploymentId;
    public $deploymentUrl;
    public $graphicalNotationDefined;
    public $resource;
    public $diagramResource;
    public $startFormDefined;
    public $tenantId;
}
