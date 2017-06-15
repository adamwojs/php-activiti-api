<?php

namespace Activiti\Client\Model\ProcessInstance;

use Activiti\Client\Model\ValueObject;

class Variable extends ValueObject
{
    public $name;
    public $value;
    public $valueUrl;
    public $type;
    public $scope;
}
