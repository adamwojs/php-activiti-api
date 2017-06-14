<?php

namespace Activiti\Client\Model\Deployment;

use Activiti\Client\Model\ValueObject;

class Deployment extends ValueObject
{
    public $id;
    public $name;
    public $deploymentTime;
    public $category;
    public $url;
    public $tenantId;
}
