<?php

namespace Activiti\Client\Model\ProcessInstance;

use Activiti\Client\Model\ValueObject;

class VariableQuery extends ValueObject
{
    public $name;
    public $value;
    public $operation;
    public $type;
}
