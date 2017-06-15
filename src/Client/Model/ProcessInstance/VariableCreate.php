<?php

namespace Activiti\Client\Model\ProcessInstance;

use Activiti\Client\Model\ValueObject;

class VariableCreate extends ValueObject
{
    public $name;
    public $type;
    public $value;
}
