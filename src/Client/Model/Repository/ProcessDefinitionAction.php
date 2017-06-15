<?php

namespace Activiti\Client\Model\Repository;

use Activiti\Client\Model\ValueObject;

class ProcessDefinitionAction extends ValueObject
{
    public $includeProcessInstances;
    public $date;
}
